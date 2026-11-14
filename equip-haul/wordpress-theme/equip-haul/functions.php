<?php
/**
 * Equip & Haul Equipment Leasing — theme setup.
 * See /equip-haul/BUILD-PLAN.md for the full creative brief this theme
 * implements, especially §23 ("No-Code WordPress Architecture").
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

/* =========================================================================
   THEME SETUP + ASSETS
   ========================================================================= */

function eh_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'eh_setup' );

function eh_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Trade Gothic Bold has no free web license; Oswald is the production
	// stand-in (BUILD-PLAN.md §18). Swap in a licensed webfont later by
	// editing the single --font-display variable in main.css.
	wp_enqueue_style(
		'eh-fonts',
		'https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Open+Sans:wght@400;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'eh-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'eh-fonts' ),
		$theme_version
	);

	// Motion layer — GSAP / ScrollTrigger / Lenis via CDN, then our own
	// scripts. Every script degrades gracefully if a CDN is blocked (see
	// BUILD-PLAN.md §19-21 and the progressive-enhancement guard in
	// main.css / main.js).
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array( 'gsap' ), '3.12.5', true );
	wp_enqueue_script( 'lenis', 'https://cdn.jsdelivr.net/npm/lenis@1.1.14/dist/lenis.min.js', array(), '1.1.14', true );

	wp_enqueue_script( 'eh-kinetic-type', get_template_directory_uri() . '/assets/js/kinetic-type.js', array(), $theme_version, true );
	wp_enqueue_script( 'eh-stats-counter', get_template_directory_uri() . '/assets/js/stats-counter.js', array(), $theme_version, true );
	wp_enqueue_script( 'eh-main', get_template_directory_uri() . '/assets/js/main.js', array( 'gsap', 'gsap-scrolltrigger', 'lenis' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'eh_assets' );

/**
 * Reservation link — change once here if it ever moves; every button in
 * the theme calls this function instead of hardcoding the URL.
 */
function eh_rent_url() {
	return 'https://reserve.loadmaxrentals.com/categories?intent=rent';
}

function eh_year() {
	return esc_html( date_i18n( 'Y' ) );
}

/* =========================================================================
   CONTACT FORM
   Processed entirely within page-contact.php (before get_header(), so a
   redirect can still happen) — no plugin, built on core wp_mail(). Submits
   go to the two addresses below; change them here if they ever change.
   ========================================================================= */

function eh_contact_recipients() {
	return array( 'donovana@loadmaxrentals.com', 'mike.reese@iwanttoretirewell.com' );
}

/**
 * The equipment-interest dropdown: every current unit (so it stays in
 * sync automatically as units are added/removed) plus two fixed choices.
 */
function eh_contact_equipment_options() {
	$options = array();
	foreach ( eh_get_units() as $unit ) {
		$options[] = $unit->post_title;
	}
	$options[] = 'Multiple';
	$options[] = 'Not sure yet';
	return $options;
}

/**
 * Validates and sends a contact form submission. Returns true on success,
 * or a string error message on failure. A filled honeypot field is
 * treated as spam and silently reported as "success" (so bots don't learn
 * anything from the response) without actually sending mail.
 */
function eh_handle_contact_submission() {
	if ( ! empty( $_POST['eh_contact_hp'] ) ) {
		return true; // Honeypot tripped — pretend success, send nothing.
	}
	if ( ! isset( $_POST['eh_contact_nonce'] ) || ! wp_verify_nonce( $_POST['eh_contact_nonce'], 'eh_contact_submit' ) ) {
		return 'Your session expired before this could be sent — please try again.';
	}

	$name      = isset( $_POST['eh_name'] ) ? sanitize_text_field( wp_unslash( $_POST['eh_name'] ) ) : '';
	$email     = isset( $_POST['eh_email'] ) ? sanitize_email( wp_unslash( $_POST['eh_email'] ) ) : '';
	$phone     = isset( $_POST['eh_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['eh_phone'] ) ) : '';
	$equipment = isset( $_POST['eh_equipment'] ) ? sanitize_text_field( wp_unslash( $_POST['eh_equipment'] ) ) : '';
	$message   = isset( $_POST['eh_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['eh_message'] ) ) : '';

	if ( '' === $name || '' === $phone ) {
		return 'Please fill in your name and phone number.';
	}
	if ( '' === $email || ! is_email( $email ) ) {
		return 'Please enter a valid email address.';
	}
	if ( ! in_array( $equipment, eh_contact_equipment_options(), true ) ) {
		return 'Please choose an option from the equipment list.';
	}

	$site_name = get_bloginfo( 'name' );
	$subject   = sprintf( '[%s] New inquiry from %s', $site_name ? $site_name : 'Equip & Haul', $name );

	$body  = "New contact form submission:\n\n";
	$body .= "Name: {$name}\n";
	$body .= "Email: {$email}\n";
	$body .= "Phone: {$phone}\n";
	$body .= "Equipment interested in: {$equipment}\n";
	if ( '' !== $message ) {
		$body .= "\nMessage:\n{$message}\n";
	}

	$admin_email = get_bloginfo( 'admin_email' );
	$headers   = array( 'Content-Type: text/plain; charset=UTF-8' );
	$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
	if ( $admin_email ) {
		$headers[] = 'From: ' . ( $site_name ? $site_name : 'Equip & Haul' ) . ' <' . $admin_email . '>';
	}

	$sent = wp_mail( eh_contact_recipients(), $subject, $body, $headers );

	return $sent ? true : 'Something went wrong sending your message — please try again, or call us directly.';
}

/* =========================================================================
   NO-CODE FIELD SYSTEM
   One meta box per page, built from a flat field list keyed by the page's
   assigned template. This is the mechanism BUILD-PLAN.md §23 describes:
   every piece of copy on every page is a plain labeled input here, saved
   as post meta — never a code edit.
   ========================================================================= */

/**
 * Flat field list for the Home page template. Each entry:
 *   key    meta key (also the <input name>)
 *   label  shown in the editor
 *   type   'text' | 'textarea'
 *   group  section heading the field is shown under in the editor
 */
function eh_home_fields() {
	return array(
		array( 'key' => 'hero_eyebrow', 'label' => 'Eyebrow', 'type' => 'text', 'group' => 'Hero' ),
		array( 'key' => 'hero_headline', 'label' => 'Headline', 'type' => 'text', 'group' => 'Hero' ),
		array( 'key' => 'hero_subhead', 'label' => 'Subhead', 'type' => 'textarea', 'group' => 'Hero' ),
		array( 'key' => 'hero_button_label', 'label' => 'Button Label', 'type' => 'text', 'group' => 'Hero' ),

		array( 'key' => 'intro_eyebrow', 'label' => 'Eyebrow', 'type' => 'text', 'group' => 'Intro ("The Right Equipment")' ),
		array( 'key' => 'intro_h2', 'label' => 'Headline', 'type' => 'text', 'group' => 'Intro ("The Right Equipment")' ),
		array( 'key' => 'intro_body1', 'label' => 'Body Paragraph 1', 'type' => 'textarea', 'group' => 'Intro ("The Right Equipment")' ),
		array( 'key' => 'intro_body2', 'label' => 'Body Paragraph 2', 'type' => 'textarea', 'group' => 'Intro ("The Right Equipment")' ),
		array( 'key' => 'intro_micro_cta', 'label' => 'Prompt Line', 'type' => 'text', 'group' => 'Intro ("The Right Equipment")' ),
		array( 'key' => 'intro_supporting', 'label' => 'Supporting Line', 'type' => 'textarea', 'group' => 'Intro ("The Right Equipment")' ),
		array( 'key' => 'intro_button_label', 'label' => 'Button Label', 'type' => 'text', 'group' => 'Intro ("The Right Equipment")' ),

		array( 'key' => 'stat1_value', 'label' => 'Stat 1 — Value', 'type' => 'text', 'group' => 'Animated Stats Strip' ),
		array( 'key' => 'stat1_label', 'label' => 'Stat 1 — Label', 'type' => 'text', 'group' => 'Animated Stats Strip' ),
		array( 'key' => 'stat2_value', 'label' => 'Stat 2 — Value', 'type' => 'text', 'group' => 'Animated Stats Strip' ),
		array( 'key' => 'stat2_label', 'label' => 'Stat 2 — Label', 'type' => 'text', 'group' => 'Animated Stats Strip' ),
		array( 'key' => 'stat3_value', 'label' => 'Stat 3 — Value', 'type' => 'text', 'group' => 'Animated Stats Strip' ),
		array( 'key' => 'stat3_label', 'label' => 'Stat 3 — Label', 'type' => 'text', 'group' => 'Animated Stats Strip' ),
		array( 'key' => 'stat4_value', 'label' => 'Stat 4 — Value', 'type' => 'text', 'group' => 'Animated Stats Strip' ),
		array( 'key' => 'stat4_label', 'label' => 'Stat 4 — Label', 'type' => 'text', 'group' => 'Animated Stats Strip' ),

		array( 'key' => 'mission_eyebrow', 'label' => 'Eyebrow', 'type' => 'text', 'group' => 'Mission ("Own Less. Do More.")' ),
		array( 'key' => 'mission_h2', 'label' => 'Headline', 'type' => 'text', 'group' => 'Mission ("Own Less. Do More.")' ),
		array( 'key' => 'mission_body1', 'label' => 'Body Paragraph 1', 'type' => 'textarea', 'group' => 'Mission ("Own Less. Do More.")' ),
		array( 'key' => 'mission_body2', 'label' => 'Body Paragraph 2', 'type' => 'textarea', 'group' => 'Mission ("Own Less. Do More.")' ),

		array( 'key' => 'pillar1_heading', 'label' => 'Pillar 1 — Heading', 'type' => 'text', 'group' => 'Three Pillars' ),
		array( 'key' => 'pillar1_body', 'label' => 'Pillar 1 — Body', 'type' => 'textarea', 'group' => 'Three Pillars' ),
		array( 'key' => 'pillar2_heading', 'label' => 'Pillar 2 — Heading', 'type' => 'text', 'group' => 'Three Pillars' ),
		array( 'key' => 'pillar2_body', 'label' => 'Pillar 2 — Body', 'type' => 'textarea', 'group' => 'Three Pillars' ),
		array( 'key' => 'pillar3_heading', 'label' => 'Pillar 3 — Heading', 'type' => 'text', 'group' => 'Three Pillars' ),
		array( 'key' => 'pillar3_body', 'label' => 'Pillar 3 — Body', 'type' => 'textarea', 'group' => 'Three Pillars' ),

		array( 'key' => 'story_eyebrow', 'label' => 'Eyebrow', 'type' => 'text', 'group' => 'Story ("Why Equip & Haul")' ),
		array( 'key' => 'story_h2', 'label' => 'Headline', 'type' => 'text', 'group' => 'Story ("Why Equip & Haul")' ),
		array( 'key' => 'story_body1', 'label' => 'Body Paragraph 1', 'type' => 'textarea', 'group' => 'Story ("Why Equip & Haul")' ),
		array( 'key' => 'story_body2', 'label' => 'Body Paragraph 2', 'type' => 'textarea', 'group' => 'Story ("Why Equip & Haul")' ),

		array( 'key' => 'fleet_teaser_eyebrow', 'label' => 'Eyebrow', 'type' => 'text', 'group' => 'Fleet Teaser ("Built for Heavy Work")' ),
		array( 'key' => 'fleet_teaser_h2', 'label' => 'Headline', 'type' => 'text', 'group' => 'Fleet Teaser ("Built for Heavy Work")' ),
		array( 'key' => 'fleet_teaser_body', 'label' => 'Body', 'type' => 'textarea', 'group' => 'Fleet Teaser ("Built for Heavy Work")' ),
		array( 'key' => 'fleet_teaser_button_label', 'label' => 'Button Label', 'type' => 'text', 'group' => 'Fleet Teaser ("Built for Heavy Work")' ),

		array( 'key' => 'serve1_title', 'label' => 'Card 1 — Title', 'type' => 'text', 'group' => 'Who We Serve' ),
		array( 'key' => 'serve1_body', 'label' => 'Card 1 — Body', 'type' => 'textarea', 'group' => 'Who We Serve' ),
		array( 'key' => 'serve2_title', 'label' => 'Card 2 — Title', 'type' => 'text', 'group' => 'Who We Serve' ),
		array( 'key' => 'serve2_body', 'label' => 'Card 2 — Body', 'type' => 'textarea', 'group' => 'Who We Serve' ),
		array( 'key' => 'serve3_title', 'label' => 'Card 3 — Title', 'type' => 'text', 'group' => 'Who We Serve' ),
		array( 'key' => 'serve3_body', 'label' => 'Card 3 — Body', 'type' => 'textarea', 'group' => 'Who We Serve' ),

		array( 'key' => 'final_h2', 'label' => 'Headline', 'type' => 'text', 'group' => 'Final CTA' ),
		array( 'key' => 'final_body', 'label' => 'Body', 'type' => 'textarea', 'group' => 'Final CTA' ),
		array( 'key' => 'final_button_label', 'label' => 'Button Label', 'type' => 'text', 'group' => 'Final CTA' ),
	);
}

function eh_fleet_fields() {
	return array(
		array( 'key' => 'header_h1', 'label' => 'Headline', 'type' => 'text', 'group' => 'Page Header' ),
		array( 'key' => 'header_body', 'label' => 'Body', 'type' => 'textarea', 'group' => 'Page Header' ),
		array( 'key' => 'header_button_label', 'label' => 'Button Label', 'type' => 'text', 'group' => 'Page Header' ),
		array( 'key' => 'closing_h2', 'label' => 'Headline', 'type' => 'text', 'group' => 'Closing CTA' ),
		array( 'key' => 'closing_body', 'label' => 'Body', 'type' => 'textarea', 'group' => 'Closing CTA' ),
		array( 'key' => 'closing_button_label', 'label' => 'Button Label', 'type' => 'text', 'group' => 'Closing CTA' ),
	);
}

function eh_unit_fields() {
	return array(
		array( 'key' => 'category_label', 'label' => 'Category (e.g. "Telescopic Boom Lift")', 'type' => 'text', 'group' => 'Overview' ),
		array( 'key' => 'tagline', 'label' => 'Tagline', 'type' => 'text', 'group' => 'Overview' ),
		array( 'key' => 'body1', 'label' => 'Body Paragraph 1', 'type' => 'textarea', 'group' => 'Overview' ),
		array( 'key' => 'body2', 'label' => 'Body Paragraph 2', 'type' => 'textarea', 'group' => 'Overview' ),

		array( 'key' => 'spec1_value', 'label' => 'Spec 1 — Value', 'type' => 'text', 'group' => 'Specs' ),
		array( 'key' => 'spec1_label', 'label' => 'Spec 1 — Label', 'type' => 'text', 'group' => 'Specs' ),
		array( 'key' => 'spec2_value', 'label' => 'Spec 2 — Value', 'type' => 'text', 'group' => 'Specs' ),
		array( 'key' => 'spec2_label', 'label' => 'Spec 2 — Label', 'type' => 'text', 'group' => 'Specs' ),
		array( 'key' => 'spec3_value', 'label' => 'Spec 3 — Value', 'type' => 'text', 'group' => 'Specs' ),
		array( 'key' => 'spec3_label', 'label' => 'Spec 3 — Label', 'type' => 'text', 'group' => 'Specs' ),
		array( 'key' => 'spec4_value', 'label' => 'Spec 4 — Value', 'type' => 'text', 'group' => 'Specs' ),
		array( 'key' => 'spec4_label', 'label' => 'Spec 4 — Label', 'type' => 'text', 'group' => 'Specs' ),

		array( 'key' => 'ideal_for', 'label' => 'Ideal For (one item per line)', 'type' => 'textarea', 'group' => '"Ideal For" List' ),

		array( 'key' => 'button_label', 'label' => 'Button Label (e.g. "Rent the JLG 660SJ")', 'type' => 'text', 'group' => 'Call to Action' ),

		array( 'key' => 'image_caption', 'label' => 'Suggested Photo Brief (shown as a caption until a photo is uploaded)', 'type' => 'textarea', 'group' => 'Photo' ),
	);
}

function eh_contact_fields() {
	return array(
		array( 'key' => 'contact_eyebrow', 'label' => 'Eyebrow', 'type' => 'text', 'group' => 'Page Header' ),
		array( 'key' => 'contact_h1', 'label' => 'Headline', 'type' => 'text', 'group' => 'Page Header' ),
		array( 'key' => 'contact_body', 'label' => 'Body', 'type' => 'textarea', 'group' => 'Page Header' ),
		array( 'key' => 'contact_submit_label', 'label' => 'Submit Button Label', 'type' => 'text', 'group' => 'Form' ),
		array( 'key' => 'contact_success_message', 'label' => 'Message Shown After a Successful Submission', 'type' => 'textarea', 'group' => 'Form' ),
	);
}

/**
 * Every equipment page gets its own named template (so "JLG 660SJ" is
 * what a non-coder picks in Page Attributes → Template, not a generic
 * "Equipment Unit") — but they all share the same render logic
 * (template-parts/equipment-unit-render.php) and the same field list
 * below, so adding/editing a unit is still just filling in fields.
 * To add a machine beyond these 7: duplicate one of the page-*.php
 * files, change its "Template Name:" comment, done — see WP-INSTALL.md.
 */
function eh_unit_templates() {
	return array(
		'page-jlg-660sj.php'         => 'JLG 660SJ',
		'page-jlg-1043.php'          => 'JLG 1043',
		'page-jlg-skytrak-10054.php' => 'JLG SkyTrak 10054',
		'page-jlg-1055.php'          => 'JLG 1055',
		'page-jlg-600aj.php'         => 'JLG 600AJ',
		'page-jlg-800aj.php'         => 'JLG 800AJ',
		'page-kenworth-t880.php'     => 'Kenworth T880',
	);
}
function eh_is_unit_template( $template ) {
	return array_key_exists( $template, eh_unit_templates() );
}

/**
 * Looks up which field list applies to a page, based on its assigned
 * Page Template — the same dropdown a non-coder already uses in the
 * normal "Page Attributes" panel.
 */
function eh_fields_for_post( $post_id ) {
	$template = get_page_template_slug( $post_id );
	switch ( $template ) {
		case 'page-home.php':
			return eh_home_fields();
		case 'page-fleet.php':
			return eh_fleet_fields();
		case 'page-contact.php':
			return eh_contact_fields();
	}
	if ( eh_is_unit_template( $template ) ) {
		return eh_unit_fields();
	}
	return array();
}

/**
 * Getter every template uses to read a field, with a safe default so
 * nothing breaks before a field has ever been filled in.
 */
function eh_field( $post_id, $key, $default = '' ) {
	$value = get_post_meta( $post_id, $key, true );
	return ( $value !== '' && $value !== false ) ? $value : $default;
}

/**
 * "Ideal For" textarea (one item per line) -> a clean array of strings.
 */
function eh_lines( $text ) {
	$lines = preg_split( '/\r\n|\r|\n/', (string) $text );
	$lines = array_map( 'trim', $lines );
	return array_values( array_filter( $lines, function( $l ) { return $l !== ''; } ) );
}

add_action( 'add_meta_boxes', function() {
	add_meta_box(
		'eh_content_fields',
		'Page Content — Edit Without Code',
		'eh_render_fields_meta_box',
		'page',
		'normal',
		'high'
	);
} );

function eh_render_fields_meta_box( $post ) {
	$fields = eh_fields_for_post( $post->ID );
	if ( empty( $fields ) ) {
		echo '<p>This page is not using one of the Equip &amp; Haul page templates (Home, Fleet &amp; Equipment, or Equipment Unit), so there are no custom fields here. Pick one under <strong>Page Attributes</strong> → <strong>Template</strong>, then re-open this page.</p>';
		return;
	}
	wp_nonce_field( 'eh_save_fields', 'eh_fields_nonce' );
	echo '<p style="opacity:.75;">Fill in the fields below, then click <strong>Update</strong> — this is the whole page\'s text content. No HTML or code goes here, just plain text.</p>';

	$current_group = null;
	foreach ( $fields as $f ) {
		if ( $f['group'] !== $current_group ) {
			$current_group = $f['group'];
			echo '<h3 style="margin:24px 0 8px;padding-top:16px;border-top:1px solid #dcdcde;">' . esc_html( $current_group ) . '</h3>';
		}
		$value = get_post_meta( $post->ID, $f['key'], true );
		echo '<p style="margin:0 0 14px;">';
		echo '<label for="eh_field_' . esc_attr( $f['key'] ) . '" style="display:block;font-weight:600;margin-bottom:4px;">' . esc_html( $f['label'] ) . '</label>';
		if ( 'textarea' === $f['type'] ) {
			echo '<textarea id="eh_field_' . esc_attr( $f['key'] ) . '" name="eh_fields[' . esc_attr( $f['key'] ) . ']" rows="4" style="width:100%;max-width:720px;">' . esc_textarea( $value ) . '</textarea>';
		} else {
			echo '<input type="text" id="eh_field_' . esc_attr( $f['key'] ) . '" name="eh_fields[' . esc_attr( $f['key'] ) . ']" value="' . esc_attr( $value ) . '" style="width:100%;max-width:720px;">';
		}
		echo '</p>';
	}
}

add_action( 'save_post_page', function( $post_id ) {
	if ( ! isset( $_POST['eh_fields_nonce'] ) || ! wp_verify_nonce( $_POST['eh_fields_nonce'], 'eh_save_fields' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}
	if ( ! isset( $_POST['eh_fields'] ) || ! is_array( $_POST['eh_fields'] ) ) {
		return;
	}
	$fields = eh_fields_for_post( $post_id );
	foreach ( $fields as $f ) {
		if ( ! isset( $_POST['eh_fields'][ $f['key'] ] ) ) {
			continue;
		}
		$raw = wp_unslash( $_POST['eh_fields'][ $f['key'] ] );
		$clean = ( 'textarea' === $f['type'] ) ? sanitize_textarea_field( $raw ) : sanitize_text_field( $raw );
		update_post_meta( $post_id, $f['key'], $clean );
	}
} );

/* =========================================================================
   MEDIA PANEL — real photo if one exists, schematic placeholder otherwise
   ========================================================================= */

/**
 * Renders a media panel: a real photo if supplied, otherwise the
 * schematic placeholder (grain, corner frame, faint glyph). Every
 * template calls this instead of building media-panel markup by hand —
 * it's the single place that decides "do we have a photo yet?"
 *
 * $args:
 *   aspect   '16x9' | '4x5' | '4x3' | '1x1' | 'full'  (default '16x9')
 *   image_id attachment ID, or 0 for no photo           (default 0)
 *   glyph    short placeholder watermark text            (default '')
 *   index    small corner label, e.g. 'UNIT 01'          (default '')
 *   tag      visible caption bottom-left, optional        (default '')
 *   alt      alt text for the photo when image_id is set  (default = tag)
 *   class    extra classes on the wrapper                 (default '')
 */
function eh_media_panel( $args ) {
	$a = wp_parse_args(
		$args,
		array(
			'aspect'   => '16x9',
			'image_id' => 0,
			'glyph'    => '',
			'index'    => '',
			'tag'      => '',
			'alt'      => '',
			'class'    => '',
		)
	);

	$classes = array( 'media-panel', 'media-panel--' . $a['aspect'] );
	if ( $a['image_id'] ) {
		$classes[] = 'media-panel--photo';
	}
	if ( $a['class'] ) {
		$classes[] = $a['class'];
	}

	ob_start();
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"<?php echo $a['image_id'] ? '' : ' aria-hidden="true"'; ?>>
	  <?php if ( $a['image_id'] ) : ?>
		<?php
		echo wp_get_attachment_image(
			$a['image_id'],
			'large',
			false,
			array(
				'class' => 'media-panel__photo-img',
				'alt'   => $a['alt'] ? $a['alt'] : $a['tag'],
			)
		);
		?>
	  <?php else : ?>
		<span class="media-panel__glyph"><?php echo esc_html( $a['glyph'] ); ?></span>
	  <?php endif; ?>
	  <?php if ( $a['index'] ) : ?><span class="media-panel__index"><?php echo esc_html( $a['index'] ); ?></span><?php endif; ?>
	  <div class="media-panel__frame"></div>
	  <?php if ( $a['tag'] ) : ?><span class="media-panel__tag"><?php echo esc_html( $a['tag'] ); ?></span><?php endif; ?>
	</div>
	<?php
	return ob_get_clean();
}

/* =========================================================================
   EQUIPMENT UNIT PAGES — query + tile rendering
   Units are ordinary WordPress pages using the "Equipment Unit" template.
   Nothing here is a hardcoded list: add an 8th unit by creating one more
   page with that template, and it appears everywhere automatically.
   ========================================================================= */

/**
 * All Equipment Unit pages, in menu-order. Cached per-request.
 */
function eh_get_units() {
	static $units = null;
	if ( null !== $units ) {
		return $units;
	}
	$query = new WP_Query( array(
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'meta_query'     => array(
			array(
				'key'     => '_wp_page_template',
				'value'   => array_keys( eh_unit_templates() ),
				'compare' => 'IN',
			),
		),
	) );
	$units = $query->posts;
	wp_reset_postdata();
	return $units;
}

/**
 * Renders one fleet tile for a unit page. $modifier: '' | 'hero' | 'plain'
 * ('plain' = fixed aspect-ratio tile for use outside the 6-column
 * fleet-grid, e.g. cross-sell).
 */
function eh_fleet_tile( $unit, $modifier = '', $unit_no = '' ) {
	$class = 'fleet-tile';
	if ( 'hero' === $modifier ) {
		$class .= ' fleet-tile--hero';
	} elseif ( 'plain' === $modifier ) {
		$class .= ' fleet-tile--plain';
	}
	$image_id = get_post_thumbnail_id( $unit->ID );
	$category = eh_field( $unit->ID, 'category_label', 'Equipment' );
	$panel_args = array(
		'aspect'   => 'full',
		'image_id' => $image_id,
		'glyph'    => mb_substr( $unit->post_title, 0, 2 ),
		'index'    => $unit_no ? 'UNIT ' . $unit_no : '',
		'alt'      => $unit->post_title . ' — ' . $category,
	);
	// Fleet tiles are now square (see .fleet-tile in main.css) to match
	// how these catalog photos are naturally framed once trimmed, so a
	// plain cover-crop fills the tile edge-to-edge with only minor
	// cropping -- unlike the old landscape tile shape, where cover cut
	// off the boom or basket. The one exception is the wide hero tile:
	// no crop region there avoids trimming some part of a diagonal boom
	// photo, so it keeps the contain treatment as a deliberate single
	// showcase shot instead.
	if ( 'hero' === $modifier && $image_id ) {
		$panel_args['class'] = 'media-panel--contain';
	}
	?>
	<a class="<?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( get_permalink( $unit ) ); ?>">
	  <?php echo eh_media_panel( $panel_args ); ?>
	  <div class="fleet-tile__body">
		<p class="fleet-tile__tag"><?php echo esc_html( $category ); ?></p>
		<h3 class="fleet-tile__name"><?php echo esc_html( $unit->post_title ); ?></h3>
		<span class="fleet-tile__cta">View Specs &rarr;</span>
	  </div>
	</a>
	<?php
}

/**
 * Two "cross-sell" units for a given unit page — the next two siblings
 * by menu_order, wrapping around. No manual pairing to maintain.
 */
function eh_cross_sell_units( $current_id ) {
	$units = eh_get_units();
	$ids   = wp_list_pluck( $units, 'ID' );
	$pos   = array_search( $current_id, $ids, true );
	if ( false === $pos || count( $units ) < 2 ) {
		return array();
	}
	$picks = array();
	$total = count( $units );
	for ( $i = 1; $i <= 2 && $i < $total; $i++ ) {
		$picks[] = $units[ ( $pos + $i ) % $total ];
	}
	return $picks;
}

/* =========================================================================
   SITE IMAGES — Settings → Site Images
   The three cinematic scenes, the story image, and the three "Who We
   Serve" photos aren't tied to a single equipment page, so they get one
   small admin screen built on the core WordPress media picker — no
   plugin. Each equipment unit's own photo is instead that page's normal
   Featured Image (see eh_fleet_tile() above and each unit's named
   page-*.php template, which all share template-parts/equipment-unit-render.php).
   ========================================================================= */

function eh_site_image_fields() {
	return array(
		'eh_img_hero'       => 'Hero — Scene 1: Staged at Sunrise',
		'eh_img_mission'    => 'Mission — Scene 2: The Lift',
		'eh_img_story'      => 'Story — Two Problems, One Partner',
		'eh_img_final_cta'  => 'Final CTA — Scene 3: On the Move',
		'eh_img_serve_1'    => 'Who We Serve — Commercial Construction',
		'eh_img_serve_2'    => 'Who We Serve — Industrial & Facilities',
		'eh_img_serve_3'    => 'Who We Serve — Hauling & Logistics',
	);
}

function eh_site_image_id( $key ) {
	return (int) get_option( $key, 0 );
}

add_action( 'admin_menu', function() {
	add_options_page( 'Site Images', 'Site Images', 'manage_options', 'eh-site-images', 'eh_render_images_page' );
} );

add_action( 'admin_enqueue_scripts', function( $hook ) {
	if ( 'settings_page_eh-site-images' !== $hook ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script(
		'eh-admin-images',
		get_template_directory_uri() . '/assets/js/admin-images.js',
		array( 'jquery' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
} );

/**
 * One-time cleanup for a bug in an earlier update that could create
 * duplicate Home/Fleet/unit/Contact pages. For each of those page
 * types, if more than one page exists, keeps the best one (the one
 * with a featured image set, if any does, otherwise the oldest) and
 * moves every other copy to Trash -- never a permanent delete, so
 * nothing is unrecoverable. Returns how many pages were trashed.
 */
function eh_dedupe_pages() {
	$templates = array_merge(
		array(
			'page-home.php'    => true,
			'page-fleet.php'   => true,
			'page-contact.php' => true,
		),
		eh_unit_templates()
	);

	$pages = get_posts( array(
		'post_type'      => 'page',
		'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future' ),
		'posts_per_page' => -1,
		'no_found_rows'  => true,
	) );

	$groups = array();
	foreach ( $pages as $p ) {
		$tpl = get_post_meta( $p->ID, '_wp_page_template', true );
		if ( isset( $templates[ $tpl ] ) ) {
			$groups[ $tpl ][] = $p;
		}
	}

	$trashed = 0;
	foreach ( $groups as $group ) {
		if ( count( $group ) < 2 ) {
			continue;
		}
		usort( $group, function( $a, $b ) {
			$a_has_img = get_post_thumbnail_id( $a->ID ) ? 1 : 0;
			$b_has_img = get_post_thumbnail_id( $b->ID ) ? 1 : 0;
			if ( $a_has_img !== $b_has_img ) {
				return $b_has_img - $a_has_img; // keep the one with a photo first
			}
			return $a->ID <=> $b->ID; // otherwise keep the oldest
		} );
		array_shift( $group ); // the keeper
		foreach ( $group as $dupe ) {
			wp_trash_post( $dupe->ID );
			$trashed++;
		}
	}
	return $trashed;
}

function eh_render_images_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_POST['eh_dedupe_nonce'] ) && wp_verify_nonce( $_POST['eh_dedupe_nonce'], 'eh_dedupe_pages' ) ) {
		$trashed = eh_dedupe_pages();
		if ( $trashed > 0 ) {
			printf(
				'<div class="notice notice-success is-dismissible"><p>Cleaned up %d duplicate page%s — moved to Trash, not permanently deleted, so you can review or restore any of them from <strong>Pages → Trash</strong>.</p></div>',
				(int) $trashed,
				1 === $trashed ? '' : 's'
			);
		} else {
			echo '<div class="notice notice-success is-dismissible"><p>No duplicate pages found.</p></div>';
		}
	}

	if ( isset( $_POST['eh_images_nonce'] ) && wp_verify_nonce( $_POST['eh_images_nonce'], 'eh_save_images' ) ) {
		foreach ( eh_site_image_fields() as $key => $label ) {
			$id = isset( $_POST[ $key ] ) ? absint( $_POST[ $key ] ) : 0;
			if ( $id ) {
				update_option( $key, $id );
			} else {
				delete_option( $key );
			}
		}
		echo '<div class="notice notice-success is-dismissible"><p>Images saved.</p></div>';
	}
	?>
	<div class="wrap">
	  <h1>Site Images</h1>

	  <div class="card" style="max-width:720px; margin:16px 0 24px; padding:4px 20px 16px;">
		<h2>Duplicate Page Cleanup</h2>
		<p>If the Home, Fleet, Contact, or any equipment page ever shows up more than once, click this to clean it up automatically. It keeps the best copy of each page (the one with a photo set, or the oldest one) and moves every extra copy to Trash — nothing is permanently deleted, so anything can be restored from <strong>Pages → Trash</strong> afterward if needed.</p>
		<form method="post">
		  <?php wp_nonce_field( 'eh_dedupe_pages', 'eh_dedupe_nonce' ); ?>
		  <?php submit_button( 'Find & Trash Duplicate Pages', 'secondary' ); ?>
		</form>
	  </div>

	  <p>Upload a photo for each slot below to replace the schematic placeholder on the live site. Leave a slot empty to keep showing the placeholder there. (Each equipment unit's own photo is set separately — open that unit's page and use <strong>Set Featured Image</strong>.)</p>
	  <form method="post">
		<?php wp_nonce_field( 'eh_save_images', 'eh_images_nonce' ); ?>
		<table class="form-table" role="presentation">
		  <tbody>
			<?php foreach ( eh_site_image_fields() as $key => $label ) :
				$current_id = eh_site_image_id( $key );
				$src = $current_id ? wp_get_attachment_image_url( $current_id, 'medium' ) : '';
				?>
			<tr>
			  <th scope="row"><?php echo esc_html( $label ); ?></th>
			  <td>
				<div class="eh-image-field" style="display:flex; align-items:center; gap:16px;">
				  <img class="eh-image-preview" src="<?php echo esc_url( $src ); ?>" style="max-width:180px; max-height:110px; object-fit:cover; background:#eee; <?php echo $src ? '' : 'display:none;'; ?>" alt="">
				  <div>
					<input type="hidden" class="eh-image-id" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $current_id ); ?>">
					<button type="button" class="button eh-choose-image"><?php echo $current_id ? 'Change Image' : 'Choose Image'; ?></button>
					<button type="button" class="button eh-remove-image" style="<?php echo $current_id ? '' : 'display:none;'; ?>">Remove</button>
				  </div>
				</div>
			  </td>
			</tr>
			<?php endforeach; ?>
		  </tbody>
		</table>
		<?php submit_button( 'Save Images' ); ?>
	  </form>
	</div>
	<?php
}

/* =========================================================================
   ACTIVATION SEEDING
   Creates the Home page, the Fleet & Equipment page, and all 7 unit
   pages — with every field already filled in from BUILD-PLAN.md — the
   first time this theme is activated, so the real site is live
   immediately. Safe to run on every activation: each page is only
   created if nothing already exists at its slug, so a page already on
   the site (and any edits made to it) is never touched or duplicated.
   ========================================================================= */

function eh_seed_fields( $post_id, $data ) {
	foreach ( $data as $key => $value ) {
		update_post_meta( $post_id, $key, $value );
	}
}

/**
 * Returns the ID of an existing published page at this slug, or 0.
 * Used so eh_seed_content() can never create a duplicate page even if
 * it somehow runs more than once (e.g. switching themes away and back) —
 * a page that already exists is left completely untouched, including
 * any content the client has already edited.
 */
function eh_seed_find_page( $slug ) {
	// Not get_page_by_path(): that function only matches a bare,
	// non-hierarchical slug against a TOP-LEVEL page (post_parent === 0).
	// Every equipment unit page is deliberately created as a child of
	// Fleet & Equipment, so get_page_by_path() silently failed to find
	// them every time, however many already existed -- a serious bug
	// that (combined with running on admin_init) created a fresh
	// duplicate set of all 7 units on every single wp-admin page load.
	// get_posts() with an exact 'name' match has no such restriction.
	$existing = get_posts( array(
		'name'           => $slug,
		'post_type'      => 'page',
		'post_status'    => array( 'publish', 'draft', 'pending', 'private', 'future' ),
		'posts_per_page' => 1,
		'orderby'        => 'ID',
		'order'          => 'ASC',
		'no_found_rows'  => true,
	) );
	return $existing ? (int) $existing[0]->ID : 0;
}

/**
 * One-time migration: an earlier version of this theme seeded the 7th
 * unit as "Peterbilt 680". The client's actual truck turned out to be
 * a Kenworth T880, so that unit was renamed in code. Without this, a
 * site that already seeded the old Peterbilt page would end up with
 * that page orphaned (its template file no longer exists) AND a brand
 * new, separate Kenworth page created alongside it. This instead
 * renames the existing page in place -- same page, same ID, so a
 * featured image already set on it is untouched -- so there is exactly
 * one truck page, not two.
 */
function eh_migrate_peterbilt_to_kenworth() {
	if ( eh_seed_find_page( 'kenworth-t880' ) ) {
		return; // already migrated (or never had the old page)
	}
	$old_id = eh_seed_find_page( 'peterbilt-680' );
	if ( ! $old_id ) {
		return; // nothing to migrate
	}
	wp_update_post( array(
		'ID'         => $old_id,
		'post_title' => 'Kenworth T880',
		'post_name'  => 'kenworth-t880',
	) );
	update_post_meta( $old_id, '_wp_page_template', 'page-kenworth-t880.php' );
	foreach ( eh_unit_seed_data() as $u ) {
		if ( 'kenworth-t880' === $u['slug'] ) {
			eh_seed_fields( $old_id, $u['fields'] );
			break;
		}
	}
}

/**
 * The 7 equipment units' seed data (slug, title, menu order, and the
 * no-code field values from BUILD-PLAN.md §13). A standalone function,
 * not an inline array, so eh_migrate_peterbilt_to_kenworth() and
 * eh_seed_content() both read from the exact same data -- nothing to
 * keep in sync by hand across two copies.
 */
function eh_unit_seed_data() {
	return array(
		array(
			'slug' => 'jlg-660sj', 'title' => 'JLG 660SJ', 'menu_order' => 1,
			'fields' => array(
				'category_label' => 'Telescopic Boom Lift',
				'tagline'        => 'Reach Out. Work Higher.',
				'body1'          => 'The JLG 660SJ telescopic boom lift is built for jobs that require height, horizontal reach, and dependable jobsite performance. Its straight-boom design provides direct access to elevated work areas, making it a strong choice for construction, steel erection, maintenance, utilities, and industrial projects.',
				'body2'          => 'With a platform height of approximately 66 feet and horizontal outreach of approximately 57 feet, the 660SJ helps crews cover more ground without repeatedly repositioning the machine.',
				'spec1_value' => '66 ft', 'spec1_label' => 'Platform Height',
				'spec2_value' => '57 ft', 'spec2_label' => 'Horizontal Outreach',
				'spec3_value' => '500 lb', 'spec3_label' => 'Unrestricted Capacity',
				'spec4_value' => '4WD', 'spec4_label' => 'Drive',
				'ideal_for'       => "Steel erection\nExterior construction\nIndustrial maintenance\nUtility work\nElevated installation",
				'button_label'    => 'Rent the JLG 660SJ',
				'image_caption'   => 'Full side view of the 660SJ with its boom extended against an active commercial jobsite.',
			),
		),
		array(
			'slug' => 'jlg-1043', 'title' => 'JLG 1043', 'menu_order' => 2,
			'fields' => array(
				'category_label' => 'Telehandler',
				'tagline'        => 'Heavy Capacity. Jobsite Versatility.',
				'body1'          => "The JLG 1043 telehandler delivers the lifting strength and reach needed to move materials across demanding commercial jobsites. It is well suited for placing lumber, roofing materials, masonry, steel, and other heavy loads where standard forklifts can't reach.",
				'body2'          => 'The 1043 has a rated capacity of 10,000 pounds, a maximum lift height of 43 feet, and a maximum forward reach of approximately 30 feet.',
				'spec1_value' => '10,000 lb', 'spec1_label' => 'Rated Capacity',
				'spec2_value' => '43 ft', 'spec2_label' => 'Max Lift Height',
				'spec3_value' => '~30 ft', 'spec3_label' => 'Max Forward Reach',
				'spec4_value' => '4WD', 'spec4_label' => 'Drive',
				'ideal_for'       => "Commercial construction\nFraming and roofing\nMasonry work\nMaterial placement\nIndustrial loading",
				'button_label'    => 'Rent the JLG 1043',
				'image_caption'   => 'Three-quarter view of the telehandler lifting a pallet of materials on a commercial construction site.',
			),
		),
		array(
			'slug' => 'jlg-skytrak-10054', 'title' => 'JLG SkyTrak 10054', 'menu_order' => 3,
			'fields' => array(
				'category_label' => 'Telehandler',
				'tagline'        => 'Greater Height. More Reach.',
				'body1'          => 'The JLG SkyTrak 10054 is made for projects that require heavy lifting at greater heights. Its extended reach makes it especially useful on multi-story construction sites, where materials need to be placed accurately without slowing down the work below.',
				'body2'          => 'The 10054 offers a rated capacity of 10,000 pounds, a maximum lift height of approximately 53 feet, and forward reach of nearly 39 feet.',
				'spec1_value' => '10,000 lb', 'spec1_label' => 'Rated Capacity',
				'spec2_value' => '~53 ft', 'spec2_label' => 'Max Lift Height',
				'spec3_value' => '~39 ft', 'spec3_label' => 'Max Forward Reach',
				'spec4_value' => '4WD', 'spec4_label' => 'Drive',
				'ideal_for'       => "Multi-story construction\nRoofing and framing\nStructural material placement\nLarge commercial projects\nIndustrial applications",
				'button_label'    => 'Rent the JLG 10054',
				'image_caption'   => 'The 10054 placing construction materials at an upper level of a framed building.',
			),
		),
		array(
			'slug' => 'jlg-1055', 'title' => 'JLG 1055', 'menu_order' => 4,
			'fields' => array(
				'category_label' => 'Telehandler',
				'tagline'        => 'Maximum Reach for Demanding Jobs.',
				'body1'          => 'The JLG 1055 combines heavy lifting capacity with extended vertical and forward reach. It is designed for large jobsites where crews need to move substantial materials and place them accurately at height.',
				'body2'          => 'With a rated capacity of 10,000 pounds, a maximum lift height of 55 feet, and forward reach of 42 feet, the 1055 is the longest-reaching telehandler in this group.',
				'spec1_value' => '10,000 lb', 'spec1_label' => 'Rated Capacity',
				'spec2_value' => '55 ft', 'spec2_label' => 'Max Lift Height',
				'spec3_value' => '42 ft', 'spec3_label' => 'Max Forward Reach',
				'spec4_value' => '4WD', 'spec4_label' => 'Drive',
				'ideal_for'       => "Large commercial construction\nMulti-level material placement\nStructural work\nIndustrial facilities\nLong-reach applications",
				'button_label'    => 'Rent the JLG 1055',
				'image_caption'   => 'Wide-angle image showing the full reach of the telehandler on a large commercial site.',
			),
		),
		array(
			'slug' => 'jlg-600aj', 'title' => 'JLG 600AJ', 'menu_order' => 5,
			'fields' => array(
				'category_label' => 'Articulating Boom Lift',
				'tagline'        => 'Reach Up. Reach Over.',
				'body1'          => 'The JLG 600AJ articulating boom lift is designed to reach elevated work areas that are difficult to access directly. Its articulated boom allows operators to work up and over structures, equipment, and other jobsite obstacles.',
				'body2'          => 'With a platform height of approximately 60 feet and horizontal outreach of nearly 40 feet, the 600AJ provides reach and maneuverability for confined or complex work areas.',
				'spec1_value' => '~60 ft', 'spec1_label' => 'Platform Height',
				'spec2_value' => '~40 ft', 'spec2_label' => 'Horizontal Outreach',
				'spec3_value' => '500 lb', 'spec3_label' => 'Capacity (typical for class)',
				'spec4_value' => '4WD', 'spec4_label' => 'Drive',
				'ideal_for'       => "Mechanical installation\nFacility maintenance\nStructural work\nOverhead access\nConfined jobsites",
				'button_label'    => 'Rent the JLG 600AJ',
				'image_caption'   => 'The articulated boom extending over a structure or piece of industrial equipment.',
			),
		),
		array(
			'slug' => 'jlg-800aj', 'title' => 'JLG 800AJ', 'menu_order' => 6,
			'fields' => array(
				'category_label' => 'Articulating Boom Lift',
				'tagline'        => 'High-Reach Access Without Compromise.',
				'body1'          => 'The JLG 800AJ provides the height and articulated reach required for large-scale construction, industrial maintenance, and complex elevated work. Its boom configuration helps operators reach up, out, and over obstacles while maintaining access to difficult work areas.',
				'body2'          => 'The 800AJ offers an 80-foot platform height and nearly 52 feet of horizontal outreach, making it the highest-reaching boom lift in the Equip & Haul fleet.',
				'spec1_value' => '80 ft', 'spec1_label' => 'Platform Height',
				'spec2_value' => '~52 ft', 'spec2_label' => 'Horizontal Outreach',
				'spec3_value' => '500 lb', 'spec3_label' => 'Capacity (typical for class)',
				'spec4_value' => '4WD', 'spec4_label' => 'Drive',
				'ideal_for'       => "High-rise exterior work\nIndustrial facilities\nSteel and structural projects\nLarge-scale maintenance\nDifficult elevated access",
				'button_label'    => 'Rent the JLG 800AJ',
				'image_caption'   => 'Full-boom profile at height with a building or industrial structure providing scale.',
			),
		),
		array(
			'slug' => 'kenworth-t880', 'title' => 'Kenworth T880', 'menu_order' => 7,
			'fields' => array(
				'category_label' => 'Heavy Hauling Truck',
				'tagline'        => 'Built for the Long Haul.',
				'body1'          => 'The Kenworth T880 provides the power, stability, and driver-focused performance needed for demanding hauling operations. Built for vocational and commercial work, it is well suited for moving equipment, materials, and commercial loads across short or long distances.',
				'body2'          => 'Available truck specifications may vary by configuration, engine, axle setup, and trailer or body requirements — confirm the exact towing capacity, transmission, and compatible trailers for each available unit.',
				'spec1_value' => 'Class 8', 'spec1_label' => 'Truck Class',
				'spec2_value' => 'Day Cab', 'spec2_label' => 'Cab Configuration',
				'spec3_value' => 'Diesel', 'spec3_label' => 'Engine',
				'spec4_value' => 'Confirm per unit', 'spec4_label' => 'Towing Capacity',
				'ideal_for'       => "Equipment transportation\nCommercial hauling\nConstruction logistics\nRegional transportation\nLong-distance hauling",
				'button_label'    => 'Rent a Kenworth T880',
				'image_caption'   => 'Three-quarter front image of the Kenworth connected to an equipment or flatbed trailer.',
			),
		),
	);
}

function eh_seed_content() {
	// No blanket "already seeded, skip everything" guard: that would
	// block a page added in a later theme update (like Contact) from
	// ever being created on a site that finished seeding under an
	// older version. Every page below is individually guarded by
	// eh_seed_find_page() instead, so this is always safe to run on
	// every activation — existing pages and their edits are never
	// touched, and only a genuinely missing page gets created.

	eh_migrate_peterbilt_to_kenworth();

	// ---------- Home ----------
	$home_id = eh_seed_find_page( 'home' );
	$home_is_new = ! $home_id;
	if ( $home_is_new ) {
		$home_id = wp_insert_post( array(
			'post_title'   => 'Home',
			'post_name'    => 'home',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => '',
		) );
	}
	if ( $home_is_new && $home_id && ! is_wp_error( $home_id ) ) {
		update_post_meta( $home_id, '_wp_page_template', 'page-home.php' );
		eh_seed_fields( $home_id, array(
			'hero_eyebrow'              => 'Commercial Equipment & Hauling',
			'hero_headline'             => 'Equipment That Works as Hard as You Do',
			'hero_subhead'              => 'Equip & Haul delivers dependable commercial equipment and hauling solutions that are ready when you are, so you can keep the job moving.',
			'hero_button_label'         => 'Rent Equipment',

			'intro_eyebrow'             => 'Ready For The Job',
			'intro_h2'                  => 'The Right Equipment. Ready for the Job.',
			'intro_body1'               => "Equip & Haul provides dependable, high-performance equipment for commercial construction, industrial work, and heavy hauling. From telehandlers and boom lifts to Kenworth hauling trucks, every machine is inspected, maintained, and ready to perform.",
			'intro_body2'               => "Whether you're lifting, loading, staging, or hauling, we make it easy to secure the equipment your operation needs. Flexible rental terms and responsive support help you stay productive and keep the job moving.",
			'intro_micro_cta'           => 'Need Equipment on the Job?',
			'intro_supporting'          => "Tell us what the work demands. We'll help you find the right equipment and get to work.",
			'intro_button_label'        => 'Rent Equipment',

			'stat1_value'               => '7+',
			'stat1_label'               => 'Commercial-grade units in the Equip & Haul fleet',
			'stat2_value'               => '100%',
			'stat2_label'               => 'Inspected, maintained, and ready to perform before every rental',
			'stat3_value'               => '24–48hr',
			'stat3_label'               => 'Typical turnaround to get equipment on your site (confirm before launch)',
			'stat4_value'               => 'Day/Wk/Mo',
			'stat4_label'               => 'Flexible terms — stop paying when the work is finished',

			'mission_eyebrow'           => 'Own Less. Do More.',
			'mission_h2'                => 'Own Less. Do More.',
			'mission_body1'             => 'Keep your capital focused on the people, projects, and opportunities that grow your business. Equip & Haul gives you access to commercial-grade equipment without the upfront cost, ongoing maintenance, or long-term commitment of ownership.',
			'mission_body2'             => 'Rent the right machine for the job and keep it for as long as you need it. With flexible daily, weekly, and monthly rental options, you can keep your equipment working, your projects moving, and your capital in your business.',

			'pillar1_heading'           => 'Keep Your Capital Working',
			'pillar1_body'              => 'Avoid tying up capital in a major equipment purchase. Put those resources toward the areas of your business that generate growth.',
			'pillar2_heading'           => 'Rent on Your Terms',
			'pillar2_body'              => "Need equipment for a day, a week, or a month? Rent what you need, when you need it, and stop paying when the work is finished.",
			'pillar3_heading'           => 'Always Ready to Perform',
			'pillar3_body'              => "Every machine is inspected and maintained before it leaves the yard, so it shows up ready to perform — not something you troubleshoot on someone else's schedule.",

			'story_eyebrow'             => 'Why Equip & Haul',
			'story_h2'                  => 'Two Problems. One Partner.',
			'story_body1'               => 'Getting a machine to a jobsite is two problems wearing one invoice: finding the right equipment, and getting it there. Most of this industry only solves the first — and leaves the second to the contractor, usually under a deadline.',
			'story_body2'               => "We built Equip & Haul around closing that gap. Every machine is inspected, maintained, and ready to perform before it leaves the yard, and every job gets one point of contact instead of two vendors who've never talked to each other. That's not a value-add. That's the business.",

			'fleet_teaser_eyebrow'      => 'The Fleet',
			'fleet_teaser_h2'           => 'Built for Heavy Work.',
			'fleet_teaser_body'         => 'From lifting materials at height to reaching over obstacles and hauling across long distances, our commercial-grade fleet is prepared for demanding jobsites and serious workloads.',
			'fleet_teaser_button_label' => 'Explore Our Equipment',

			'serve1_title'              => 'Commercial Construction',
			'serve1_body'               => 'Steel erection, framing, roofing, and material placement at height.',
			'serve2_title'              => 'Industrial & Facilities',
			'serve2_body'               => 'Mechanical installation, structural work, and facility maintenance.',
			'serve3_title'              => 'Hauling & Logistics',
			'serve3_body'               => 'Equipment transportation and construction logistics, powered by our own Kenworth fleet.',

			'final_h2'                  => 'Ready to Get to Work?',
			'final_body'                => "Tell us what the job demands. We'll help you secure the right equipment, the right rental terms, and the support you need to keep moving.",
			'final_button_label'        => 'Rent Equipment',
		) );
	}

	// ---------- Fleet & Equipment ----------
	$fleet_id = eh_seed_find_page( 'fleet' );
	$fleet_is_new = ! $fleet_id;
	if ( $fleet_is_new ) {
		$fleet_id = wp_insert_post( array(
			'post_title'   => 'Fleet & Equipment',
			'post_name'    => 'fleet',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => '',
		) );
	}
	if ( $fleet_is_new && $fleet_id && ! is_wp_error( $fleet_id ) ) {
		update_post_meta( $fleet_id, '_wp_page_template', 'page-fleet.php' );
		eh_seed_fields( $fleet_id, array(
			'header_h1'            => 'Equipment Built to Perform.',
			'header_body'          => 'New, commercial-grade equipment for lifting, reaching, loading, and hauling. Explore the Equip & Haul fleet and find the machine that matches the demands of your next job.',
			'header_button_label'  => 'Check Availability',
			'closing_h2'           => 'Tell Us What You Need to Move.',
			'closing_body'         => "Not sure which machine is right for the job? Tell us what you're lifting, reaching, loading, or hauling. We'll help you identify the right equipment and rental period.",
			'closing_button_label' => 'Check Equipment Availability',
		) );
	}

	// ---------- Equipment units ----------
	$units = eh_unit_seed_data();

	foreach ( $units as $u ) {
		$unit_id = eh_seed_find_page( $u['slug'] );
		$unit_is_new = ! $unit_id;
		if ( $unit_is_new ) {
			$unit_id = wp_insert_post( array(
				'post_title'   => $u['title'],
				'post_name'    => $u['slug'],
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_parent'  => $fleet_id && ! is_wp_error( $fleet_id ) ? $fleet_id : 0,
				'menu_order'   => $u['menu_order'],
				'post_content' => '',
			) );
		}
		if ( $unit_is_new && $unit_id && ! is_wp_error( $unit_id ) ) {
			update_post_meta( $unit_id, '_wp_page_template', 'page-' . $u['slug'] . '.php' );
			eh_seed_fields( $unit_id, $u['fields'] );
		}
	}

	// ---------- Contact ----------
	$contact_id = eh_seed_find_page( 'contact' );
	$contact_is_new = ! $contact_id;
	if ( $contact_is_new ) {
		$contact_id = wp_insert_post( array(
			'post_title'   => 'Contact',
			'post_name'    => 'contact',
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => '',
		) );
	}
	if ( $contact_is_new && $contact_id && ! is_wp_error( $contact_id ) ) {
		update_post_meta( $contact_id, '_wp_page_template', 'page-contact.php' );
		eh_seed_fields( $contact_id, array(
			'contact_eyebrow'          => 'Get In Touch',
			'contact_h1'               => 'Tell Us What You Need.',
			'contact_body'             => "Have a question, need equipment we haven't listed, or just not sure where to start? Fill out the form below and we'll get back to you.",
			'contact_submit_label'     => 'Send Message',
			'contact_success_message' => "Thanks — we've got your message and will be in touch shortly.",
		) );
	}

	// ---------- Reading settings: serve Home at the site root ----------
	if ( $home_id && ! is_wp_error( $home_id ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	// ---------- Clean URLs (/fleet/jlg-660sj/ etc.) ----------
	update_option( 'permalink_structure', '/%postname%/' );
	flush_rewrite_rules( false );
}
add_action( 'after_switch_theme', 'eh_seed_content' );

// after_switch_theme only fires when the active theme actually changes —
// re-uploading a new version of a theme that's already active (the usual
// way these updates get deployed) never triggers it. Also run the same,
// fully idempotent check on every wp-admin page load so a page added in
// an update (like Contact) gets created the next time anyone visits
// wp-admin, with no reactivation dance required. Every page insert above
// is already gated on that exact page not existing yet, so this is safe
// to run on every request — it's a handful of lookups once everything
// is in place, and never touches a page that already exists.
add_action( 'admin_init', 'eh_seed_content' );
