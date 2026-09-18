<?php
/**
 * Template Name: Equipment - JLG 600AJ
 *
 * Assign this template to a child page under "Equipment" with the slug
 * "jlg-600aj" — see WP-INSTALL.md for the full one-time setup.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$denson_cel_meta_description = 'Rent the JLG 600AJ articulating boom lift from Denson Commercial Equipment Leasing — 60 ft platform height, up-and-over reach, inspected and jobsite-ready.';
get_header();
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <a href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Equipment</a> / JLG 600AJ</p>
      <p class="eyebrow">Articulating Boom Lift</p>
      <h1 class="display-1">JLG 600AJ</h1>
    </div>
  </div>

  <section class="section section--light">
    <div class="container">
      <div class="unit-hero">
        <div data-reveal>
          <div class="media-panel media-panel--4x3" aria-hidden="true">
            <span class="media-panel__glyph">AJ</span>
            <span class="media-panel__index">UNIT 04</span>
            <div class="media-panel__frame"></div>
            <span class="media-panel__tag">JLG 600AJ</span>
          </div>
        </div>
        <div data-reveal>
          <p class="body-text">The JLG 600AJ is built for the work a straight boom can't reach — its articulating arm gets up, over, and around obstacles to put your crew exactly where the job needs them, with 60 feet of platform height to work with.</p>
          <p class="body-text mt-3">Every 600AJ in the Denson fleet is inspected and maintained before rental, so you're never troubleshooting hydraulics on the clock — the machine is ready the moment it rolls off the trailer.</p>
          <div class="tag-row">
            <span class="tag-chip">Facade Work</span>
            <span class="tag-chip">Tight-Access Maintenance</span>
            <span class="tag-chip">Electrical & HVAC Installation</span>
            <span class="tag-chip">Up-and-Over Obstacles</span>
          </div>
          <div class="mt-4">
            <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent This Equipment</a>
          </div>
        </div>
      </div>

      <div class="spec-strip" data-reveal>
        <div class="spec">
          <div class="spec__value">60 ft</div>
          <p class="spec__label">Platform Height</p>
        </div>
        <div class="spec">
          <div class="spec__value">40 ft</div>
          <p class="spec__label">Horizontal Outreach</p>
        </div>
        <div class="spec">
          <div class="spec__value">500 lb</div>
          <p class="spec__label">Unrestricted Capacity</p>
        </div>
        <div class="spec">
          <div class="spec__value">4WD</div>
          <p class="spec__label">Drive</p>
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
        foreach ( array( 'jlg-800aj', 'jlg-660sj' ) as $denson_cel_cross_slug ) {
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
    <span class="sticky-cta-bar__label">JLG 600AJ</span>
    <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
  </div>

<?php get_footer(); ?>
