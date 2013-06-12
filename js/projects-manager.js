jQuery(document).ready(function($) {

	/**
	 * Define our image creation and removal functionality.
	 * Also reference the make_projects_manager() function below for more.
	 *
	 * @version 2.0
	 */

	// Add our icon class to the meta box title
	$('#make_magazine_projects_step_manager h3.hndle').prepend('<span class="steps-ico"></span>');

	// Add our remove button for images uploaded to the Projects Manager
	$('#image-list .has-image').prepend('<img src="' + make_projects_js.stylesheet_uri + '/images/icon-remove.png" class="remove-image" />');

	// Call our image removal and hover state
	make_projects_manager_image_removal();

	/**
	 * Define our sortable sub-lists
	 * Using jQuery UI, we hook onto the class ".sort" on the sort icon so this become the "handle".
	 * Chain disableSelection() to the end so we can deactivate text selection when users are dragging.
	 *
	 * @version 2.0
	 */
	$('#sub-lists.sortable').sortable({

		// Connect our sort button in each list to be the dragable area.
		connectWith: '.sort',

		// The class assigned to the sort placeholder
		placeholder: 'ui-state-highlight',

		// Only allow vertical sorting.
		axis: 'y',

		// fired when a sortable list receives an item from a connected list.
		receive: function(event, ui) { make_projects_manager_sort_received(this); },

		// Removing a child from a sortable fires this event.
		remove: function(event, ui) { make_projects_manager_sort_removed(this); },

		// Check when sort has been completed and move our add button to the last sub-list
		update: function(event, ui) { make_projects_manager_sort_updated(this); }
	});


	// Call our "Add List" function.
	make_projects_manager_add_list();

	// Call our "Remove List" function.
	make_projects_manager_remove_list();


	/**
	 * Run our "Add Step" click event. This seems like too much. Can probably re-work this and optimize it...
	 *
	 * @version 1.0
	 */
	$('.add-step').click(function() {

		// Count how many LI tags we currently have so we can change the ID number when duplicated.
		var num = $('.step-wrapper').length;

		// Duplicate our list template and remove the .list-template class.
		var clone = $('.steps-template').clone(true).removeClass('steps-template').addClass('hide').attr('id', 'step-' + num);

		$('input[name="total-steps"]').val(num);

		// Append our cloned template item into the bottom of our current ul#sub-lists.
		clone.appendTo($(this).parent()).slideDown().find('.step-title h3').html('Step ' + num);

		// Remove the .list-template that get duplicated in the cloning process
		$('#step-' + num + ' li.list-template').removeClass();

		// Update the the title name field
		$('#step-' + num + ' input[name="step-title-0"]').attr('name', 'step-title-' + num);

		// Update the number field in the object.
		$('#step-' + num + ' > input[type="hidden"]').attr({'name': 'step-number-' + num, 'value': num});

		// Update each image field with the proper name field.
		$('#step-' + num + ' input.image-url').each(function() {
			$(this).attr('name', 'step-images-' + num + '[]');
		});

		// Update each sub-list with the proper name and ID fields.
		$('#step-' + num + ' textarea[name="step-lines-0[]"]').each(function() {
			$(this).attr({'name': 'step-lines-' + num + '[]', 'id': 'line-' + num});
		});
	});


	/**
	 * Run our "Remove Step" click event.
	 *
	 * @version 2.0
	 */
	$('.remove-step').click(function() {
		// Remove the main .step-wrapper div.
		$(this).parent().parent().slideUp(500, function() {

			// Remove this element
			$(this).remove();


			var i = 0;
			$('.step-wrapper').each( function(e, v) {

				// Update the step ID
				$(this).attr('id', 'step-' + i);

				// Update the hidden field
				$('#step-' + i + ' > input[type="hidden"]').attr({
					name: 'step-number-' + i,
					value: i
				});

				// Update the title
				$('#step-' + i + ' .step-title h3').html('Step ' + i);

				// Update the step images
				$('#step-' + i + ' #image-list input[type="hidden"]').each(function() {
					$(this).attr('name', 'step-images-' + i + '[]');
				});

				// Update the step title
				$('#step-' + i + ' #project-header').attr('name', 'step-title-' + i);

				// Update the step images
				$('#step-' + i + ' #sub-lists textarea').each(function() {
					$(this).attr('name', 'step-lines-' + i + '[]');
				});

				i++;
			});

			// Count how many steps we have and update the total-steps field. This is needed to compile our onject upon save.
			var num = $('.step-wrapper').length - 1;
			$('input[name="total-steps"]').val(num);
		});
	});
});


