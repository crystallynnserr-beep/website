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
 * Renders one fleet tile. $modifier: '' | 'hero' | 'plain' (plain = fixed
 * aspect-ratio tile for use outside the 6-column fleet-grid, e.g. cross-sell).
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
	  <div class="media-panel media-panel--full" aria-hidden="true">
		<span class="media-panel__glyph"><?php echo esc_html( $u['glyph'] ); ?></span>
		<span class="media-panel__index">UNIT <?php echo esc_html( $u['unit_no'] ); ?></span>
		<div class="media-panel__frame"></div>
	  </div>
	  <div class="fleet-tile__body">
		<p class="fleet-tile__tag"><?php echo esc_html( $u['category'] ); ?></p>
		<h3 class="fleet-tile__name"><?php echo esc_html( $u['name'] ); ?></h3>
		<span class="fleet-tile__cta">View Specs &rarr;</span>
	  </div>
	</a>
	<?php
}
