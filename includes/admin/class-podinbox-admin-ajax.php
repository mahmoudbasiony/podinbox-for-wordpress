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
		 * The constructor.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'wp_ajax_podinbox_save_show_id', array( $this, 'save_show_id' ) );
		}

		/**
		 * 
		 */
		public function save_show_id() {
			// Check for nonce security.
			if ( ! wp_verify_nonce( $_POST['nonce'], 'podinbox-nonce' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'podinbox' ) );
			}

			if ( isset( $_POST ) && isset( $_POST['action'] ) && 'podinbox_save_show_id' === $_POST['action'] ) {
				$show_id = isset( $_POST['show_id'] ) ? sanitize_text_field( $_POST['show_id'] ) : '';

				$settings = get_option( 'podinbox_floating_button_widget_settings', array() );
				$settings['show_id'] = $show_id;
				$settings['updated_at'] = current_time( 'mysql' );

				if ( update_option( 'podinbox_floating_button_widget_settings', $settings ) ) {
					wp_send_json_success( $show_id );
				}

				die();
			}
		}
		/**
		 * Renders the edit/create widget form.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function renders_widget_form() {
			// Check for nonce security.
			if ( ! wp_verify_nonce( $_POST['nonce'], 'podinbox-nonce' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'podinbox' ) );
			}

			if ( isset( $_POST ) && isset( $_POST['action'] ) && 'podinbox_renders_widget_form' === $_POST['action'] ) {
				$widget_id = isset( $_POST['widget_id'] ) ? absint( $_POST['widget_id'] ) : 0;

				$form = podinbox_render_widget_form( $widget_id );

				if ( ! $form ) {
					wp_die( esc_html__( 'Something went wrong! Cannot get the edit widget form', 'podinbox' ) );
				}

				// Declare result array.
				$result = array();

				// Append result to result array.
				$result['widget_id'] = $widget_id;
				$result['form']      = $form;
				$result['status']    = 200;

				// Send the json success.
				wp_send_json_success( $result );

			}

			die();
		}

	}

	return new PodInbox_Admin_Ajax();

endif;
