<?php
/**
 * Enqueue scripts and styles for Cookie Consent By VP.
 *
 * @package CookieConsentByVP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles for the Cookie Consent By VP plugin.
 */
function ccvp_consent_enqueue_scripts() {
	wp_enqueue_style( 'ccvp-gdpr-ccpa-style', CC_GDPR_CCPA_VP_URL . 'assets/css/cookie-consent-by-vp-style.css', array(), filemtime( CC_GDPR_CCPA_VP_DIR . 'assets/css/cookie-consent-by-vp-style.css' ) );
	wp_enqueue_script( 'ccvp-gdpr-ccpa-script', CC_GDPR_CCPA_VP_URL . 'assets/js/cookie-consent-by-vp-script.js', array( 'jquery' ), filemtime( CC_GDPR_CCPA_VP_DIR . 'assets/css/cookie-consent-by-vp-script.js' ), true );

	$settings = get_option( 'ccvp_consent_cookie_settings' );
	wp_localize_script(
		'ccvp-gdpr-ccpa-script',
		'ccvp_consent_data',
		array(
			'message'     => $settings['message'],
			'acceptText'  => $settings['accept_text'],
			'declineText' => $settings['decline_text'],
			'expiryDays'  => $settings['expiry_days'],
		)
	);
}

add_action( 'wp_enqueue_scripts', 'ccvp_consent_enqueue_scripts' );
