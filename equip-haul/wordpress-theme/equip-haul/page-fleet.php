<?php
/**
 * Template Name: Fleet & Equipment
 *
 * Lists every page using the "Equipment Unit" template automatically —
 * add an 8th unit by creating one more page with that template, no
 * code change needed here. Content fields: functions.php eh_fleet_fields().
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$eh_post_id = get_the_ID();
$eh_meta_description = "New, commercial-grade equipment for lifting, reaching, loading, and hauling. Explore the Equip & Haul fleet and find the machine that matches your next job.";
get_header();

$eh_units = eh_get_units();
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / Fleet &amp; Equipment</p>
      <h1 class="display-1"><?php echo esc_html( eh_field( $eh_post_id, 'header_h1' ) ); ?></h1>
      <p class="lede mt-3"><?php echo esc_html( eh_field( $eh_post_id, 'header_body' ) ); ?></p>
      <div class="mt-4">
        <a class="btn btn-primary" href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( eh_field( $eh_post_id, 'header_button_label', 'Check Availability' ) ); ?></a>
      </div>
    </div>
  </div>

  <section class="section section--light">
    <div class="container">
      <?php if ( ! empty( $eh_units ) ) : ?>
      <div class="fleet-grid" data-reveal>
        <?php foreach ( $eh_units as $i => $unit ) :
          eh_fleet_tile( $unit, 0 === $i ? 'hero' : '', sprintf( '%02d', $i + 1 ) );
        endforeach; ?>
      </div>
      <?php else : ?>
      <p class="lede">No equipment pages yet — create a page using the "Equipment Unit" template to add your first unit.</p>
      <?php endif; ?>
    </div>
  </section>

  <section class="final-cta">
    <?php
    echo eh_media_panel( array(
      'image_id' => eh_site_image_id( 'eh_img_final_cta' ),
      'glyph'    => '03',
      'index'    => 'FIG. 04',
      'tag'      => 'Scene 03 — On the Move',
    ) );
    ?>
    <div class="final-cta__scrim"></div>
    <div class="final-cta__content container" data-reveal>
      <h2 class="display-2"><?php echo esc_html( eh_field( $eh_post_id, 'closing_h2' ) ); ?></h2>
      <p class="lede"><?php echo esc_html( eh_field( $eh_post_id, 'closing_body' ) ); ?></p>
      <div class="final-cta__actions">
        <a class="btn btn-primary" href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( eh_field( $eh_post_id, 'closing_button_label', 'Check Equipment Availability' ) ); ?></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
