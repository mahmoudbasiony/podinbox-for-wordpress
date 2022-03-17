<?php
/**
 * Handles generated CSS styles.
 *
 * @package PodInbox
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$display_device = podinbox_get_option( 'display_device', $this->settings );

// Initialize generated css string.
$generated_css = '';

if ( 'desktop' === $display_device ) {
	$generated_css = '@media only screen and (max-width: 768px) {
		.podinbox__floating-trigger-container {display: none !important};
	}';

} elseif ( 'mobile' === $display_device ) {
	$generated_css = '@media only screen and (min-width: 768px) {
		.podinbox__floating-trigger-container {display: none !important};
	}';

}
