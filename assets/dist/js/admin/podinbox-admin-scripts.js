'use strict';

function _asyncToGenerator(fn) { return function () { var gen = fn.apply(this, arguments); return new Promise(function (resolve, reject) { function step(key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { return Promise.resolve(value).then(function (value) { step("next", value); }, function (err) { step("throw", err); }); } } return step("next"); }); }; }

/**
 * Back-end scripts.
 *
 * Scripts to run on the WordPress dashboard.
 */

(function ($) {
	var clicked = false;

	/*
  * On click save show ID button.
  */
	$(document).on('click', '#podinbox-show-id-save-changes', function (event) {
		var _this = this;

		event.preventDefault();

		var showIdInput = $(this).closest('.podinbox-body__step-one-form').find('.podinbox-show-id');
		var showId = showIdInput.val().trim();

		var data = {
			action: 'podinbox_save_show_id',
			nonce: podinbox_params.nonce,
			show_id: showId
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
			saveShowId($(this), data).then(function (result) {
				// Set clicked to false.
				clicked = false;

				// Hide the loader.
				$(_this).removeClass('loading').find('div.loader').hide();

				if (result.success && result.hasOwnProperty('data') && result.data.hasOwnProperty('status')) {
					if (200 == result.data.status) {
						showPopup(result.data.message);

						$('.podinbox-body__step-two-container').removeClass('disabled');
						if (!showId) {
							$('.podinbox-body__step-two-container .podinbox-enable-floating-widget').prop('checked', false);
							$('.podinbox-body__step-two-container').addClass('disabled');
						}
					}
				}

				$('.podinbox-message').delay(3000).fadeOut("normal", function () {
					$(this).remove();
				});
			});
		}
	});

	/*
  * On click advanced to toggle advanced options.
  */
	$(document).on('click', '.floating-widget-install__advanced', function (event) {
		if ($(event.currentTarget).hasClass('collapsed')) {
			$(event.currentTarget).parent().find('.floating-widget-install__options').show();
			$(event.currentTarget).removeClass('collapsed');
		} else {
			$(event.currentTarget).parent().find('.floating-widget-install__options').hide();
			$(event.currentTarget).addClass('collapsed');
		}
	});

	/*
  * On click save floating widget options.
  */
	$(document).on('click', '#podinbox-floating-button-install-save', function (event) {
		var _this2 = this;

		event.preventDefault();

		var enabled = $('input#podinbox-enable-floating-widget').is(':checked') ? 'yes' : '';
		var scriptPlacement = $('input[name="podinbox_script_placement"]:checked').val();
		var displayDevice = $('input[name="podinbox_display_device"]:checked').val();

		var data = {
			action: 'podinbox_save_floating_button_options',
			nonce: podinbox_params.nonce,
			enabled: enabled,
			script_placement: scriptPlacement,
			display_device: displayDevice
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
			saveWidgetOptions($(this), data).then(function (result) {
				// Set clicked to false.
				clicked = false;

				// Hide the loader.
				$(_this2).removeClass('loading').find('div.loader').hide();

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
	var saveShowId = function () {
		var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee(button, data) {
			var result;
			return regeneratorRuntime.wrap(function _callee$(_context) {
				while (1) {
					switch (_context.prev = _context.next) {
						case 0:
							result = void 0;
							_context.prev = 1;
							_context.next = 4;
							return $.ajax({
								url: podinbox_params.ajax_url,
								type: 'POST',
								data: data,
								beforeSend: function beforeSend() {
									button.addClass('loading').find('div.loader').show();
									$('.podinbox-body__step-two-container').addClass('disabled');
								}
							});

						case 4:
							result = _context.sent;
							return _context.abrupt('return', result);

						case 8:
							_context.prev = 8;
							_context.t0 = _context['catch'](1);

							console.error(_context.t0);

						case 11:
						case 'end':
							return _context.stop();
					}
				}
			}, _callee, undefined, [[1, 8]]);
		}));

		return function saveShowId(_x, _x2) {
			return _ref.apply(this, arguments);
		};
	}();

	/**
  * Save/Update widget options.
  *
  * @param {element} button The save button element.
  * @param {object}  data   The data object.
  */
	var saveWidgetOptions = function () {
		var _ref2 = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee2(button, data) {
			var result;
			return regeneratorRuntime.wrap(function _callee2$(_context2) {
				while (1) {
					switch (_context2.prev = _context2.next) {
						case 0:
							result = void 0;
							_context2.prev = 1;
							_context2.next = 4;
							return $.ajax({
								url: podinbox_params.ajax_url,
								type: 'POST',
								data: data,
								beforeSend: function beforeSend() {
									button.addClass('loading').find('div.loader').show();
								}
							});

						case 4:
							result = _context2.sent;
							return _context2.abrupt('return', result);

						case 8:
							_context2.prev = 8;
							_context2.t0 = _context2['catch'](1);

							console.error(_context2.t0);

						case 11:
						case 'end':
							return _context2.stop();
					}
				}
			}, _callee2, undefined, [[1, 8]]);
		}));

		return function saveWidgetOptions(_x3, _x4) {
			return _ref2.apply(this, arguments);
		};
	}();

	/**
  * Display popup overlay with certain message.
  *
  * @param {string} message - The message to display.
  * @param {string} type    - The popup type. Value is 'error' or 'success'. Default: success.
  */
	var showPopup = function showPopup(text) {
		var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'success';

		// First remove previous popup.
		$('.podinbox-message').remove();

		if ($('.podinbox-message').length === 0) {
			var popupWrap = $('<div></div>').attr('class', 'podinbox-message');
			var popupBox = $('<div></div>').attr('class', 'podinbox-message-notice');
			var popupContent = $('<div></div>').attr('class', 'podinbox-message-notice-content');
			var popupSubContent = $('<div></div>').attr('class', 'podinbox-message-custom-content podinbox-message-success');
			var icon = $('<span role="img" aria-label="check-circle" class="anticon anticon-check-circle"><svg viewBox="64 64 896 896" focusable="false" data-icon="check-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm193.5 301.7l-210.6 292a31.8 31.8 0 01-51.7 0L318.5 484.9c-3.8-5.3 0-12.7 6.5-12.7h46.9c10.2 0 19.9 4.9 25.9 13.3l71.2 98.8 157.2-218c6-8.3 15.6-13.3 25.9-13.3H699c6.5 0 10.3 7.4 6.5 12.7z"></path></svg></span>');
			var message = $('<span></span>').text(text);

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
})(jQuery);