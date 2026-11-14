<?php
/**
 * Template Name: Contact
 *
 * Collects Name, Email, Phone, and an Equipment Interest dropdown, and
 * emails the submission via wp_mail() to the addresses in
 * eh_contact_recipients() (functions.php) — no plugin, no external
 * form service. Page copy is editable the usual no-code way via the
 * "Page Content — Edit Without Code" box (functions.php eh_contact_fields()).
 *
 * The form is processed here, before get_header(), so a successful
 * submission can redirect (avoids a resubmission on page refresh)
 * before any HTML has been sent.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eh_post_id = get_the_ID();
$eh_error   = '';
$eh_old     = array();

if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['eh_contact_submit'] ) ) {
	$result = eh_handle_contact_submission();
	if ( true === $result ) {
		wp_safe_redirect( add_query_arg( 'sent', '1', get_permalink( $eh_post_id ) ) );
		exit;
	}
	$eh_error = $result;
	$eh_old   = array(
		'name'      => isset( $_POST['eh_name'] ) ? sanitize_text_field( wp_unslash( $_POST['eh_name'] ) ) : '',
		'email'     => isset( $_POST['eh_email'] ) ? sanitize_text_field( wp_unslash( $_POST['eh_email'] ) ) : '',
		'phone'     => isset( $_POST['eh_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['eh_phone'] ) ) : '',
		'equipment' => isset( $_POST['eh_equipment'] ) ? sanitize_text_field( wp_unslash( $_POST['eh_equipment'] ) ) : '',
		'message'   => isset( $_POST['eh_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['eh_message'] ) ) : '',
	);
}

$eh_sent = isset( $_GET['sent'] ) && '1' === $_GET['sent'];
$eh_meta_description = "Get in touch with Equip & Haul Equipment Leasing — tell us what you're lifting, reaching, loading, or hauling.";
get_header();
?>

  <div class="page-header">
    <div class="container">
      <p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> / Contact</p>
      <p class="eyebrow"><?php echo esc_html( eh_field( $eh_post_id, 'contact_eyebrow' ) ); ?></p>
      <h1 class="display-1"><?php echo esc_html( eh_field( $eh_post_id, 'contact_h1' ) ); ?></h1>
      <p class="lede mt-3"><?php echo esc_html( eh_field( $eh_post_id, 'contact_body' ) ); ?></p>
    </div>
  </div>

  <section class="section section--light">
    <div class="container">
      <?php if ( $eh_sent ) : ?>
        <div class="form-notice form-notice--success" data-reveal>
          <?php echo esc_html( eh_field( $eh_post_id, 'contact_success_message', "Thanks — we've got your message and will be in touch shortly." ) ); ?>
        </div>
      <?php else : ?>

        <?php if ( $eh_error ) : ?>
          <div class="form-notice form-notice--error"><?php echo esc_html( $eh_error ); ?></div>
        <?php endif; ?>

        <form class="contact-form" method="post" data-reveal>
          <?php wp_nonce_field( 'eh_contact_submit', 'eh_contact_nonce' ); ?>
          <input type="text" name="eh_contact_hp" class="form-honeypot" tabindex="-1" autocomplete="off" aria-hidden="true">

          <div class="form-row">
            <div class="form-field">
              <label for="eh_name">Name <span class="required">*</span></label>
              <input type="text" id="eh_name" name="eh_name" value="<?php echo esc_attr( isset( $eh_old['name'] ) ? $eh_old['name'] : '' ); ?>" required>
            </div>
            <div class="form-field">
              <label for="eh_phone">Phone <span class="required">*</span></label>
              <input type="tel" id="eh_phone" name="eh_phone" value="<?php echo esc_attr( isset( $eh_old['phone'] ) ? $eh_old['phone'] : '' ); ?>" required>
            </div>
          </div>

          <div class="form-field">
            <label for="eh_email">Email <span class="required">*</span></label>
            <input type="email" id="eh_email" name="eh_email" value="<?php echo esc_attr( isset( $eh_old['email'] ) ? $eh_old['email'] : '' ); ?>" required>
          </div>

          <div class="form-field">
            <label for="eh_equipment">Equipment You're Interested In <span class="required">*</span></label>
            <select id="eh_equipment" name="eh_equipment" required>
              <option value="">Choose one&hellip;</option>
              <?php foreach ( eh_contact_equipment_options() as $option ) : ?>
              <option value="<?php echo esc_attr( $option ); ?>" <?php selected( isset( $eh_old['equipment'] ) ? $eh_old['equipment'] : '', $option ); ?>><?php echo esc_html( $option ); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-field">
            <label for="eh_message">Anything Else We Should Know? <span style="opacity:.6;font-weight:400;text-transform:none;letter-spacing:0;">(optional)</span></label>
            <textarea id="eh_message" name="eh_message" rows="4"><?php echo esc_textarea( isset( $eh_old['message'] ) ? $eh_old['message'] : '' ); ?></textarea>
          </div>

          <button type="submit" name="eh_contact_submit" value="1" class="btn btn-primary"><?php echo esc_html( eh_field( $eh_post_id, 'contact_submit_label', 'Send Message' ) ); ?></button>
        </form>

      <?php endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
