jQuery(document).ready(function($) {


	// When clicking our search button, stop it from runnin a search and open the serach field and remove and add some classes
	$('.search-make input[type="image"].disabled').click(function(event) {
		event.preventDefault();

		// console.log( $(this) );
		$(this).removeClass('disabled').parent().addClass('open').children('.search-field').animate({
			width: '178px'
		});
	});
});