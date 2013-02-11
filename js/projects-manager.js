jQuery(document).ready(function($) {

	/**
	 * Define our image creation and removal functionality.
	 * Also reference the make_projects_manager() function below for more.
	 *
	 * @version 1.0
	 */

	// Add our remove button for images uploaded to the Projects Manager
	$('#image-list .has-image').prepend('<img src="' + stylesheet_uri + '/images/icon-remove.png" class="remove-image" />');

	// Call our image removal and hover state
	make_projects_manager_image_removal();

	/**
	 * Define our sortable sub-lists
	 * Using jQuery UI, we hook onto the class ".sort" on the sort icon so this become the "handle".
	 * Chain disableSelection() to the end so we can deactivate text selection when users are dragging.
	 *
	 * @version 1.0
	 */
	$('#sub-lists').sortable({
		connectWith: '.sort',
		// The class assigned to the
		placeholder: 'ui-state-highlight',
		// fired when a sortable list receives an item from a connected list.
		receive: function(event, ui) { make_projects_manager_sort_received(this) },
		// Removing a child from a sortable fires this event.
		remove: function(event, ui) { make_projects_manager_sort_removed(this) },
		// Check when sort has been completed and move our add button to the last sub-list
		stop: function(event, ui) { make_projects_manager_sort_stop(this) }
	});


	// Call our "Add List" function.
	make_projects_manager_add_list();

	// Call our "Remove List" function.
	make_projects_manager_remove_list();
});


/**
 * Create a function that allows us to set the hover state and image removal functionality
 *
 * @version 1.0
 */
function make_projects_manager_image_removal() {
	// Fade in our remove button for images uploaded to the Projects Manager
	jQuery('.has-image').hover(function() {
		jQuery(this).children('img.remove-image').fadeIn(100);
	}, function() {
		jQuery(this).children('img.remove-image').fadeOut(100);
	});

	jQuery('img.remove-image').hover(function() {
		jQuery(this).next().addClass('steps-delete-hover');
	}, function() {
		jQuery(this).next().removeClass('steps-delete-hover');
	})

	// Clear the image from the preview and input field when the remove button is clicked
	jQuery('img.remove-image').click(function() {
		jQuery(this).parent().removeClass('has-image');
		jQuery(this).next().attr('src', 'http://placehold.it/94x94').removeClass('steps-delete-hover').next().attr('value', '');
		jQuery(this).remove();
	});
}


/**
 * Used in the jQuery UI $.sortable() function for our #sub-lists.
 * This method allows us to add the text empty to a list when its last item is removed
 *
 * @version 1.0
 */
function make_projects_manager_sort_received(selector) {
	if(jQuery(selector).hasClass('empty')) {
		jQuery(selector).removeClass('empty').find('.empty').remove();
	}
}


/**
 * Used in the jQuery UI $.sortable() function for our #sub-lists.
 * Checks to see if the parent sortable has any children. If so, remove the text as soon as a new item is added.
 *
 * @version 1.0
 */
function make_projects_manager_sort_removed(selector) {
	if(jQuery(selector).children().length == 0) {
		jQuery(selector).append($('<li class="empty">empty</li>')).addClass('empty');
	}
}


/**
 * Used in the jQuery UI $.sortable() function for our #sub-lists.
 * Runs when sorting has been completed, then we'll move the img.add button to the last list if it is not already.
 *
 * @version 1.0
 */
function make_projects_manager_sort_stop(selector) {
	// Check if there is an img.add in the last list item
	var add_in_last = jQuery('#sub-lists li:last img.add').length;

	// If the value is 0 (aka false), then remove all instances of the img.add and add one to the last list item
	if(add_in_last == 0) {
		jQuery('#sub-lists img.add').remove();

		jQuery('#sub-lists li:last').append('<img src="' + stylesheet_uri + '/images/icon-add.png" class="project-button add">');
	}
}


/**
 * Put our add list functionality into a function. This allows us to reuse this code multiple times when needed
 *
 * @version 1.0
 */
