<?php
/**
 * Template Name: Home
 *
 * All content on this page comes from the "Page Content — Edit Without
 * Code" meta box (see functions.php eh_home_fields()) — nothing below
 * is hardcoded copy. Assign this template to a page and, per
 * WP-INSTALL.md, set it as your site's front page in Settings → Reading
 * (activation seeding already does this for you automatically).
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$eh_post_id = get_the_ID();
$eh_meta_description = "Equip & Haul Equipment Leasing delivers dependable commercial equipment and hauling solutions that are ready when you are, so you can keep the job moving.";
get_header();

$eh_units = eh_get_units();
?>

  <!-- ============ HERO — Scene 1: Staged at Sunrise ============ -->
  <section class="hero">
    <?php
    echo eh_media_panel( array(
      'image_id' => eh_site_image_id( 'eh_img_hero' ),
      'glyph'    => '01',
      'index'    => 'FIG. 01',
      'tag'      => 'Scene 01 — Staged at Sunrise',
    ) );
    ?>
    <div class="hero__scrim"></div>
    <div class="hero__content container">
      <p class="eyebrow"><?php echo esc_html( eh_field( $eh_post_id, 'hero_eyebrow' ) ); ?></p>
      <h1 class="display-1" data-kinetic="words"><?php echo esc_html( eh_field( $eh_post_id, 'hero_headline' ) ); ?></h1>
      <p class="hero__subhead"><?php echo esc_html( eh_field( $eh_post_id, 'hero_subhead' ) ); ?></p>
    </div>
    <div class="scroll-cue">
      <span>Scroll</span>
      <span class="scroll-cue__chevron"></span>
    </div>
  </section>

  <!-- ============ INTRO — The Right Equipment ============ -->
  <section class="section section--light">
    <div class="container">
      <div class="intro-split">
        <div data-reveal>
          <p class="eyebrow"><?php echo esc_html( eh_field( $eh_post_id, 'intro_eyebrow' ) ); ?></p>
          <h2 class="display-2"><?php echo esc_html( eh_field( $eh_post_id, 'intro_h2' ) ); ?></h2>
          <p class="lede mt-4"><?php echo esc_html( eh_field( $eh_post_id, 'intro_body1' ) ); ?></p>
          <p class="lede"><?php echo esc_html( eh_field( $eh_post_id, 'intro_body2' ) ); ?></p>
        </div>
        <div data-reveal>
          <p class="intro-split__prompt"><?php echo esc_html( eh_field( $eh_post_id, 'intro_micro_cta' ) ); ?></p>
          <p class="intro-split__note mt-2"><?php echo esc_html( eh_field( $eh_post_id, 'intro_supporting' ) ); ?></p>
          <div class="intro-split__actions">
            <a class="btn btn-primary" href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( eh_field( $eh_post_id, 'intro_button_label', 'Rent Equipment' ) ); ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ ANIMATED STATS STRIP ============ -->
  <section class="stats-strip">
    <div class="container">
      <div class="stats-strip__grid">
        <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
        <div class="stat" data-reveal>
          <div class="stat__value"><span data-stat-value="<?php echo esc_attr( eh_field( $eh_post_id, "stat{$i}_value" ) ); ?>">0</span></div>
          <p class="stat__label"><?php echo esc_html( eh_field( $eh_post_id, "stat{$i}_label" ) ); ?></p>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- ============ MISSION — Own Less. Do More. (Scene 2) ============ -->
  <section class="section section--light">
    <div class="container">
      <div class="mission">
        <div data-reveal>
          <p class="eyebrow"><?php echo esc_html( eh_field( $eh_post_id, 'mission_eyebrow' ) ); ?></p>
          <h2 class="display-2" data-kinetic="words"><?php echo esc_html( eh_field( $eh_post_id, 'mission_h2' ) ); ?></h2>
          <p class="lede mt-4"><?php echo esc_html( eh_field( $eh_post_id, 'mission_body1' ) ); ?></p>
          <p class="lede"><?php echo esc_html( eh_field( $eh_post_id, 'mission_body2' ) ); ?></p>
        </div>
        <div class="mission__media" data-reveal>
          <?php
          echo eh_media_panel( array(
            'aspect'   => '4x5',
            'image_id' => eh_site_image_id( 'eh_img_mission' ),
            'glyph'    => '02',
            'index'    => 'FIG. 02',
            'tag'      => 'Scene 02 — The Lift',
          ) );
          ?>
        </div>
      </div>

      <div class="pillars mt-5" data-reveal>
        <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
        <div class="pillar">
          <div class="numeral">0<?php echo esc_html( $i ); ?></div>
          <h3 class="pillar__heading"><?php echo esc_html( eh_field( $eh_post_id, "pillar{$i}_heading" ) ); ?></h3>
          <p class="pillar__body"><?php echo esc_html( eh_field( $eh_post_id, "pillar{$i}_body" ) ); ?></p>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- ============ STORY — Two Problems. One Partner. ============ -->
  <section class="section section--dark">
    <div class="container">
      <div class="story">
        <div class="story__copy" data-reveal>
          <p class="eyebrow"><?php echo esc_html( eh_field( $eh_post_id, 'story_eyebrow' ) ); ?></p>
          <p class="story__pull"><?php echo esc_html( eh_field( $eh_post_id, 'story_h2' ) ); ?></p>
          <p class="body-text"><?php echo esc_html( eh_field( $eh_post_id, 'story_body1' ) ); ?></p>
          <p class="body-text mt-3"><?php echo esc_html( eh_field( $eh_post_id, 'story_body2' ) ); ?></p>
        </div>
        <div class="story__media" data-reveal>
          <?php
          echo eh_media_panel( array(
            'aspect'   => '4x5',
            'image_id' => eh_site_image_id( 'eh_img_story' ),
            'glyph'    => '&mdash;',
            'index'    => 'FIG. 03',
            'tag'      => 'Inspected. Maintained. Ready.',
          ) );
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ FLEET — Built for Heavy Work ============ -->
  <section class="section section--light" id="fleet">
    <div class="container">
      <div data-reveal>
        <p class="eyebrow"><?php echo esc_html( eh_field( $eh_post_id, 'fleet_teaser_eyebrow' ) ); ?></p>
        <h2 class="display-2"><?php echo esc_html( eh_field( $eh_post_id, 'fleet_teaser_h2' ) ); ?></h2>
        <p class="lede mt-3"><?php echo esc_html( eh_field( $eh_post_id, 'fleet_teaser_body' ) ); ?></p>
      </div>

      <?php if ( ! empty( $eh_units ) ) : ?>
      <div class="fleet-grid" data-reveal>
        <?php foreach ( $eh_units as $i => $unit ) :
          eh_fleet_tile( $unit, 0 === $i ? 'hero' : '', sprintf( '%02d', $i + 1 ) );
        endforeach; ?>
      </div>
      <?php endif; ?>

      <div class="section-footer-cta">
        <a class="btn btn-ghost-dark" href="<?php echo esc_url( home_url( '/fleet/' ) ); ?>"><?php echo esc_html( eh_field( $eh_post_id, 'fleet_teaser_button_label', 'Explore Our Equipment' ) ); ?></a>
      </div>
    </div>
  </section>

  <!-- ============ WHO WE SERVE ============ -->
  <section class="section section--dark">
    <div class="container">
      <div data-reveal>
        <p class="eyebrow">Who We Serve</p>
        <h2 class="display-2">Built For the Work You Do.</h2>
      </div>
      <div class="industries-grid" data-reveal>
        <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
        <div class="industry-card">
          <?php
          echo eh_media_panel( array(
            'aspect'   => '4x5',
            'image_id' => eh_site_image_id( "eh_img_serve_{$i}" ),
            'glyph'    => '0' . $i,
            'alt'      => eh_field( $eh_post_id, "serve{$i}_title" ),
          ) );
          ?>
          <div class="industry-card__body">
            <h3 class="industry-card__title"><?php echo esc_html( eh_field( $eh_post_id, "serve{$i}_title" ) ); ?></h3>
            <p class="industry-card__desc"><?php echo esc_html( eh_field( $eh_post_id, "serve{$i}_body" ) ); ?></p>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <!-- ============ FINAL CTA — Scene 3: On the Move ============ -->
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
      <h2 class="display-2" data-kinetic="words"><?php echo esc_html( eh_field( $eh_post_id, 'final_h2' ) ); ?></h2>
      <p class="lede"><?php echo esc_html( eh_field( $eh_post_id, 'final_body' ) ); ?></p>
      <div class="final-cta__actions">
        <a class="btn btn-primary" href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( eh_field( $eh_post_id, 'final_button_label', 'Rent Equipment' ) ); ?></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
