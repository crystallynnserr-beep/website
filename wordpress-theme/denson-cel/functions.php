<?php
/**
 * Denson Commercial Equipment Leasing — theme setup.
 * See /BUILD-PLAN.md in the project repo for the full creative brief this
 * theme implements.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

function denson_cel_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'denson_cel_setup' );

function denson_cel_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	// Fonts — Trade Gothic Bold has no free web license; Oswald is the
	// production stand-in (see BUILD-PLAN.md §18). Swap in a licensed
	// Trade Gothic webfont later by editing --font-display in main.css.
	wp_enqueue_style(
		'denson-cel-fonts',
		'https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Open+Sans:wght@400;600;700&display=swap',
		array(),
		null
	);

	// Design system (full copy of the static build's stylesheet).
	wp_enqueue_style(
		'denson-cel-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'denson-cel-fonts' ),
		$theme_version
	);

	// Motion layer — GSAP / ScrollTrigger / Lenis via CDN, then our own
	// scripts. Every script here degrades gracefully if a CDN is blocked
	// (see BUILD-PLAN.md §19-21 and the progressive-enhancement guard in
	// main.css / main.js).
	wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
	wp_enqueue_script( 'gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js', array( 'gsap' ), '3.12.5', true );
	wp_enqueue_script( 'lenis', 'https://cdn.jsdelivr.net/npm/lenis@1.1.14/dist/lenis.min.js', array(), '1.1.14', true );

	wp_enqueue_script( 'denson-cel-kinetic-type', get_template_directory_uri() . '/assets/js/kinetic-type.js', array(), $theme_version, true );
	wp_enqueue_script( 'denson-cel-stats-counter', get_template_directory_uri() . '/assets/js/stats-counter.js', array(), $theme_version, true );
	wp_enqueue_script( 'denson-cel-main', get_template_directory_uri() . '/assets/js/main.js', array( 'gsap', 'gsap-scrolltrigger', 'lenis' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'denson_cel_assets' );

/**
 * Reservation link — change once in Settings if the rental portal URL
 * ever moves, instead of hunting through every template.
 */
function denson_cel_rent_url() {
	return 'https://reserve.loadmaxrentals.com/categories?intent=rent';
}

/**
 * Current year, for the footer copyright line.
 */
function denson_cel_year() {
	return esc_html( date_i18n( 'Y' ) );
}

/**
 * Single source of truth for the fleet — used by the fleet grid on the
 * home page and equipment index, the footer's fleet links, and each
 * unit template's cross-sell tiles. Keep this in sync with the six
 * page-*.php templates if a unit is ever added, removed, or renamed.
 */
function denson_cel_units() {
	return array(
		'jlg-660sj' => array(
			'unit_no'  => '01',
			'glyph'    => 'SJ',
			'name'     => 'JLG 660SJ',
			'category' => 'Telescopic Boom Lift',
		),
		'skytrak-10054' => array(
			'unit_no'  => '02',
			'glyph'    => 'ST',
			'name'     => 'SkyTrak 10054',
			'category' => 'Telehandler',
		),
		'jlg-1055' => array(
			'unit_no'  => '03',
			'glyph'    => '55',
			'name'     => 'JLG 1055',
			'category' => 'Telehandler',
		),
		'jlg-600aj' => array(
			'unit_no'  => '04',
			'glyph'    => 'AJ',
			'name'     => 'JLG 600AJ',
			'category' => 'Articulating Boom Lift',
		),
		'jlg-800aj' => array(
			'unit_no'  => '05',
			'glyph'    => 'AJ',
			'name'     => 'JLG 800AJ',
			'category' => 'Articulating Boom Lift',
		),
		'peterbilt-680' => array(
			'unit_no'  => '06',
			'glyph'    => 'PB',
			'name'     => 'Peterbilt 680',
			'category' => 'Hauling Truck',
		),
	);
}

/**
 * Renders a media panel: a real photo if one is supplied, otherwise the
 * schematic placeholder (grain, corner frame, faint glyph) used
 * throughout the design system. This is the single place that decides
 * "do we have a photo yet?" — every template calls this instead of
 * building media-panel markup by hand. See BUILD-PLAN.md §17 for the
 * placeholder system this falls back to.
 *
 * $args:
 *   aspect    '16x9' | '4x5' | '4x3' | '1x1' | 'full'  (default '16x9')
 *   image_id  attachment ID, or 0 for no photo          (default 0)
 *   glyph     short placeholder watermark text           (default '')
 *   index     small corner label, e.g. 'UNIT 01'         (default '')
 *   tag       visible caption bottom-left, optional       (default '')
 *   alt       alt text for the photo when image_id is set (default = tag)
 *   class     extra classes on the wrapper                (default '')
 */
