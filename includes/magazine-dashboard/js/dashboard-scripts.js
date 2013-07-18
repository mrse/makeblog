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
	$( 'table#magazine-dashboard' ).tablesorter({
		headers: { // Disable sorting on these columns
            0: { sorter: false },
            4: { sorter: false },
            5: { sorter: false },
            7: { sorter: false },
            8: { sorter: false },
            9: { sorter: false },
            10: { sorter: false },
            11: { sorter: false },
            12: { sorter: false },
            13: { sorter: false },
            14: { sorter: false },
            15: { sorter: false },
            16: { sorter: false },
            17: { sorter: false },
            18: { sorter: false },
            19: { sorter: false }
        }
	});


	// Setup Ajax for our screen options
	$( '#magazine-dashboard-screen-options input:checkbox' ).on( 'click', function() {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajaxurl,
			data: { 
				'action' : 'mag_dash_screen_opt',
				'data'   : $( '#magazine-dashboard-screen-options' ).serialize() },
			success: function( results ) {
				console.log(results);
			}
		});
	});
});