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

					<div class="podinbox-body__step-one-container">
						<div class="podinbox-body__step-one-title">
							<span class="step-one-icon"><?php echo esc_html( '1' ); ?></span>
							<span class="step-one-title"><?php esc_html_e( 'Step 1 - Enter Your PodInbox Show ID', 'podinbox' ); ?></span>
							<span class="podinbox-link">
								<a href="<?php echo esc_url( 'https://podinbox.com/show-page/widget' ); ?>" target="_blank"><?php esc_html_e( 'GET SHOW ID', 'podinbox' ); ?> &nbsp;<svg style="width: 13px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" class="svg-inline--fa fa-external-link-alt fa-w-16 sc-gGLxEB haYsiJ" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" css="vertical-align: middle;"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z"></path></svg></a>
							</span>
						</div>
						<div class="podinbox-body__step-one-form box-shadow">
							<div class="podinbox-body__step-one-input">
								<input type="text" name="podinbox_show_id" class="podinbox-show-id" id="podinbox-show-id" value="<?php echo esc_attr( $show_id ); ?>"/>
							</div>
							<div class="podinbox-body__step-one-action">
								<button type="submit" class="podinbox-show-id-save-changes podinbox-save-changes button-primary" id="podinbox-show-id-save-changes">
									<div class="loader"></div>
									<span><?php esc_html_e( 'SAVE CHANGES', 'podinbox' ); ?></span>
								</button>
							</div>
						</div>
					</div>