/**
 * Put our add list functionality into a function. This allows us to reuse this code multiple times when needed
 *
 * @version 2.0
 */
function make_projects_manager_add_list() {
	jQuery('#sub-lists img.add').click(function() {
		// Get the current step number. Needed for setting the proper name field for our textarea.
		var step_num = jQuery(this).parents('.step-wrapper').children().val();

		// Count how many LI tags we currently have so we can change the ID number when duplicated.
		var num = jQuery(this).parent().parent('#sub-lists').children().length + 1;

		// Duplicate our list template and remove the .list-template class.
		var clone = jQuery('.steps-template .list-template').clone(true).removeClass('list-template');

		// Append our cloned template item into the bottom of our current ul#sub-lists.
		clone.appendTo(jQuery(this).parent().parent('#sub-lists')).find('textarea').attr({
			'id': 'line-' + num,
			'name': 'step-lines-' + step_num + '[]'
		});

		// Remove the add sign from all list items. NOTE, adding first will break the script! MUST BE LAST.
		jQuery(this).remove();
	});
}


/**
 * Put our remove list functionality into a function. This allows us to reuse this code multiple times when needed
 *
 * @version 2.0
 */
function make_projects_manager_remove_list() {
	jQuery('#sub-lists img.remove').click(function() {

		// Create a variable that will traverse to the main UL
		var parent_ul = jQuery(this).parent().parent('#sub-lists');

		// Remove the entire LI tag for the button pressed
		jQuery(this).parent().slideUp(500, function() {

			// Remove this element
			jQuery(this).remove();

			// Check if our add button exists
			var add_btn = parent_ul.find('img.add').length;

			// If add_btn does not return with 1 (AKA true), then we will add a new one.
			if(add_btn === 0) {
				parent_ul.find('li:last').append('<img src="' + make_projects_js.stylesheet_uri + '/images/icon-add.png" class="project-button add">');
			}

			// Call our add list functions again so we don't lose the click events after we append. I'm sure there's a better way to this.
			make_projects_manager_add_list();
		});
	});
}


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
	});

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
	if(jQuery(selector).children().length === 0) {
		jQuery(selector).append($('<li class="empty">empty</li>')).addClass('empty');
	}
}


/**
 * Used in the jQuery UI $.sortable() function for our #sub-lists.
 * Runs when sorting has been completed, then we'll move the img.add button to the last list if it is not already.
 *
 * @version 1.0
 */
function make_projects_manager_sort_updated(selector) {
	// Check if there is an img.add in the last list item
	//var add_in_last = jQuery('#sub-lists li:last > img.add').length;

	//console.log(add_in_last);

	// If the value is 0 (aka false), then remove all instances of the img.add and add one to the last list item
	//if(add_in_last === 0) {
		jQuery('#sub-lists img.add').remove();

		jQuery('#sub-lists li:last-child').append('<img src="' + stylesheet_uri + '/images/icon-add.png" class="project-button add">');

		make_projects_manager_add_list();
	//}
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
					}
				};

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
				$(this).parent().addClass('has-image').prepend('<img src="' + make_projects_js.stylesheet_uri + '/images/icon-remove.png" class="remove-image" />');

				// Call our image removal and hover state
				make_projects_manager_image_removal();
			});
		};

		$('.image-upload').make_projects_manager();
   });
}(jQuery));

