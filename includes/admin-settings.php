<?php
/**
 * Cookie Consent Admin Settings
 *
 * @package Cookie_Consent_By_VP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the Cookie Consent settings.
 */
function ccvp_consent_register_settings() {
	register_setting( 'ccvp_consent_cookie_settings_group', 'ccvp_consent_cookie_settings', 'ccvp_sanitize_settings' );
}

/**
 * Renders the Cookie Consent settings page.
 */
function ccvp_consent_settings_page() {
	$settings = get_option( 'ccvp_consent_cookie_settings' );
	?>
	<div class="wrap">
		<h2>Cookie Consent Settings</h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'ccvp_consent_cookie_settings_group' ); ?>
			<table class="form-table">
				<tr>
					<th>Cookie Message:</th>
					<td><input type="text" name="ccvp_consent_cookie_settings[message]" value="<?php echo esc_attr( $settings['message'] ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th>Accept Button Text:</th>
					<td><input type="text" name="ccvp_consent_cookie_settings[accept_text]" value="<?php echo esc_attr( $settings['accept_text'] ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th>Decline Button Text:</th>
					<td><input type="text" name="ccvp_consent_cookie_settings[decline_text]" value="<?php echo esc_attr( $settings['decline_text'] ); ?>" class="regular-text"></td>
				</tr>
				<tr>
					<th>Cookie Expiry (days):</th>
					<td><input type="number" name="ccvp_consent_cookie_settings[expiry_days]" value="<?php echo esc_attr( $settings['expiry_days'] ); ?>" class="small-text"></td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Adds the Cookie Consent settings page to the admin menu.
 */
function ccvp_consent_add_admin_menu() {

	add_menu_page(
		'Cookie Consent Settings',
		'Cookie Consent',
		'manage_options',
		'cookie-consent-vp-settings',
		'ccvp_consent_settings_page',
		'dashicons-admin-generic',
		3
	);
}

add_action( 'admin_menu', 'ccvp_consent_add_admin_menu' );
add_action( 'admin_init', 'ccvp_consent_register_settings' );

/**
 * Sanitizes the settings.
 *
 * @param array $input The settings input.
 * @return array The sanitized settings.
 */
function ccvp_sanitize_settings( $input ) {
	$input['message']      = sanitize_text_field( $input['message'] );
	$input['accept_text']  = sanitize_text_field( $input['accept_text'] );
	$input['decline_text'] = sanitize_text_field( $input['decline_text'] );
	$input['expiry_days']  = absint( $input['expiry_days'] );

	return $input;
}