<?php
/**
 * Uninstall PodInbox plugin.
 *
 * @package PodInbox
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit; // Exit if uninstall not called from WordPress.
}

/*
 * Only remove plugin data if the WP_UNINSTALL_PLUGIN constant is set to true in user's
 * wp-config.php. This is to prevent data loss when deleting the plugin from the backend
 * and to ensure only the site owner can perform this action.
 */
if ( defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	/*
	 * Delete plugin options.
	 */
	delete_option( 'podinbox_floating_button_widget_settings' );
}
