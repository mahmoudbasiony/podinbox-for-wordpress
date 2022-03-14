<?php
/**
 * Plugin Name: PodInbox
 * Plugin URI:
 * Description: .
 * Version: 1.0.0
 * Author: PodInbox
 * Author URI: https://www.podinbox.com
 * Requires at least: 4.7.0
 * Tested up to: 5.8
 *
 * Text Domain: podinbox
 * Domain Path: /languages/
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package PodInbox
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
 * Globals constants.
 */
define( 'PODINBOX_PLUGIN_VERSION', '1.1.0' );
define( 'PODINBOX_MIN_PHP_VER', '5.6.0' );
define( 'PODINBOX_MIN_WP_VER', '4.7.0' );
define( 'PODINBOX_ROOT_PATH', dirname( __FILE__ ) );
define( 'PODINBOX_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'PODINBOX_TEMPLATES_PATH', dirname( __FILE__ ) . '/views/' );

if ( ! class_exists( 'PodInbox' ) ) :

	/**
	 * The main class.
	 *
	 * @since 1.0.0
	 */
	class PodInbox {
		/**
		 * Plugin version.
		 *
		 * @since 1.0.0
		 *
		 * @var string
		 */
		public $version = '1.0.0';

		/**
		 * The singelton instance of PodInbox.
		 *
		 * @since 1.0.0
		 *
		 * @var PodInbox
		 */
		private static $instance = null;

		/**
		 * Returns the singelton instance of PodInbox.
		 *
		 * Ensures only one instance of PodInbox is/can be loaded.
		 *
		 * @since 1.0.0
		 *
		 * @return PodInbox
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * The constructor.
		 *
		 * Private constructor to make sure it can not be called directly from outside the class.
		 *
		 * @since 1.0.0
		 */
		private function __construct() {
			$this->includes();
			$this->hooks();

			do_action( 'podinbox_loaded' );
		}

		/**
		 * Includes the required files.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function includes() {
			/*
			 * Global includes.
			 */
			include_once PODINBOX_ROOT_PATH . '/includes/class-podinbox-floating-button.php';

			/*
			 * Back-end includes.
			 */
			if ( is_admin() ) {
				include_once PODINBOX_ROOT_PATH . '/includes/admin/class-podinbox-admin-notices.php';
				include_once PODINBOX_ROOT_PATH . '/includes/admin/class-podinbox-admin-assets.php';
				include_once PODINBOX_ROOT_PATH . '/includes/admin/class-podinbox-admin-settings.php';
				include_once PODINBOX_ROOT_PATH . '/includes/admin/class-podinbox-admin-ajax.php';
			}
		}

		/**
		 * Plugin hooks.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function hooks() {
			// Filters.
			add_filter( 'plugin_action_links', array( $this, 'adds_settings_action_plugin' ), 10, 5 );

			// Actions.

		}

		/**
		 * Adds settings link to plugin action links.
		 *
		 * @param array  $actions     The plugin actions.
		 * @param string $plugin_file The plugin file Path.
		 *
		 * @since 1.0.0
		 *
		 * @return array $actions
		 */
		public function adds_settings_action_plugin( $actions, $plugin_file ) {
			static $plugin;

			if ( ! isset( $plugin ) ) {
				$plugin = plugin_basename( __FILE__ );
			}

			if ( $plugin == $plugin_file ) {
				$settings = array(
					'settings' => '<a href="' . esc_url( admin_url( 'admin.php?page=podinbox&tab=setup' ) ) . '">' . esc_html__( 'Settings', 'podinbox' ) . '</a>',
				);

				// Merge settings link to plugin actions link.
				$actions = array_merge( $settings, $actions );
			}

			return $actions;
		}

		/**
		 * Activation hooks.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function activate() {
			/*
			 * Set default settings.
			 */
			$settings['show_id'] = '';
			$settings['enable_floating_button'] = '';
			$settings['script_placement'] = 'header';
			$settings['display_device'] = 'desktop-and-mobile';
			$settings['created_at'] = current_time( 'mysql' );
			$settings['updated_at'] = current_time( 'mysql' );

			add_option( 'podinbox_floating_button_widget_settings', $settings );
		}

		/**
		 * Deactivation hooks.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function deactivate() {
			// Nothing to do for now.
		}

		/**
		 * Uninstall hooks.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public static function uninstall() {
			include_once PODINBOX_ROOT_PATH . 'uninstall.php';
		}
	}

	// Plugin hooks.
	register_activation_hook( __FILE__, array( 'PodInbox', 'activate' ) );
	register_deactivation_hook( __FILE__, array( 'PodInbox', 'deactivate' ) );
	register_uninstall_hook( __FILE__, array( 'PodInbox', 'uninstall' ) );

endif;

/**
 * Init plugin.
 *
 * @since 1.0.0
 */
function podinbox_init() {
	// Global for backwards compatibility.
	$GLOBALS['podinbox'] = PodInbox::get_instance();
}

add_action( 'plugins_loaded', 'podinbox_init', 0 );
