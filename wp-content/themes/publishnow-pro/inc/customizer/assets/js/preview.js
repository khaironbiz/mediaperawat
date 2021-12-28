/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Set up variable
	api = wp.customize;

	// Site title and description.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Body background color
	api( 'publishnow_body_bg_color', function ( value ) {
		value.bind( function ( to ) {
			to = to ? to : '#ffffff';
			$( '.wide-container' ).css( 'background-color', to );
		} );
	} );

	// Footer background color
	api( 'publishnow_footer_bg_color', function ( value ) {
		value.bind( function ( to ) {
			to = to ? to : '#181818';
			$( '.site-footer' ).css( 'background-color', to );
		} );
	} );

} )( jQuery );
