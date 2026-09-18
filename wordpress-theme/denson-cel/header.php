<?php
/**
 * Site header — grain overlay, scroll progress bar, nav, mobile menu.
 * Templates may set $denson_cel_meta_description before calling
 * get_header() to override the default meta description.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php
	echo isset( $denson_cel_meta_description )
		? esc_attr( $denson_cel_meta_description )
		: 'Denson Commercial Equipment Leasing delivers inspected, maintained, jobsite-ready telehandlers, boom lifts, and hauling trucks on flexible daily, weekly, and monthly terms.';
?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="grain-overlay" aria-hidden="true"></div>
<div class="scroll-progress" aria-hidden="true"></div>

<header class="site-header<?php echo is_front_page() ? '' : ' is-scrolled'; ?>">
  <div class="container">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">DENSON<span>.</span></a>
    <nav class="main-nav" aria-label="Primary">
      <ul class="main-nav__links">
        <li><a href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Equipment</a></li>
      </ul>
      <div class="nav-cta">
        <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
      </div>
      <button class="menu-toggle" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </nav>
  </div>
</header>

<div class="mobile-menu" aria-hidden="true">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
  <a href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Equipment</a>
  <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
</div>

<main>
