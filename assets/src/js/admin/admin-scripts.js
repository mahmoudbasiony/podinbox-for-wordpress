/**
 * Back-end scripts.
 *
 * Scripts to run on the WordPress dashboard.
 */

( $ => {
	let clicked = false;

	/*
	 * On click save show ID button.
	 */
	$(document).on('click','#podinbox-show-id-save-changes',function(event){
		event.preventDefault();

		let showIdInput = $(this).closest('.podinbox-body__step-one-form').find('.podinbox-show-id');
		let showId      = showIdInput.val().trim();

		let data = {
			action : 'podinbox_save_show_id',
			nonce : podinbox_params.nonce,
			show_id : showId,
		};

		if (!clicked) {
			// Set clicked to true.
			clicked = true;

			/**
			 * Save show ID.
			 *
			 * @param {element}
			 * @param {object}
			 */
			saveShowId($(this), data).then( result => {
				// Set clicked to false.
				clicked = false;

				// Hide the loader.
				$(this).removeClass('loading').find('div.loader').hide();
	
				if (result.success && result.hasOwnProperty('data') && result.data.hasOwnProperty('status')) {
					if (200 == result.data.status) {
						showPopup(result.data.message);
	
						$('.podinbox-body__step-two-container').removeClass('disabled');
						if (!showId) {
							$('.podinbox-body__step-two-container .podinbox-enable-floating-widget').prop( 'checked', false );
							$('.podinbox-body__step-two-container').addClass('disabled');
						}
					}
				}

				$('.podinbox-message').delay(3000).fadeOut("normal", function () {
					$(this).remove();
				});
			} );
		}

	} );

	/*
	 * On click advanced to toggle advanced options.
	 */
	$(document).on('click', '.floating-widget-install__advanced', function(event) {
		if ($(event.currentTarget ).hasClass( 'collapsed')) {
			$(event.currentTarget).parent().find('.floating-widget-install__options').show();
			$( event.currentTarget ).removeClass( 'collapsed' );
		} else {
			$(event.currentTarget).parent().find('.floating-widget-install__options').hide();
			$( event.currentTarget ).addClass( 'collapsed' );
		}
	});

	/*
	 * On click save floating widget options.
	 */
	$(document).on('click', '#podinbox-floating-button-install-save', function(event) {
		event.preventDefault();

		let enabled = $('input#podinbox-enable-floating-widget').is(':checked') ? 'yes' : '';
		let scriptPlacement = $('input[name="podinbox_script_placement"]:checked').val();
		let displayDevice = $('input[name="podinbox_display_device"]:checked').val();

		let data = {
			action: 'podinbox_save_floating_button_options',
			nonce: podinbox_params.nonce,
			enabled : enabled,
			script_placement: scriptPlacement,
			display_device: displayDevice,
		};

		if (!clicked) {
			// Set clicked to true.
			clicked = true;

			/**
			 * Save widget options.
			 *
			 * @param {element}
			 * @param {object}
			 */
			saveWidgetOptions($(this),data).then(result => {
				// Set clicked to false.
				clicked = false;

				// Hide the loader.
				$(this).removeClass('loading').find('div.loader').hide();

				if (result.success && result.hasOwnProperty('data') && result.data.hasOwnProperty('status')) {
					if (200 == result.data.status) {
						showPopup(result.data.message);
					}
				}
	
				$('.podinbox-message').delay(3000).fadeOut("normal", function () {
					$(this).remove();
				});
				
			});
		}

	});

	/**
	 * Save/Update the show ID.
	 *
	 * @param {element} button The save button element.
	 * @param {object}  data   The data object.
	 */
	const saveShowId = async (button, data) => {
		let result;

		try {
			result = await $.ajax({
				url: podinbox_params.ajax_url,
				type: 'POST',
				data: data,
				beforeSend: function() {
					button.addClass('loading').find('div.loader').show();
					$('.podinbox-body__step-two-container').addClass('disabled');
				}
			});

			return result;
		} catch (error) {
			console.error(error);
		}
	}
	
	/**
	 * Save/Update widget options.
	 *
	 * @param {element} button The save button element.
	 * @param {object}  data   The data object.
	 */
	const saveWidgetOptions = async (button, data) => {
		let result;

		try {
			result = await $.ajax({
				url: podinbox_params.ajax_url,
				type: 'POST',
				data: data,
				beforeSend: function() {
					button.addClass('loading').find('div.loader').show();
				},
			});

			return result;
		} catch (error) {
			console.error(error);
		}
	}

	/**
	 * Display popup overlay with certain message.
	 *
	 * @param {string} message - The message to display.
	 * @param {string} type    - The popup type. Value is 'error' or 'success'. Default: success.
	 */
	const showPopup = (text, type = 'success') => {
		// First remove previous popup.
		$('.podinbox-message').remove();

		if ($('.podinbox-message').length === 0) {
			let popupWrap = $('<div></div>').attr('class', 'podinbox-message');
			let popupBox = $('<div></div>').attr('class', 'podinbox-message-notice');
			let popupContent = $('<div></div>').attr('class', 'podinbox-message-notice-content');
			let popupSubContent = $('<div></div>').attr('class', 'podinbox-message-custom-content podinbox-message-success');
			let icon = $('<span role="img" aria-label="check-circle" class="anticon anticon-check-circle"><svg viewBox="64 64 896 896" focusable="false" data-icon="check-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 01-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8 157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z"></path></svg></span>');
			let message = $('<span></span>').text(text);

			if (type === 'error') {
				icon = '';
			}

			$(icon).appendTo(popupSubContent);
			$(message).appendTo(popupSubContent);
			$(popupSubContent).appendTo(popupContent);
			$(popupContent).appendTo(popupBox);
			$(popupBox).appendTo(popupWrap);

			$('body').append(popupWrap);
		}
	};
} )( jQuery );