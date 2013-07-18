jQuery( document ).ready( function( $ ) {

	var pc = 0;

	// Store each value into an array
	$( '.ef_pc_count' ).each( function() {
		pc += Number( $(this).text() );
	});

	// Append our page count to the Page Count area :)
	$( '.page-count .pc-number' ).text( pc );


	// Sort the custom table and enable zebra stripes
	$.tablesorter.defaults.widgets = ['zebra'];
	$( 'table#magazine-dashboard' ).tablesorter();


	// Setup Ajax for our screen options
	$( '#magazine-dashboard-screen-options input:checkbox' ).on( 'click', function() {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxurl,
			data: {
				'action' : 'mag_dash_screen_opt',
				'nonce' : $( '#magazine-dashboard-screen-options input#make-magazine-dashboard' ).val(),
				'submission' : $( '#magazine-dashboard-screen-options input[name="submission"]:hidden' ).val(),
				'data'   : $( '#magazine-dashboard-screen-options input:checked' ).serialize()
			},
			success: function( results ) {
				console.log(results);
			}
		});
	});
});