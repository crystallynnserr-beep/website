<?php
/**
 * Template Name: Equipment - Peterbilt 680
 *
 * Assign this template to a child page under "Equipment" with the slug
 * "peterbilt-680" — see WP-INSTALL.md for the full one-time setup.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$denson_cel_meta_description = 'Rent the Peterbilt 680 hauling truck from Denson Commercial Equipment Leasing — Class 8 hauling capacity, inspected and jobsite-ready.';
get_header();
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <a href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Equipment</a> / Peterbilt 680</p>
      <p class="eyebrow">Hauling Truck</p>
      <h1 class="display-1">Peterbilt 680</h1>
    </div>
  </div>

  <section class="section section--light">
    <div class="container">
      <div class="unit-hero">
        <div data-reveal>
          <div class="media-panel media-panel--4x3" aria-hidden="true">
            <span class="media-panel__glyph">PB</span>
            <span class="media-panel__index">UNIT 06</span>
            <div class="media-panel__frame"></div>
            <span class="media-panel__tag">Peterbilt 680</span>
          </div>
        </div>
        <div data-reveal>
          <p class="body-text">The Peterbilt 680 is the haul capacity behind the lift capacity — moving equipment, materials, and machinery between yards and jobsites with the Class 8 reliability contractors have depended on for decades.</p>
          <p class="body-text mt-3">Every Peterbilt 680 in the Denson fleet is inspected and maintained before it's dispatched, so when it's time to move, the truck is the last thing standing between your equipment and the next job.</p>
          <div class="tag-row">
            <span class="tag-chip">Equipment Hauling</span>
            <span class="tag-chip">Materials Transport</span>
            <span class="tag-chip">Long-Haul Logistics</span>
            <span class="tag-chip">Jobsite-to-Jobsite Moves</span>
          </div>
          <div class="mt-4">
            <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent This Equipment</a>
          </div>
        </div>
      </div>

      <div class="spec-strip" data-reveal>
        <div class="spec">
          <div class="spec__value">Class 8</div>
          <p class="spec__label">Truck Class</p>
        </div>
        <div class="spec">
          <div class="spec__value">80,000 lb</div>
          <p class="spec__label">Combined GVWR (typ.)</p>
        </div>
        <div class="spec">
          <div class="spec__value">Diesel</div>
          <p class="spec__label">Engine</p>
        </div>
        <div class="spec">
          <div class="spec__value">Day / Sleeper</div>
          <p class="spec__label">Cab Configuration</p>
        </div>
      </div>
      <p class="body-text" style="opacity:.6; font-size:.875rem;">Specs shown are nominal for this model line — confirm exact configuration and attachments for your unit before booking.</p>
    </div>
  </section>

  <section class="section section--dark">
    <div class="container">
      <p class="eyebrow">You Might Also Need</p>
      <div class="cross-sell-grid" data-reveal>
        <?php
        foreach ( array( 'skytrak-10054', 'jlg-1055' ) as $denson_cel_cross_slug ) {
          denson_cel_fleet_tile( $denson_cel_cross_slug, 'plain' );
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
      <h2 class="display-2">Ready to Get to Work?</h2>
      <p class="lede">Tell us what the job demands. We'll help you get the right equipment, the right rental terms, and the support you need to keep moving.</p>
      <div class="final-cta__actions">
        <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
        <span class="final-cta__link">reserve.loadmaxrentals.com</span>
      </div>
    </div>
  </section>

  <div class="sticky-cta-bar">
    <span class="sticky-cta-bar__label">Peterbilt 680</span>
    <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
  </div>

<?php get_footer(); ?>
