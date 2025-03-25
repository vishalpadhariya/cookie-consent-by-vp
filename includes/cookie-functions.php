<?php
/**
 * Cookie Functions for Cookie Consent By VP Plugin
 *
 * @package CookieConsentByVP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Displays the cookie consent banner.
 */
function ccvp_consent_cookie_banner() {
	?>
	<div id="ccvp-gdpr-ccpa-cookie-banner" class="ccvp-gdpr-ccpa-hidden">
		<p id="ccvp-gdpr-ccpa-message"></p>
		<button id="ccvp-gdpr-ccpa-accept"></button>
		<button id="ccvp-gdpr-ccpa-decline"></button>
	</div>
	<?php
}
add_action( 'wp_footer', 'ccvp_consent_cookie_banner' );
