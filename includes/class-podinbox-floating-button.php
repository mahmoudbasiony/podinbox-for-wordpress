<?php
/**
 * The PodInbox_Floating_Button class.
 *
 * @package PodInbox
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'PodInbox_Floating_Button' ) ) :

	/**
	 * PodInbox floating buttons.
	 *
	 * Handles adding PodInbox floating button on sites..
	 *
	 * @since 1.0.0
	 */
	class PodInbox_Floating_Button {
		/**
		 * 
		 */
		private static $settings;

		/**
		 * The constructor.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function __construct() {
			self::$settings = get_option( 'podinbox_floating_button_widget_settings', array() );

			if ( isset( self::$settings['enable_floating_button'] ) &&  'yes' === self::$settings['enable_floating_button'] ) {
				switch ( self::$settings['script_placement'] ) {
					case 'header' :
						add_action( 'wp_head', array( $this, 'insert_widget_place' ) );
					break;

					case 'body' :

					break;

					case 'footer' :

					break;

					default :
						add_action( 'wp_head', array( $this, 'insert_widget_place' ) );
					break;
				}
			}
		}

		/**
		 * 
		 */
		public function insert_widget_place() {
			$show_id = self::$settings['show_id'];
			$display_device = self::$settings['display_device'];

			if ( 'both' === $display_device ) {

			}

			?>
				<script type="text/javascript">
					var w = document.documentElement.clientWidth || window.innerWidth;
					var displayDevice = "<?php echo $display_device ?>";

					if (w <= 480 && 'mobile' === displayDevice) {
					// Probably mobile
					} else {
					// Probably desktop
					}
				</script>';'
			<?php
			echo '<script>var podinboxFloatingWidget = "'.esc_attr( $show_id ).'"; </script>';
			echo '<script type="text/javascript" src="https://podinbox.net/widget.js" podinbox-origin="https://podinbox.net" async></script>';
		}
	}

	return new PodInbox_Floating_Button();

endif;
