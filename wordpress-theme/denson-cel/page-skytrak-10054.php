<?php
/**
 * Template Name: Equipment - SkyTrak 10054
 *
 * Assign this template to a child page under "Equipment" with the slug
 * "skytrak-10054" — see WP-INSTALL.md for the full one-time setup.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$denson_cel_meta_description = 'Rent the SkyTrak 10054 telehandler from Denson Commercial Equipment Leasing — 10,000 lb capacity, 54 ft lift height, inspected and jobsite-ready.';
get_header();
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <a href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Equipment</a> / SkyTrak 10054</p>
      <p class="eyebrow">Telehandler</p>
      <h1 class="display-1">SkyTrak 10054</h1>
    </div>
  </div>

  <section class="section section--light">
    <div class="container">
      <div class="unit-hero">
        <div data-reveal>
          <?php
          echo denson_cel_media_panel(
            array(
              'aspect'   => '4x3',
              'image_id' => get_the_ID() ? get_post_thumbnail_id( get_the_ID() ) : 0,
              'glyph'    => 'ST',
              'index'    => 'UNIT 02',
              'tag'      => 'SkyTrak 10054',
            )
          );
          ?>
        </div>
        <div data-reveal>
          <p class="body-text">The SkyTrak 10054 is a heavy-capacity telehandler built to move material where forklifts can't follow — 10,000 pounds of rated capacity and 54 feet of lift height for setting loads on upper floors, rooftops, and staging areas across an active site.</p>
          <p class="body-text mt-3">As a SkyTrak-branded telehandler, this unit runs the reach-and-lift profile contractors already trust — and every one in the Denson fleet is inspected and maintained before it ever reaches your jobsite.</p>
          <div class="tag-row">
            <span class="tag-chip">Material Staging</span>
            <span class="tag-chip">Roof & Upper-Level Loading</span>
            <span class="tag-chip">Masonry & Block Handling</span>
            <span class="tag-chip">Site Material Handling</span>
          </div>
          <div class="mt-4">
            <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent This Equipment</a>
          </div>
        </div>
      </div>

      <div class="spec-strip" data-reveal>
        <div class="spec">
          <div class="spec__value">10,000 lb</div>
          <p class="spec__label">Rated Capacity</p>
        </div>
        <div class="spec">
          <div class="spec__value">54 ft</div>
          <p class="spec__label">Max Lift Height</p>
        </div>
        <div class="spec">
          <div class="spec__value">~40 ft</div>
          <p class="spec__label">Max Forward Reach</p>
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
        foreach ( array( 'jlg-1055', 'peterbilt-680' ) as $denson_cel_cross_slug ) {
          denson_cel_fleet_tile( $denson_cel_cross_slug, 'plain' );
        }
        ?>
      </div>
    </div>
  </section>

  <section class="final-cta">
    <?php
    echo denson_cel_media_panel(
      array(
        'image_id' => denson_cel_site_image_id( 'denson_cel_img_final_cta' ),
        'glyph'    => '03',
        'index'    => 'FIG. 04',
        'tag'      => 'Scene 03 — Hauling at Golden Hour',
      )
    );
    ?>
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
    <span class="sticky-cta-bar__label">SkyTrak 10054</span>
    <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
  </div>

<?php get_footer(); ?>
