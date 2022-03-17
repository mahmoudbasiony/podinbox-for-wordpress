<?php
/**
 * Settings - Body.
 *
 * @package PodInbox/Views/Admin/Body
 * @author  PodInbox
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//phpcs:disable VariableAnalysis
// There are "undefined" variables here because they're defined in the code that includes this file as a template.
?>

			<div class="podinbox-body__info-container">
				<h1 class="podinbox-body__info-title"><?php esc_html_e( 'PodInbox for WordPress', 'podinbox' ); ?></h1>

				<div class="podinbox-body__info">
					<p>
						<?php esc_html_e( 'Add a PodInbox floating button on your website to receive audio messages from your site visitors!', 'podinbox' ); ?><br>
						<?php esc_html_e( 'A', 'podinbox' ); ?> <a href="<?php echo esc_url( 'https://podinbox.com/' ); ?>" target="_blank"><?php esc_html_e( 'PodInbox Account', 'podinbox' ); ?></a>
						<?php esc_html_e( 'is required to use this plugin. ', 'podinbox' ); ?>
						<a href="<?php echo esc_url( 'https://podinbox.com/' ); ?>" target="_blank"><?php esc_html_e( 'Sign up', 'podinbox' ); ?></a>
						<?php esc_html_e( 'for a FREE account!', 'podinbox' ); ?>
						
					</p>
				</div>
			</div>
