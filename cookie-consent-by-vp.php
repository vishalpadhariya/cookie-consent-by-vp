<?php
/**
 * Plugin Name: Cookie Consent For GDPR/CCPA By Vishal Padhariya
 * Plugin URI:  https://vishalpadhariya.github.io/cookie-consent-by-vp/
 * Description: A dynamic and manageable cookie consent solution for GDPR/CCPA compliance.
 * Version:     1.0.0
 * Author:      Vishal Padhariya
 * Author URI:  https://vishalpadhariya.github.io/
 * License:     GPL2
 * Text Domain: cookie-consent-by-vp
 *
 * @package    cookie-consent-by-vp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CC_GDPR_CCPA_VP_DIR', plugin_dir_path( __FILE__ ) );
define( 'CC_GDPR_CCPA_VP_URL', plugin_dir_url( __FILE__ ) );

require_once CC_GDPR_CCPA_VP_DIR . 'includes/enqueue-scripts.php';
require_once CC_GDPR_CCPA_VP_DIR . 'includes/admin-settings.php';
require_once CC_GDPR_CCPA_VP_DIR . 'includes/cookie-functions.php';

/**
 * Activate the  Cookie Consent plugin.
 *
 * Adds default cookie settings to the options table.
 */
function ccvp_consent_activate() {
	add_option(
		'ccvp_consent_cookie_settings',
		array(
			'message'      => 'We use cookies to enhance your experience.',
			'accept_text'  => 'Accept',
			'decline_text' => 'Decline',
			'expiry_days'  => 30,
		)
	);
}
register_activation_hook( __FILE__, 'ccvp_consent_activate' );

/**
 * Deactivate the  Cookie Consent plugin.
 *
 * Removes the cookie settings from the options table.
 */
function ccvp_consent_deactivate() {
	delete_option( 'ccvp_consent_cookie_settings' );
}
register_deactivation_hook( __FILE__, 'ccvp_consent_deactivate' );