function denson_cel_media_panel( $args ) {
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

/**
 * The featured image set on a unit's own equipment page (e.g. the "JLG
 * 660SJ" page), looked up by slug. Returns 0 if that page doesn't exist
 * yet or has no featured image set — callers fall back to the schematic
 * placeholder in that case. Cached per-request so the fleet grid (which
 * renders this for all 6 units) only queries each page once.
 */
function denson_cel_unit_image_id( $slug ) {
	static $cache = array();
	if ( array_key_exists( $slug, $cache ) ) {
		return $cache[ $slug ];
	}
	$page = get_page_by_path( $slug );
	$cache[ $slug ] = ( $page && has_post_thumbnail( $page->ID ) ) ? (int) get_post_thumbnail_id( $page->ID ) : 0;
	return $cache[ $slug ];
}

/**
 * Renders one fleet tile. $modifier: '' | 'hero' | 'plain' (plain = fixed
 * aspect-ratio tile for use outside the 6-column fleet-grid, e.g. cross-sell).
 * Pulls its photo from that unit's own page (Set Featured Image in the
 * page editor) automatically — no separate upload needed here.
 */
function denson_cel_fleet_tile( $slug, $modifier = '' ) {
	$units = denson_cel_units();
	if ( ! isset( $units[ $slug ] ) ) {
		return;
	}
	$u = $units[ $slug ];
	$class = 'fleet-tile';
	if ( 'hero' === $modifier ) {
		$class .= ' fleet-tile--hero';
	} elseif ( 'plain' === $modifier ) {
		$class .= ' fleet-tile--plain';
	}
	?>
	<a class="<?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( home_url( '/equipment/' . $slug . '/' ) ); ?>">
	  <?php
	  echo denson_cel_media_panel(
		  array(
			  'aspect'   => 'full',
			  'image_id' => denson_cel_unit_image_id( $slug ),
			  'glyph'    => $u['glyph'],
			  'index'    => 'UNIT ' . $u['unit_no'],
			  'alt'      => $u['name'] . ' — ' . $u['category'],
		  )
	  );
	  ?>
	  <div class="fleet-tile__body">
		<p class="fleet-tile__tag"><?php echo esc_html( $u['category'] ); ?></p>
		<h3 class="fleet-tile__name"><?php echo esc_html( $u['name'] ); ?></h3>
		<span class="fleet-tile__cta">View Specs &rarr;</span>
	  </div>
	</a>
	<?php
}

/**
 * ---------------------------------------------------------------------
 * "Site Images" admin screen — Settings → Site Images.
 *
 * The 6 equipment-unit photos live on their own pages as ordinary
 * Featured Images (see denson_cel_unit_image_id() above). These other 6
 * slots — the three home-page cinematic scenes and the three "Who We
 * Serve" industry photos — aren't tied to a single page, so they get one
 * small settings screen instead. No plugin required: this uses
 * WordPress's own media library picker.
 * ---------------------------------------------------------------------
 */
function denson_cel_site_image_fields() {
	return array(
		'denson_cel_img_hero'       => 'Hero — Scene 01: The Yard at First Light',
		'denson_cel_img_mission'    => 'Mission — Scene 02: Machine in Motion',
		'denson_cel_img_story'      => 'Story — Inspected. Maintained. Ready.',
		'denson_cel_img_final_cta'  => 'Final CTA — Scene 03: Hauling at Golden Hour',
		'denson_cel_img_industry_1' => 'Who We Serve — Commercial Construction',
		'denson_cel_img_industry_2' => 'Who We Serve — Industrial & Facilities',
		'denson_cel_img_industry_3' => 'Who We Serve — Heavy Hauling & Logistics',
	);
}

/**
 * Returns the attachment ID stored for a site-image slot, or 0 if unset.
 * Templates use this + denson_cel_media_panel() to fall back to the
 * schematic placeholder automatically when no photo has been chosen yet.
 */
function denson_cel_site_image_id( $key ) {
	return (int) get_option( $key, 0 );
}

add_action( 'admin_menu', function() {
	add_options_page(
		'Site Images',
		'Site Images',
		'manage_options',
		'denson-cel-images',
		'denson_cel_render_images_page'
	);
} );

add_action( 'admin_enqueue_scripts', function( $hook ) {
	if ( 'settings_page_denson-cel-images' !== $hook ) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script(
		'denson-cel-admin-images',
		get_template_directory_uri() . '/assets/js/admin-images.js',
		array( 'jquery' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
} );

function denson_cel_render_images_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	if ( isset( $_POST['denson_cel_images_nonce'] ) && wp_verify_nonce( $_POST['denson_cel_images_nonce'], 'denson_cel_save_images' ) ) {
		foreach ( denson_cel_site_image_fields() as $key => $label ) {
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
	  <p>Upload a photo for each slot below to replace the schematic placeholder on the live site. Leave a slot empty to keep showing the placeholder there. (Each equipment unit's own photo is set separately — open that unit's page and use <strong>Set Featured Image</strong>.)</p>
	  <form method="post">
		<?php wp_nonce_field( 'denson_cel_save_images', 'denson_cel_images_nonce' ); ?>
		<table class="form-table" role="presentation">
		  <tbody>
			<?php foreach ( denson_cel_site_image_fields() as $key => $label ) :
				$current_id = denson_cel_site_image_id( $key );
				$src = $current_id ? wp_get_attachment_image_url( $current_id, 'medium' ) : '';
				?>
			<tr>
			  <th scope="row"><?php echo esc_html( $label ); ?></th>
			  <td>
				<div class="denson-cel-image-field" style="display:flex; align-items:center; gap:16px;">
				  <img class="denson-cel-image-preview" src="<?php echo esc_url( $src ); ?>" style="max-width:180px; max-height:110px; object-fit:cover; background:#eee; <?php echo $src ? '' : 'display:none;'; ?>" alt="">
				  <div>
					<input type="hidden" class="denson-cel-image-id" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $current_id ); ?>">
					<button type="button" class="button denson-cel-choose-image"><?php echo $current_id ? 'Change Image' : 'Choose Image'; ?></button>
					<button type="button" class="button denson-cel-remove-image" style="<?php echo $current_id ? '' : 'display:none;'; ?>">Remove</button>
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
