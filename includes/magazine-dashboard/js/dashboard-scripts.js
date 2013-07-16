jQuery( document ).ready( function( $ ) {

	var pc = 0;

	// Store each value into an array
	$( '.ef_pc_count' ).each( function() {
		pc += Number( $(this).text() );
	});

	// Append our page count to the Page Count area :)
	$( '.page-count .pc-number' ).text( pc );
});