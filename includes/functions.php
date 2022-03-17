<?php
/**
 * Some helper core functions.
 *
 * @package PodInbox
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'podinbox_get_options' ) ) {
	/**
	 * Get the PodInbox settings.
	 *
	 * @since 1.0.0
	 *
	 * @return array The PodInbox plugin settings.
	 */
	function podinbox_get_options() {
		return get_option( 'podinbox_floating_button_widget_settings', array() );
	}
}

if ( ! function_exists( 'podinbox_get_option' ) ) {
	/**
	 * Get the PodInbox setting.
	 *
	 * @param string $name     The option name.
	 * @param array  $settings The options array - Default: Null.
	 *
	 * @since 1.0.0
	 *
	 * @return string the option value.
	 */
	function podinbox_get_option( $name, $settings = null ) {
		// Get the podinbox plugin settings.
		if ( ! $settings || ! is_array( $settings ) ) {
			$settings = podinbox_get_options();
		}

		// Validate option not exist.
		if ( ! isset( $settings[ $name ] ) ) {
			return '';
		}

		return $settings[ $name ];
	}
}

if ( ! function_exists( 'podinbox_sanitize' ) ) {
	/**
	 * Sanitize values to be saved to the database.
	 *
	 * @param string $name  The option name.
	 * @param string $value The option value to be sanitized.
	 *
	 * @since 1.0.0
	 *
	 * @return string The sanitized value.
	 */
	function podinbox_sanitize( $name, $value ) {
		switch ( $name ) {
			case 'show_id':
			case 'enable_floating_button':
			case 'script_placement':
			case 'display_device':
			case 'created_at':
			case 'updated_at':
				return sanitize_text_field( $value );

			default:
				return sanitize_text_field( $value );
		}
	}
}

if ( ! function_exists( 'podinbox_sanitize' ) ) {
	/**
	 * Sanitize values to be saved to the database.
	 *
	 * @param string $name  The option name.
	 * @param string $value The option value to be sanitized.
	 *
	 * @since 1.0.0
	 *
	 * @return string The sanitized value.
	 */
	function podinbox_sanitize( $name, $value ) {
		switch ( $name ) {
			case 'show_id':
			case 'enable_floating_button':
			case 'script_placement':
			case 'display_device':
			case 'created_at':
			case 'updated_at':
				return sanitize_text_field( $value );

			default:
				return sanitize_text_field( $value );
		}
	}
}

if ( ! function_exists( 'podinbox_update_options' ) ) {
	/**
	 * Update PodInbox options in the database.
	 *
	 * @param array $options The plugin settings.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the options updated or not.
	 */
	function podinbox_update_options( $options ) {
		return update_option( 'podinbox_floating_button_widget_settings', $options );
	}
}



