<?php
/**
 * Uninstall script for the Cookie Consent By VP plugin.
 *
 * This script deletes the plugin's settings from the WordPress database.
 *
 * @package CookieConsentByVP
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option( 'ccvp_consent_cookie_settings' );
