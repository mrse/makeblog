/**
* This page contains all the JavaScript code for the Maker Camp pages
*
* @package    makeblog
* @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
* @author     Cole Geissinger <cgeissinger@makermedia.com>
* 
*/

jQuery(document).ready(function($) {
	$('.collapse').collapse();

	// Load our Bootstrap Tab JS on the schedule page
	if ( $('.schedule-content').length >= 1 ) {

		// Run the Bootstrap tab functions
		$('#schedule li.active a').tab('show');
		$('#schedule a').click(function(e) {
			e.preventDefault();

			$(this).tab('show');
		});

		// If a scheduled event is clicked, open the description box
		$('.schedule-content .more-info').click(function() {
			// Select our description box (the last sibling in the maker parent element)
			var description = $(this).parent().children(':last');

			// Check that we close any open and active toggles
			if ( $('.maker-description.active').length && ! description.is(':visible') ) {
				$('.maker-description').slideUp().removeClass('active');
				$('.maker').removeClass('open');
			}

			// Check if the parent element is displaying it's description and remove that class
			if ( $(this).parent().hasClass('open') ) {
				$(this).parent().removeClass('open');
			} else {
				$(this).parent().addClass('open');
			}

			// Display our project description when it's clicked
			description.slideToggle().addClass('active');
		});

		// If the user decides to use the explicit, "close window" link, do it.
		$('.maker-description .close-btn').click(function(e) {
			e.preventDefault();

			$('.maker-description').slideUp().removeClass('active');
			$('.maker').removeClass('open');
		});
	}
});