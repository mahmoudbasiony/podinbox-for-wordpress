<?php
/**
 * Settings - Header.
 *
 * @package PodInbox/Views/Admin/Header
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//phpcs:disable VariableAnalysis
// There are "undefined" variables here because they're defined in the code that includes this file as a template.
?>

	<div class="podinbox-masthead">
		<div class="podinbox-masthead__inside-container">
			<div class="podinbox-masthead__logo-container">
				<img class="podinbox-masthead__logo" src="<?php echo esc_url( PODINBOX_ROOT_URL . '/assets/dist/images/podinbox-logo-red.png' ); ?>" alt="PodInbox" />
			</div>

			<div class="podinbox-masthead__info-container">
				<div class="podinbox-masthead__info">
					<span><?php esc_html_e( 'a', 'podinbox' ); ?></span>
						<a href="<?php echo esc_url( 'https://podinbox.com/' ); ?>" target="_blank"><?php esc_html_e( 'PodInbox Account', 'podinbox' ); ?></a>
					<span><?php esc_html_e( 'is required to use this plugin', 'podinbox' ); ?></span>
				</div>

				<div class="podinbox-masthead__signup">
					<a class="podinbox-signup" href="<?php echo esc_url( 'https://podinbox.com/' ); ?>" target="_blank"><?php esc_html_e( 'SIGN UP FREE', 'podinbox' ); ?></a>
				</div>
			</div>
		</div>
	</div>
