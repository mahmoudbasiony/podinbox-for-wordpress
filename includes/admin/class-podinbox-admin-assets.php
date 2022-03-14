<?php
/**
 * The PodInbox_Admin_Assets class.
 *
 * @package PodInbox/Admin
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'PodInbox_Admin_Assets' ) ) :

	/**
	 * Admin assets.
	 *
	 * Handles back-end styles and scripts.
	 *
	 * @since 1.0.0
	 */
	class PodInbox_Admin_Assets {
		/**
		 * The constructor.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'scripts' ), 20 );
			add_action( 'admin_enqueue_scripts', array( $this, 'styles' ), 20 );
		}

		/**
		 * Enqueues admin scripts.
		 *
		 * @since   1.0.0
		 * @version 1.1.0
		 *
		 * @return void
		 */
		public function scripts() {
			$current_page = isset( $_GET ) && isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '';
			if ( empty( $current_page ) || 'podinbox-settings' !== $current_page ) {
				return;
			}

			// Global admin scripts.
			wp_enqueue_script(
				'podinbox_admin_scripts',
				PODINBOX_ROOT_URL . 'assets/dist/js/admin/podinbox-admin-scripts.min.js',
				array( 'jquery' ),
				PODINBOX_PLUGIN_VERSION,
				true
			);

			// Localization variables.
			wp_localize_script(
				'podinbox_admin_scripts',
				'podinbox_params',
				array(
					'ajax_url'       => esc_url( admin_url( 'admin-ajax.php' ) ),
					'nonce'          => wp_create_nonce( 'podinbox-nonce' ),
					'translations'   => array(
						'required'                  => esc_html__( 'This field is required!', 'podinbox' ),
						'google_places_placeholder' => esc_html__( 'Business Name', 'podinbox' ),
						'no_places_found'           => esc_html__( 'No places found', 'podinbox' ),
						'add_source_success'        => array(
							'title'   => esc_html__( 'Review Source', 'podinbox' ),
							'message' => esc_html__( 'Your review source has been added. We are currently fetching the reviews.', 'podinbox' ),
						),
						'confirm_delete'            => esc_html__( 'Are you sure to delete this item', 'podinbox' ),
						'another_account'           => esc_html__( 'Are you sure? This will overwrite the existing review sources and widgets', 'podinbox' ),
					),
				)
			);
		}

		/**
		 * Enqueues admin styles.
		 *
		 * @since   1.0.0
		 * @version 1.1.0
		 *
		 * @return void
		 */
		public function styles() {
			// Global admin styles.
			wp_enqueue_style( 'podinbox_admin_styles', PODINBOX_ROOT_URL . 'assets/dist/css/admin/podinbox-admin-styles.min.css', array(), PODINBOX_PLUGIN_VERSION, 'all' );
		}
	}

	return new PodInbox_Admin_Assets();

endif;
