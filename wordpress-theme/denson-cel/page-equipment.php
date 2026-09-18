<?php
/**
 * Template Name: Equipment Fleet Index
 *
 * Assign this template to a page titled "Equipment" with the slug
 * "equipment" — see WP-INSTALL.md for the full one-time setup.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$denson_cel_meta_description = "Browse Denson's fleet of new JLG, SkyTrak, and Peterbilt commercial equipment — telehandlers, boom lifts, and hauling trucks, inspected and jobsite-ready.";
get_header();
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / Equipment</p>
      <p class="eyebrow">The Fleet</p>
      <h1 class="display-1">Built for Heavy Work.</h1>
      <p class="lede mt-3">From lifting and loading to hauling and everything in between, Denson's commercial-grade fleet is ready to take on the demands of your next job. Every unit below is new, inspected, and maintained before it ever leaves the yard.</p>
    </div>
  </div>

  <section class="section section--light">
    <div class="container">
      <div class="fleet-grid" data-reveal>
        <?php
        $denson_cel_fleet_order = array( 'jlg-660sj', 'skytrak-10054', 'jlg-1055', 'jlg-600aj', 'jlg-800aj', 'peterbilt-680' );
        foreach ( $denson_cel_fleet_order as $i => $slug ) {
          denson_cel_fleet_tile( $slug, 0 === $i ? 'hero' : '' );
        }
        ?>
      </div>
    </div>
  </section>

  <section class="final-cta">
    <div class="media-panel" aria-hidden="true">
      <span class="media-panel__glyph">03</span>
      <span class="media-panel__index">FIG. 04</span>
      <div class="media-panel__frame"></div>
      <span class="media-panel__tag">Scene 03 — Hauling at Golden Hour</span>
    </div>
    <div class="final-cta__scrim"></div>
    <div class="final-cta__content container" data-reveal>
      <h2 class="display-2">Don't See What You Need?</h2>
      <p class="lede">Tell us what the job demands. We'll help you get the right equipment, the right rental terms, and the support you need to keep moving.</p>
      <div class="final-cta__actions">
        <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
        <span class="final-cta__link">reserve.loadmaxrentals.com</span>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
