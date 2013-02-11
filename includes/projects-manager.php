<?php

	/**
	 * Register our Steps Manager with the projects custom post type
	 * @return void
	 *
	 * @version 1.0
	 */
	function make_magazine_projects_add_step_manager() {
		add_meta_box('make_magazine_projects_step_manager', 'Steps Manager', 'make_magazine_projects_step_manager_mb', 'projects', 'normal', 'high');
	}
	add_action('add_meta_boxes', 'make_magazine_projects_add_step_manager');


	/**
	 * Load our custom styles for the Projects Manager ONLY in the projects CPT.
	 * @return void
	 *
	 * @version 1.0
	 */
	function make_magazine_projects_add_styles() {
		if(is_admin() && ('projects' == get_post_type())) {
			wp_enqueue_style('make-projects-custom-styles', get_stylesheet_directory_uri() . '/css/projects-manager.css');
		}
	}
	add_action('admin_print_styles', 'make_magazine_projects_add_styles');


	/**
	 * Load our custom scripts for the Projects Manager ONLY in the project CPT.
	 * @return void
	 *
	 * @version 1.0
	 */
	function make_magazine_projects_add_scripts() {
		if(is_admin() && ('projects' == get_post_type())) {
			wp_enqueue_media();
			wp_enqueue_script('make-projects-custom-js', get_stylesheet_directory_uri() . '/js/projects-manager.js', array('jquery'));
			echo '<script>var stylesheet_uri = "' . get_stylesheet_directory_uri() . '";</script>';
		}
	}
	add_action('admin_print_scripts', 'make_magazine_projects_add_scripts');


	/**
	 * The main function that displays all the magic and unicorns one will need to manage their projects.
	 * @return HTML
	 *
	 * @version 1.0
	 */
	function make_magazine_projects_step_manager_mb() {
		global $post;

		// Load our Projects steps
		$steps = make_magazine_get_project_data();
		wp_nonce_field('make-mag-projects-metabox-nonce', 'meta_box_nonce'); ?>
		<div class="step group">
			<input type="button" value="Add Another Step" class="button add-step alignright" />
			<div id="step-1" class="step-wrapper">
				<div class="step-title">
					<h3>Step 1</h3>
				</div>
				<div class="step-contents group">
					<div id="image-list" class="alignleft">
						<?php // loop through our images array 3 times, checking if images exist. If not, add placeholders.
							for($i = 0; $i < 3; $i++) :
								if(isset($steps->images[$i])) { ?>
									<div class="image-upload group has-image">
										<img src="<?php echo esc_url($steps->images[$i]->text); ?>" alt="" class="alignleft steps-image" width="94" height="94" />
										<input type="hidden" name="images[]" class="image-url" value="<?php echo esc_url($steps->images[$i]->text); ?>">
									</div><!--[END .image-upload]-->
								<?php } else { ?>
									<div class="image-upload group">
										<img src="http://placehold.it/94x94" alt="" class="alignleft steps-image" title="Upload an Image" width="94" height="94" />
										<input type="hidden" name="images[]" class="image-url" value="">
									</div><!--[END .image-upload]-->
								<?php }
							endfor;
						?>
					</div><!--[END #image-list]-->
					<div id="list" class="alignleft">
						<input type="text" name="title" id="project-header" class="widefat" placeholder="Description" value="<?php echo (!empty($steps->title)) ? esc_attr($steps->title) : ''; ?>">
						<ul id="sub-lists" class="reset-list">
							<?php // Add an HTML template for us to use to duplicate via jQuery. Set to display:none ?>
							<li class="list-template">
								<textarea name="" id="line-0" rows="5"></textarea>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sort.png" class="project-button sort ss" />
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-minus.png" class="project-button remove">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-add.png" class="project-button add">
							</li>
							<?php if(isset($steps->lines)) : ?>
								<?php
									$total = count($steps->lines); // Count the number of sub-steps
									$i = 0; // Used to set the right ID's and to check against
									foreach($steps->lines as $key) : ?>
									<li>
										<textarea name="lines[]" id="line-<?php echo $i; ?>" rows="5"><?php echo esc_attr($key->text); ?></textarea>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sort.png" class="project-button sort" />
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-minus.png" class="project-button remove">
										<?php if($i + 1 === $total) : // Display our add button only on the last step on load. ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-add.png" class="project-button add">
										<?php endif;
										$i++; ?>
									</li>
									<?php endforeach;
								?>
							<?php else : ?>
								<li>
									<textarea name="lines[]" id="line-0" rows="5"></textarea>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sort.png" class="project-button sort" />
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-minus.png" class="project-button remove">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-add.png" class="project-button add">
								</li>
							<?php endif; ?>
						</ul>
					</div><!--[END #list]-->
				</div><!--[END .step-contents]-->
			</div><!--[END step-wrapper]-->
			<input type="hidden" name="number" value="<?php echo $steps->number; ?>">
		</div>
	<?php }


	/**
	 * Save our metaboxes into the databse. First we need to format the data to match the returned data in make_magazine_get_project_data()
	 * @param  Int $post_id Returns the $post->ID
	 * @return void
	 *
	 * @version 1.0
	 */
	function make_magazine_projects_save_step_manager($post_id) {
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
		if(!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'make-mag-projects-metabox-nonce')) return;
		if(!current_user_can('edit_post')) return;

		/***** Format the submitted data to match the original Object returned by make_magazine_get_project_data() *****/

		// Add our title to the object
		$steps['title'] = esc_attr($_POST['title']);

		// Create the lines array and contain each line as an object in the Steps object
		$i = 0;
		foreach($_POST['lines'] as $line) {
			$steps['lines'][$i] = (object) array('text' => esc_attr($line), 'text_raw' => esc_attr($line), 'bullet' => 'black', 'level' => 0);
			$i++;
		}

		// Set the object array
		$steps['object'] = '';

		// Set our images array and contain each image as an object in the Steps object
		$i = 0;
		foreach($_POST['images'] as $image) {
			if(!empty($image)) {
				$steps['images'][$i] = (object) array('imageid' => $post_id, 'orderby' => $i, 'text' => $image);
				$i++; // Only increase the integer variable when we encounter a non-empty image value
			}
		}

		// Count the number of Steps set in the step manager and save that number
		$steps['number'] = intval($_POST['number']);

		// Contain the whole $steps array into an object
		$steps_object[] = (object) $steps;

		// Apparently update_post_meta() will serialize our data for us... and add/update our Steps row.
		update_post_meta($post_id, 'Steps', $steps_object);

		//echo '<pre>'; print_r($steps_object); echo '</pre>';
	}
	add_action('save_post', 'make_magazine_projects_save_step_manager');


	/**
	 * Return all the data for our current project.
	 * @param  String $key Accepts the name of another field saved in the post meta table.
	 * @return Object
	 *
	 * @version 1.0
	 */
	function make_magazine_get_project_data($key = 'Steps') {
		$data = get_post_custom_values($key);
		$data = unserialize($data[0]);

		return $data[0];
	}