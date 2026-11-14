<?php
/**
 * Shared render logic for every named equipment page template
 * (page-jlg-660sj.php, page-jlg-1043.php, etc. — see §23 of
 * /equip-haul/BUILD-PLAN.md). Each of those files is a thin wrapper
 * that requires this one, so there is a single place to fix a bug or
 * change the layout even though each unit has its own named template
 * in the WordPress admin dropdown.
 *
 * The product name is the page's normal Title; the photo is the
 * page's normal Featured Image; everything else comes from the
 * "Page Content — Edit Without Code" meta box (functions.php
 * eh_unit_fields()).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eh_post_id = get_the_ID();
$eh_category = eh_field( $eh_post_id, 'category_label', 'Equipment' );
$eh_meta_description = sprintf(
	'Rent the %s from Equip & Haul Equipment Leasing — %s, inspected and ready to perform.',
	get_the_title(),
	$eh_category
);
get_header();

$eh_image_id = get_post_thumbnail_id( $eh_post_id );
$eh_ideal_for = eh_lines( eh_field( $eh_post_id, 'ideal_for' ) );
$eh_cross_sell = eh_cross_sell_units( $eh_post_id );
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / <a href="<?php echo esc_url( home_url( '/fleet/' ) ); ?>">Fleet &amp; Equipment</a> / <?php the_title(); ?></p>
      <p class="eyebrow"><?php echo esc_html( $eh_category ); ?></p>
      <h1 class="display-1"><?php the_title(); ?></h1>
      <?php $eh_tagline = eh_field( $eh_post_id, 'tagline' ); ?>
      <?php if ( $eh_tagline ) : ?>
      <p class="lede mt-3"><?php echo esc_html( $eh_tagline ); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <section class="section section--light">
    <div class="container">
      <div class="unit-hero">
        <div data-reveal>
          <?php
          $eh_panel_args = array(
            'aspect'   => '4x3',
            'image_id' => $eh_image_id,
            'glyph'    => mb_substr( get_the_title(), 0, 2 ),
            'index'    => $eh_category,
            'alt'      => get_the_title() . ' available for rent from Equip & Haul.',
          );
          if ( $eh_image_id ) {
            // Equipment photos tend to be isolated catalog shots, not
            // full-bleed environmental photography — show the whole
            // machine instead of cropping it.
            $eh_panel_args['class'] = 'media-panel--contain';
          }
          if ( ! $eh_image_id ) {
            $eh_panel_args['tag'] = eh_field( $eh_post_id, 'image_caption', get_the_title() );
          }
          echo eh_media_panel( $eh_panel_args );
          ?>
        </div>
        <div data-reveal>
          <p class="body-text"><?php echo esc_html( eh_field( $eh_post_id, 'body1' ) ); ?></p>
          <p class="body-text mt-3"><?php echo esc_html( eh_field( $eh_post_id, 'body2' ) ); ?></p>
          <?php if ( ! empty( $eh_ideal_for ) ) : ?>
          <div class="tag-row">
            <?php foreach ( $eh_ideal_for as $item ) : ?>
            <span class="tag-chip"><?php echo esc_html( $item ); ?></span>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
          <div class="mt-4">
            <a class="btn btn-primary" href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( eh_field( $eh_post_id, 'button_label', 'Rent This Equipment' ) ); ?></a>
          </div>
        </div>
      </div>

      <div class="spec-strip" data-reveal>
        <?php for ( $i = 1; $i <= 4; $i++ ) :
          $value = eh_field( $eh_post_id, "spec{$i}_value" );
          $label = eh_field( $eh_post_id, "spec{$i}_label" );
          if ( '' === $value && '' === $label ) { continue; }
        ?>
        <div class="spec">
          <div class="spec__value"><?php echo esc_html( $value ); ?></div>
          <p class="spec__label"><?php echo esc_html( $label ); ?></p>
        </div>
        <?php endfor; ?>
      </div>
      <p class="body-text" style="opacity:.6; font-size:.875rem;">Specs shown are nominal for this model line — confirm exact configuration and attachments for your unit before booking.</p>
    </div>
  </section>

  <?php if ( ! empty( $eh_cross_sell ) ) : ?>
  <section class="section section--dark">
    <div class="container">
      <p class="eyebrow">You Might Also Need</p>
      <div class="cross-sell-grid" data-reveal>
        <?php foreach ( $eh_cross_sell as $other ) : eh_fleet_tile( $other, 'plain' ); endforeach; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

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
      <h2 class="display-2">Ready to Get to Work?</h2>
      <p class="lede">Tell us what the job demands. We'll help you secure the right equipment, the right rental terms, and the support you need to keep moving.</p>
      <div class="final-cta__actions">
        <a class="btn btn-primary" href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
      </div>
    </div>
  </section>

  <div class="sticky-cta-bar">
    <span class="sticky-cta-bar__label"><?php the_title(); ?></span>
    <a class="btn btn-primary" href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
  </div>

<?php get_footer(); ?>
