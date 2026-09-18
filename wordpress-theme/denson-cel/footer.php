<?php
/**
 * Site footer — closes <main>, renders the global footer, wp_footer().
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-col">
        <p class="footer-brand">DENSON<span style="color:var(--denson-rust)">.</span></p>
        <p class="footer-tagline">Built to Work. Ready When You Are.</p>
      </div>
      <div class="footer-col">
        <p class="footer-col__title">Company</p>
        <a href="<?php echo esc_url( home_url( '/equipment/' ) ); ?>">Equipment</a>
        <a href="<?php echo esc_url( denson_cel_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
      </div>
      <div class="footer-col">
        <p class="footer-col__title">Fleet</p>
        <?php foreach ( denson_cel_units() as $slug => $u ) : ?>
        <a href="<?php echo esc_url( home_url( '/equipment/' . $slug . '/' ) ); ?>"><?php echo esc_html( $u['name'] ); ?></a>
        <?php endforeach; ?>
      </div>
      <div class="footer-col">
        <p class="footer-col__title">Contact</p>
        <p class="footer-placeholder">[Add phone number]</p>
        <p class="footer-placeholder">[Add email address]</p>
        <p class="footer-placeholder">[Add service area]</p>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; <?php echo denson_cel_year(); ?> Denson Commercial Equipment Leasing. All rights reserved.</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
