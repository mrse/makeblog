jQuery( document ).ready( function( $ ) {

	// Track links clicked
	$( '.popup a' ).click( function(e) {
		var link_name = $(this).attr('data-link-name');
		var menu_name = $(this).attr('data-tracker');

		// Track this click with Google, yo.
		_gaq.push(['_trackEvent', menu_name, 'Click', link_name]);
	});

});