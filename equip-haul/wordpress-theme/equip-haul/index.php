<?php
/**
 * Fallback template — WordPress requires an index.php in every theme.
 * The home page uses the "Home" page template; the fleet pages use
 * their own templates. This only renders for anything else (a blog
 * post, search results, a 404) so the site never fatals on an
 * unexpected URL.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>

<div class="page-header">
  <div class="container">
    <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></p>
    <h1 class="display-2"><?php echo have_posts() ? esc_html__( 'Equip & Haul Equipment Leasing', 'equip-haul' ) : esc_html__( 'Page Not Found', 'equip-haul' ); ?></h1>
  </div>
</div>

<section class="section section--light">
  <div class="container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( 'body-text mt-4' ); ?>>
          <h2 class="display-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="mt-2"><?php the_excerpt(); ?></div>
        </article>
        <hr class="grid-rule mt-4">
      <?php endwhile; ?>
    <?php else : ?>
      <p class="lede mt-3"><?php esc_html_e( "We couldn't find that page.", 'equip-haul' ); ?></p>
      <div class="mt-4">
        <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
