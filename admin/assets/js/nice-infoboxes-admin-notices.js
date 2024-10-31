/**
 * Nice InfoBoxes by NiceThemes
 *
 * @package Nice_Infoboxes
 * @license GPL-2.0+
 */

/**
 * Handle admin notices.
 *
 * @since   1.0
 * @package Nice_Infoboxes
 */
var NiceInfoboxesAdminNotices = ( function( $ ) {
	// Tell browsers we're not doing anything silly.
	'use strict';

	/**
	 * Make an AJAX call when dismissing the admin settings notice.
	 */
	var dismissNotice = function() {
		var notice = $( '#nice_infoboxes_admin_update_notice.is-dismissible' );

		var nice_ajax_settings = {
			action: 'nice_infoboxes_admin_dismiss_update_notice',
			url:    nice_infoboxes_admin_notices_vars.ajax_url,
			nonce:  nice_infoboxes_admin_notices_vars.nonce
		};

		notice.on('click', '.notice-dismiss', function ( event ) {
			event.preventDefault();

			$.post( nice_infoboxes_admin_notices_vars.ajax_url, nice_ajax_settings );
		});

		notice.on('click', '.nice-notice-dismiss', function ( event ) {
			notice.fadeTo( 100, 0, function() {
				notice.slideUp( 100, function() {
					notice.remove();
				});
			});

			$.post( nice_infoboxes_admin_notices_vars.ajax_url, nice_ajax_settings );
		});
	},

	/**
	 * Fire events on document ready, and bind other events.
	 *
	 * @since 1.0
	 */
	ready = function() {
		dismissNotice();
	};

	// Expose the ready function to the world.
	return {
		ready: ready
	};

} )( jQuery );

jQuery( NiceInfoboxesAdminNotices.ready );
