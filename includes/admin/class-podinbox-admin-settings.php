<?php
/**
 * The PodInbox_Admin_Settings class.
 *
 * @package PodInbox/Admin
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'PodInbox_Admin_Settings' ) ) :

	/**
	 * Admin settings.
	 *
	 * Creates PodInbox settings page.
	 *
	 * @since 1.0.0
	 */
	class PodInbox_Admin_Settings {
		/**
		 * The constructor.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'menu' ), 10 );
		}

		/**
		 * Adds options page under settingss.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function menu() {
			add_options_page( esc_html__( 'PodInbox', 'podinbox' ), __( 'PodInbox', 'podinbox' ), 'manage_options', 'podinbox-settings', array( $this, 'settings' ) );
		}

		/**
		 * Renders settings page.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function settings() {
			include_once( PODINBOX_ROOT_PATH . '/views/admin/settings.php' );
		}

	}

	return new PodInbox_Admin_Settings();

endif;
