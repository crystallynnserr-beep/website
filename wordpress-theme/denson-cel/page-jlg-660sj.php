<?php
/**
 * Template Name: Equipment - JLG 660SJ
 *
 * Assign this template to a child page under "Equipment" with the slug
 * "jlg-660sj" — see WP-INSTALL.md for the full one-time setup.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$denson_cel_meta_description = 'Rent the JLG 660SJ telescopic boom lift from Denson Commercial Equipment Leasing — 66 ft platform height, inspected and jobsite-ready.';
get_header();
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <a href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Equipment</a> / JLG 660SJ</p>
      <p class="eyebrow">Telescopic Boom Lift</p>
      <h1 class="display-1">JLG 660SJ</h1>
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
              'glyph'    => 'SJ',
              'index'    => 'UNIT 01',
              'tag'      => 'JLG 660SJ',
            )
          );
          ?>
        </div>
        <div data-reveal>
          <p class="body-text">The JLG 660SJ is a straight-stick telescopic boom lift built for the jobs where you need to go up fast and reach out far — 66 feet of platform height and 51 feet of horizontal outreach, with the smooth telescoping control that makes precise placement second nature.</p>
          <p class="body-text mt-3">Every 660SJ in the Denson fleet is inspected and maintained before it leaves the yard, so it shows up ready to run — not something you have to troubleshoot on someone else's schedule.</p>
          <div class="tag-row">
            <span class="tag-chip">Steel Erection</span>
            <span class="tag-chip">Facade & Envelope Work</span>
            <span class="tag-chip">Warehouse High-Bay Access</span>
            <span class="tag-chip">Exterior Building Maintenance</span>
          </div>
          <div class="mt-4">
            <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent This Equipment</a>
          </div>
        </div>
      </div>

      <div class="spec-strip" data-reveal>
        <div class="spec">
          <div class="spec__value">66 ft</div>
          <p class="spec__label">Platform Height</p>
        </div>
        <div class="spec">
          <div class="spec__value">51 ft</div>
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
        foreach ( array( 'jlg-800aj', 'jlg-600aj' ) as $denson_cel_cross_slug ) {
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
    <span class="sticky-cta-bar__label">JLG 660SJ</span>
    <a class="btn btn-primary" href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
  </div>

<?php get_footer(); ?>
