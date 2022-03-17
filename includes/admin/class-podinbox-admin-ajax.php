<?php
/**
 * The PodInbox_Admin_Ajax class.
 *
 * @package PodInbox/Admin
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'PodInbox_Admin_Ajax' ) ) :

	/**
	 * Admin Ajax.
	 *
	 * Calls admin Ajax.
	 *
	 * @since 1.0.0
	 */
	class PodInbox_Admin_Ajax {
		/**
		 * The plugin settings.
		 *
		 * @since 1.0.0
		 * @var array
		 */
		private $settings;

		/**
		 * The constructor.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			$this->settings = podinbox_get_options();

			add_action( 'wp_ajax_podinbox_save_show_id', array( $this, 'save_show_id' ) );
			add_action( 'wp_ajax_podinbox_save_floating_button_options', array( $this, 'save_floating_button_options' ) );
		}

		/**
		 * Save the show ID.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function save_show_id() {
			// Check for nonce security.
			if ( ! wp_verify_nonce( $_POST['nonce'], 'podinbox-nonce' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'podinbox' ) );
			}

			// Validate custom data action.
			if ( isset( $_POST ) && isset( $_POST['action'] ) && 'podinbox_save_show_id' === $_POST['action'] ) {
				$show_id = isset( $_POST['show_id'] ) ? podinbox_sanitize( 'show_id', $_POST['show_id'] ) : '';

				$this->settings['show_id']    = $show_id;
				$this->settings['updated_at'] = podinbox_sanitize( 'updated_at', current_time( 'mysql' ) );

				// Disable floating button if empty show ID.
				if ( '' === $show_id || empty( $show_id ) ) {
					$this->settings['enable_floating_button'] = '';
				}

				// Initialize results array.
				$result = array();

				if ( podinbox_update_options( $this->settings ) ) {
					$result['status']  = 200;
					$result['message'] = esc_html__( 'Your Show ID has been updated successfully', 'podinbox' );
					$result['show_id'] = $show_id;

					wp_send_json_success( $result );
				}

				die();
			}
		}

		/**
		 * Save float button widget install options.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function save_floating_button_options() {
			// Check for nonce security.
			if ( ! wp_verify_nonce( $_POST['nonce'], 'podinbox-nonce' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'podinbox' ) );
			}

			// Validate custom data action.
			if ( isset( $_POST ) && isset( $_POST['action'] ) && 'podinbox_save_floating_button_options' === $_POST['action'] ) {
				$enabled          = isset( $_POST['enabled'] ) ? podinbox_sanitize( 'enable_floating_button', $_POST['enabled'] ) : '';
				$script_placement = isset( $_POST['script_placement'] ) ? podinbox_sanitize( 'script_placement', $_POST['script_placement'] ) : '';
				$display_device   = isset( $_POST['display_device'] ) ? podinbox_sanitize( 'display_device', $_POST['display_device'] ) : '';

				$this->settings['enable_floating_button'] = $enabled;
				$this->settings['script_placement']       = $script_placement;
				$this->settings['display_device']         = $display_device;
				$this->settings['updated_at']             = podinbox_sanitize( 'updated_at', current_time( 'mysql' ) );

				// Initialize results array.
				$result = array();

				if ( podinbox_update_options( $this->settings ) ) {
					$result['status']  = 200;
					$result['message'] = esc_html__( 'Your changes have been saved successfully', 'podinbox' );

					wp_send_json_success( $result );
				}

				die();
			}
		}
	}

	return new PodInbox_Admin_Ajax();

endif;
