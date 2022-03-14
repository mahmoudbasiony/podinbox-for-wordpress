<?php

?>

<div class="podinbox-plugin-container">
	<div class="podinbox-masthead">
		<div class="podinbox-masthead__inside-container">
			<div class="podinbox-masthead__logo-container">
				<img class="podinbox-masthead__logo" src="<?php echo esc_url( PODINBOX_ROOT_URL . '/assets/dist/images/podinbox-logo-red.png' ); ?>" alt="PodInbox" />
			</div>

			<div class="podinbox-masthead__info-container">
				<div class="podinbox-masthead__info">
					<span><?php esc_html_e( 'a', 'podinbox' ); ?></span>
					<span class="podinbox-link">
						<a href="<?php echo esc_url( 'https://podinbox.com/' ); ?>"><?php esc_html_e( 'PodInbox Account', 'podinbox' ); ?></a>
					</span>
					<span><?php esc_html_e( 'is required to use this plugin', 'podinbox' ); ?></span>
				</div>

				<div class="podinbox-masthead__signup">
					<a class="podinbox-signup" href="<?php echo esc_url( 'https://podinbox.com/' ); ?>"><?php esc_html_e( 'SIGN UP FREE', 'podinbox' ); ?></a>
				</div>
			</div>
		</div>
	</div>

	<div class="podinbox-body">
		<div class="podinbox-body__inside-container">
			<div class="podinbox-body__info-container">
				<h1 class="podinbox-body__info-title"><?php esc_html_e( 'PodInbox for WordPress', 'podinbox' ); ?></h1>

				<div class="podinbox-body__info">
					<p><?php esc_html_e( 'Add a PodInbox floating button on your website to receive audio messages from your site visitors!', 'podinbox' ); ?></p>
					<span><?php esc_html_e( 'a', 'podinbox' ); ?></span>
					<span class="podinbox-link">
						<a href="<?php echo esc_url( 'https://podinbox.com/' ); ?>"><?php esc_html_e( 'PodInbox Account', 'podinbox' ); ?></a>
					</span>
					<span><?php esc_html_e( 'is required to use this plugin', 'podinbox' ); ?></span>
				</div>
			</div>

			<div class="podinbox-body__steps-container">
				<div class="podinbox-body__steps">
					<div class="podinbox-body__step-one-container">
						<div class="podinbox-body__step-one-title">
							<span class="step-one-icon"><?php echo esc_html( '1' ); ?></span>
							<span class="step-one-title"><?php esc_html_e( 'Step 1 - Enter Your PodInbox Show ID', 'podinbox' ); ?></span>
							<span class="podinbox-link">
								<a href="<?php echo esc_url( 'https://podinbox.com/show-page/widget' ); ?>"><?php esc_html_e( 'GET WIDGET ID', 'podinbox' ); ?></a>
							</span>
						</div>
						<div class="podinbox-body__step-one-form">
							<div class="podinbox-body__step-one-input">
								<input type="text" name="podinbox_show_id" class="podinbox-show-id" id="podinbox-show-id" />
							</div>
							<div class="podinbox-body__step-one-action">
								<button type="submit" class="podinbox-show-id-save-changes podinbox-save-changes button-primary" id="podinbox-show-id-save-changes">
									<span><?php esc_html_e( 'SAVE CHANGES', 'podinbox' ); ?></span>
								</button>
							</div>
						</div>
					</div>

					<div class="podinbox-body__step-two-container">
						<div class="podinbox-body__step-two-title">
							<span class="step-one-icon"><?php echo esc_html( '2' ); ?></span>
							<span class="step-one-title"><?php esc_html_e( 'Step 2 - Enable Your Widget', 'podinbox' ); ?></span>
						</div>
						<div class="podinbox-body__step-two">
							<div class="podinbox-body__floating-widget-image">
								<img src="<?php echo esc_url( PODINBOX_ROOT_URL . '/assets/dist/images/podinbox-floating-widget.png' ); ?>" class="" alt="" />
							</div>

							<div class="podinbox-body__floating-widget-install">
								<div class="floating-widget-install__title">
									<h2><?php esc_html_e( 'Install Floating Button Widget', 'podinbox' ); ?></h2>
								</div>

								<div class="floating-widget-install__enable">
									<input type="checkbox" class="podinbox-enable-floating-widget" name="podinbox_enable_floating_widget" id="podinbox-enable-floating-widget" />
									<label for="podinbox-enable-floating-widget"><?php esc_html_e( 'Enable floating button on your website', 'podinbox' ); ?></label>
								</div>

								<div class="floating-widget-install__advanced_options">
									<div class="floating-widget-install__advanced collapsed">
										<span class="advanced-option"><?php esc_html_e( 'advanced', 'podinbox' ); ?></span>
									</div>

									<div class="floating-widget-install__options" style="display: none;">
										<p><?php esc_html_e( 'Script Placement', 'podinbox' ); ?></p>
										<div class="radio-group">
											<input type="radio" checked="checked" value="header" name="podinbox_script_placement" id="podinbox_script_placement-header">
											<label class="" for="podinbox_script_placement-header"><?php esc_html_e( 'Header', 'podinbox' ); ?></label><br>
											<input type="radio" value="body_open" name="podinbox_script_placement" id="podinbox_script_placement-body_open">
											<label class="" for="podinbox_script_placement-body_open"> <?php printf( '%1$s &lt;body&gt; %2$s', esc_html__( 'After', 'podinbox' ), esc_html__( 'tag', 'podinbox' ) ); ?></label><br>
											<input type="radio" value="footer" name="podinbox_script_placement" id="podinbox_script_placement-footer">
											<label class="" for="podinbox_script_placement-footer"><?php esc_html_e( 'Footer', 'podinbox' ); ?></label><br>
										</div>

										<p><?php esc_html_e( 'Device', 'podinbox' ); ?></p>
										<div class="radio-group">
											<input type="radio" checked="checked" value="both" name="podinbox_display_device" id="podinbox_display_device-both">
											<label class="" for="podinbox_display_device-both"><?php esc_html_e( 'Desktop & Mobile', 'podinbox' ); ?></label><br>
											<input type="radio" value="desktop" name="podinbox_display_device" id="podinbox_display_device-desktop">
											<label class="" for="podinbox_display_device-desktop"> <?php esc_html_e( 'Desktop Only', 'podinbox' ); ?></label><br>
											<input type="radio" value="mobile" name="podinbox_display_device" id="podinbox_display_device-mobile">
											<label class="" for="podinbox_display_device-mobile"><?php esc_html_e( 'Mobile Only', 'podinbox' ); ?></label><br>
										</div>
									</div>
								</div>
								
								<div class="floating-widget-install__save">
									<button transform="uppercase" type="submit" class="podinbox-save-changes button-primary podinbox-floating-button-install-save" id="podinbox-floating-button-install-save">
										<span><?php esc_html_e( 'SAVE CHANGES', 'podinbox' ); ?></span>
									</button>
									<button transform="uppercase" type="submit" class="podinbox-configure-widget button-secondary" id="podinbox-configure-widget">
										<span><?php esc_html_e( 'CONFIGURE WIDGET', 'podinbox' ); ?></span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>