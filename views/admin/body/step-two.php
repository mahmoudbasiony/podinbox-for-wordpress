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

					<div class="podinbox-body__step-two-container <?php echo '' === $show_id ? 'disabled' : ''; ?>">
						<div class="podinbox-body__step-two-title">
							<span class="step-one-icon"><?php echo esc_html( '2' ); ?></span>
							<span class="step-one-title"><?php esc_html_e( 'Step 2 - Enable Your Widget', 'podinbox' ); ?></span>
						</div>
						<div class="podinbox-body__step-two">
							<div class="podinbox-body__floating-widget-image box-shadow">
								<img src="<?php echo esc_url( PODINBOX_ROOT_URL . '/assets/dist/images/podinbox-floating-widget.png' ); ?>" class="" alt="" />
							</div>

							<div class="podinbox-body__floating-widget-install box-shadow">
								<div class="floating-widget-install__title">
									<h2><?php esc_html_e( 'Install Floating Button Widget', 'podinbox' ); ?></h2>
								</div>

								<div class="floating-widget-install__enable">
								<label class="floating-widget-install__switch">
									<input type="checkbox" class="podinbox-enable-floating-widget" name="podinbox_enable_floating_widget" id="podinbox-enable-floating-widget" <?php echo 'yes' === $enabled ? 'checked=checked' : ''; ?>/>
									<span class="floating-widget-install__slider floating-widget-install__round"></span>
								</label>
									<label for="podinbox-enable-floating-widget"><?php esc_html_e( 'Enable floating button on your website', 'podinbox' ); ?></label>
								</div>

								<div class="floating-widget-install__advanced_options">
									<div class="floating-widget-install__advanced collapsed">
										<span class="advanced-option"><?php esc_html_e( 'advanced', 'podinbox' ); ?></span>
									</div>

									<div class="floating-widget-install__options" style="display: none;">
										<p class="floating-widget-install-options__title"><?php esc_html_e( 'Script Placement', 'podinbox' ); ?></p>
										<div class="radio-group">
											
											<label class="floating-widget-install-label__container" for="podinbox_script_placement-header"><?php esc_html_e( 'Header', 'podinbox' ); ?>
												<input type="radio" value="header" name="podinbox_script_placement" id="podinbox_script_placement-header" <?php echo 'header' === $script_placement ? 'checked=checked' : ''; ?>>
												<span class="floating-widget-install-label__checkmark"></span>
											</label>

											<label class="floating-widget-install-label__container"  for="podinbox_script_placement-body_open"> <?php printf( '%1$s &lt;body&gt; %2$s', esc_html__( 'After', 'podinbox' ), esc_html__( 'tag', 'podinbox' ) ); ?>
												<input type="radio" value="body_open" name="podinbox_script_placement" 	id="podinbox_script_placement-body_open" <?php echo 'body_open' === $script_placement ? 'checked=checked' : ''; ?>>
												<span class="floating-widget-install-label__checkmark"></span>
											</label>
											
											<label class="floating-widget-install-label__container" for="podinbox_script_placement-footer"><?php esc_html_e( 'Footer', 'podinbox' ); ?>
												<input type="radio" value="footer" name="podinbox_script_placement" id="podinbox_script_placement-footer" <?php echo 'footer' === $script_placement ? 'checked=checked' : ''; ?>>
												<span class="floating-widget-install-label__checkmark"></span>
											</label>
											
										</div>

										<p class="floating-widget-install-options__title"><?php esc_html_e( 'Device', 'podinbox' ); ?></p>
										<div class="radio-group">
											<label class="floating-widget-install-label__container" for="podinbox_display_device-both"><?php esc_html_e( 'Desktop & Mobile', 'podinbox' ); ?>
												<input type="radio" checked="checked" value="both" name="podinbox_display_device" id="podinbox_display_device-both" <?php echo 'both' === $display_device ? 'checked=checked' : ''; ?>>
												<span class="floating-widget-install-label__checkmark"></span>
											</label>
											<label class="floating-widget-install-label__container" for="podinbox_display_device-desktop"> <?php esc_html_e( 'Desktop Only', 'podinbox' ); ?>
												<input type="radio" value="desktop" name="podinbox_display_device" id="podinbox_display_device-desktop" <?php echo 'desktop' === $display_device ? 'checked=checked' : ''; ?>>
												<span class="floating-widget-install-label__checkmark"></span>
											</label>
											<label class="floating-widget-install-label__container"  for="podinbox_display_device-mobile"><?php esc_html_e( 'Mobile Only', 'podinbox' ); ?>
												<input type="radio" value="mobile" name="podinbox_display_device" id="podinbox_display_device-mobile" <?php echo 'mobile' === $display_device ? 'checked=checked' : ''; ?>>
												<span class="floating-widget-install-label__checkmark"></span>
											</label>
										</div>
									</div>
								</div>
								
								<div class="floating-widget-install__save">
									<button transform="uppercase" type="submit" class="podinbox-save-changes button-primary podinbox-floating-button-install-save" id="podinbox-floating-button-install-save">
										<div class="loader"></div>
										<span><?php esc_html_e( 'SAVE CHANGES', 'podinbox' ); ?></span>
									</button>
									<a href="<?php echo esc_url( 'https://podinbox.com/show-page/widget' ); ?>" target="_blank" class="podinbox-configure-widget button-primary" id="podinbox-configure-widget">
										<span><?php esc_html_e( 'CONFIGURE WIDGET', 'podinbox' ); ?> &nbsp;<svg style="width: 13px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" class="svg-inline--fa fa-external-link-alt fa-w-16 sc-gGLxEB haYsiJ" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" css="vertical-align: middle;"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z"></path></svg></span>
									</a>
								</div>
							</div>
						</div>
					</div>
