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
        <p class="footer-brand">EQUIP<span style="color:var(--eh-yellow)">&amp;</span>HAUL</p>
        <p class="footer-tagline">Equipment That Works as Hard as You Do.</p>
      </div>
      <div class="footer-col">
        <p class="footer-col__title">Company</p>
        <a href="<?php echo esc_url( home_url( '/fleet/' ) ); ?>">Fleet &amp; Equipment</a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
        <a href="<?php echo esc_url( eh_rent_url() ); ?>" target="_blank" rel="noopener">Rent Equipment</a>
      </div>
      <div class="footer-col">
        <p class="footer-col__title">Fleet</p>
        <?php foreach ( eh_get_units() as $unit ) : ?>
        <a href="<?php echo esc_url( get_permalink( $unit ) ); ?>"><?php echo esc_html( $unit->post_title ); ?></a>
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
      <span>&copy; <?php echo eh_year(); ?> Equip &amp; Haul Equipment Leasing. All rights reserved.</span>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
