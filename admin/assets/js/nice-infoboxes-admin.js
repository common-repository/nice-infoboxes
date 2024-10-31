/**
 * Nice InfoBoxes by NiceThemes.
 *
 * Manage DOM for infobox editor.
 *
 * @since   1.0
 * @package Nice_Infoboxes
 */
var Nice_Infoboxes_Admin = ( function( $ ) {
	// Tell browsers we're not doing anything silly.
	'use strict';

	/**
	 * Handle selection of Font Awesome icons.
	 *
	 * @since 1.0
	 */
	var handleIconSelect = function() {
		var icons            = $( '.nice-infobox-icon' ),
		    iconFieldId      = $( 'input[name="_infobox_link_icon[id]"]' ),
		    iconFieldColor   = $( 'input[name="_infobox_link_icon[color]"]' ),
		    selectedIcon     = $( '.nice-infobox-icon.selected' ),
		    sidebar          = $ ( '#nice-infobox-icons-sidebar' ),
		    sidebarContent   = sidebar.find ( '.sidebar-content' ),
		    globalPreview    = $( '.icon-preview' ),
		    modalPreview     = sidebar.find ( '.preview' ),
		    saveButton       = $( '#nice-infobox-icon-save' ),
		    setButton        = $( '#nice-infobox-icon-set' ).parent(),
		    editButton       = $( '#nice-infobox-icon-edit' ).parent(),
		    removeButton     = $( '#nice-infobox-icon-remove' ).parent(),
		    colorButton      = $( '.nice-infobox-icon-color' ),
		    iconDefaultColor = colorButton.val(),
			iconColor        = iconDefaultColor;

		/**
		 * Fired when an icon is clicked.
		 *
		 * @since 1.0
		 */
		icons.click( function( e ) {
			e.preventDefault();

			// Track the selected icon.
			var icon = $( this );

			if ( icon.hasClass( 'selected' ) ) {
				/**
				 * Deselect a previously selected icon.
				 */
				icon.removeClass( 'selected' );
				selectedIcon = null;
				sidebarContent.hide();

			} else {
				// Deselect any other previously-selected icon.
				icons.removeClass( 'selected' );

				/**
				 * Mark clicked icon as selected.
				 *
				 * @type {*|HTMLElement}
				 */
				selectedIcon = icon.addClass( 'selected' );

				// Set icon preview inside modal.
				modalPreview.find( 'i' ).attr( 'class', '' ).addClass( icon.parent().data( 'base-class' ) + icon.data( 'id' ) );

				// Show contents of sidebar.
				sidebarContent.show();
			}
		} );

		// Fire color picker.
		$( document ).ready( function() {
			colorButton.wpColorPicker( {
				/**
				 * Fired when the selected color changes.
				 *
				 * @since 1.0
				 *
				 * @param event
				 * @param ui
				 */
				change: function( event, ui ) {
					// Obtain selected color.
					iconColor = $( event.target ).data( 'a8cIris' ).options.color;

					// Set color to icon preview inside modal.
					modalPreview.css( 'color', iconColor );
				}
			} );
		} );

		/**
		 * Fired when an icon is removed by clicking the "remove icon" link.
		 *
		 * @since 1.0
		 */
		removeButton.click( function( e ) {
			e.preventDefault();

			// Hide contents of modal sidebar.
			sidebarContent.hide();

			if ( selectedIcon ) {
				/**
				 * Deselect and unset previously selected icon.
				 */
				selectedIcon.removeClass( 'selected' );
				selectedIcon = null;
			}

			/**
			 * Unset global preview.
			 */
			globalPreview.find( 'i' ).attr( 'class', '' );
			globalPreview.find( 'a' ).css( 'color', iconDefaultColor );

			/**
			 * Reset input fields to defaults.
			 */
			iconFieldId.val( '' );
			iconFieldColor.val( iconDefaultColor );

			/**
			 * Mock click in the "default color" button to get the default
			 * color back.
			 *
			 * @since 1.0
			 */
			$( '.wp-picker-default' ).click();

			// Hide "edit" button.
			editButton.hide().removeClass( 'active' );
			// Hide "remove" button.
			removeButton.hide().removeClass( 'active' );
			// Show "set" button.
			setButton.show().addClass( 'active' );
		} );

		/**
		 * Fired when the "save icon" button is clicked.
		 */
		saveButton.click( function() {
			// Clear global preview in order to populate it accordingly later on.
			globalPreview.find( 'i' ).attr( 'class', '' );

			// Fire if we have a selected icon.
			if ( selectedIcon ) {
				/**
				 * Update global preview.
				 */
				globalPreview.find( 'i' ).addClass( 'fa' ).addClass( 'fa-' + selectedIcon.data( 'id' ) );

				/**
				 * Update ID input field.
				 */
				iconFieldId.val( selectedIcon.data( 'id' ) );

				// Hide "set" button.
				setButton.hide().removeClass( 'active' );

				// Show "edit" button.
				editButton.show().addClass( 'active' );

				// Show "remove" button.
				removeButton.show().addClass( 'active' );

			} else { // Fire if we don't have a selected icon.
				/**
				 * Not saving an icon is the same as removing the active one,
				 * so we mock a click to the "remove" button to accomplish this.
				 */
				removeButton.click();
			}

			// Set current color in global preview.
			globalPreview.find( 'a' ).css( 'color', iconColor );
			// Set current color in input field.
			if ( iconColor ) {
				iconFieldColor.val( iconColor );
			}

			// Close modal.
			tb_remove();
		} );
	},

	/**
	 * Fire events on document ready, and bind other events.
	 *
	 * @since 1.0
	 */
	ready = function() {
		handleIconSelect();
	};

	// Expose the ready function to the world.
	return {
		ready: ready
	};

} )( jQuery );

jQuery( Nice_Infoboxes_Admin.ready );