function make_projects_manager_add_list() {
	jQuery('#sub-lists img.add').click(function() {
		// Remove the add sign from all list items
		jQuery(this).remove();

		// Set a variable to toss into the ID tag...
		var num = jQuery('#sub-lists li').length - 1;

		console.log(jQuery(this).prev()[0]);

		// Duplicate our list template and remove the .list-template class.
		jQuery('#sub-lists .list-template').clone(true).appendTo('#sub-lists').removeClass().find('textarea').attr({
			'name': 'lines[]',
			'id': 'line-' + num
		});
	});
}


/**
 * Put our remove list functionality into a function. This allows us to reuse this code multiple times when needed
 *
 * @version 1.0
 */
function make_projects_manager_remove_list() {
	jQuery('#sub-lists img.remove').click(function() {
		// Remove the entire LI tag for the button pressed
		jQuery(this).parent().remove();

		// Check if our add button exists
		var add_btn = jQuery('#sub-lists img.add').length;

		// If add_btn does not return with 1 (AKA true), then we will add a new one.
		if(add_btn === 1) {
			jQuery('#sub-lists li:last').append('<img src="' + stylesheet_uri + '/images/icon-add.png" class="project-button add">');
		}

		// TO DO: FIX The odd list addition bug.
		// When we uncomment the function below, we can add new lists after removing a list item, but will create duplicate add buttons?
		//make_projects_manager_add_list();
	});
}


/**
 * Allows us to hook into the new WordPress 3.5 Media Uploader so we can add custom media in the Project Manager.
 * Function is to be applied to a wrapper element like $('.image-upload').make_project_manager();
 *
 * @version 1.0
 */
(function($) {
	$(function() {
		$.fn.make_projects_manager = function(options) {

			// Get the HTML element or object.
			var selector = $(this).selector;

			// Set the default options.
			var defaults = {
				'button': '.steps-image', // Button and preview select the image container.
				'url': '.image-url',      // URL will select the hidden input field. Used to be saved into DB.
				'preview': '.steps-image'
			};

			// Add our default options to the options namespace.
			var options = $.extend(defaults, options);

			// Tell the Media Uploader we are upload custom images outside of TinyMCE.
			var _custom_media = true;
   	 	var _orig_send_attachment = wp.media.editor.send.attachment;

			// When we click our image placeholders, run the code below.
			$(options.button).click(function() {

				var button = $(this);
				var url = $(this).siblings(options.url); // set to the hidden input field.
				var send_attachment_bkp = wp.media.editor.send.attachment;

		   	_custom_media = true;

		   	// Return the URL of our image and attach it to the URL variable.
		   	wp.media.editor.send.attachment = function(props, attachment) {
		     		if(_custom_media) {
						url.val(attachment.url).trigger('change'); // Attach the URL but also copy the URL to our placeholder.
		      	} else {
		      		return _orig_send_attachment.apply(this, [props, attachment]);
		      	};
		    	}

		    	wp.media.editor.open(button);

		    	return false;
			});

			$('.add_media').on('click', function() {
		   	_custom_media = false;
		  	});

			// When we detect a change on the options.url variable, we will copy the
			// value field of our hidden input and paste it into the placeholder image tag.
			$(options.url).bind('change', function() {
				// Get the value of the current object.
				var url = this.value;

				// Set the Preview field.
				var preview = $(this).siblings(options.preview);

				// Attach tha info. Yo.
				$(preview).attr('src', url);

				// Once everything is complete, we'll add some needed UI stuff like the image removal button
				// TO DO: Contain all the following code here into a function for simplicity and DRY programming.
				$(this).parent().addClass('has-image').prepend('<img src="' + stylesheet_uri + '/images/icon-remove.png" class="remove-image" />');

				// Call our image removal and hover state
				make_projects_manager_image_removal();
			});
		}

		$('.image-upload').make_projects_manager();
   });
}(jQuery));


function make_projects_add_step() {

}

