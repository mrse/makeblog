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
			<div class="steps-template step-wrapper">
				<input type="hidden" name="step-number-0" value="0">
				<div class="step-title">
					<h3>Step 0</h3>
					<div class="remove-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-remove.png"></div>
				</div>
				<div class="step-contents group">
					<div id="image-list" class="alignleft">
						<div class="image-upload group">
							<img src="http://placehold.it/94x94" alt="" class="alignleft steps-image" title="Upload an Image" width="94" height="94" />
							<input type="hidden" name="step-image-0[]" class="image-url" value="">
						</div><!--[END .image-upload]-->
						<div class="image-upload group">
							<img src="http://placehold.it/94x94" alt="" class="alignleft steps-image" title="Upload an Image" width="94" height="94" />
							<input type="hidden" name="step-images-0[]" class="image-url" value="">
						</div><!--[END .image-upload]-->
						<div class="image-upload group">
							<img src="http://placehold.it/94x94" alt="" class="alignleft steps-image" title="Upload an Image" width="94" height="94" />
							<input type="hidden" name="step-images-0[]" class="image-url" value="">
						</div><!--[END .image-upload]-->
					</div><!--[END #image-list]-->
					<div id="list" class="alignleft">
						<input type="text" name="step-title-0" id="project-header" class="widefat" placeholder="Description" value="">
						<ul id="sub-lists" class="reset-list">
							<li class="list-template">
								<textarea name="step-lines-0[]" id="line-0" rows="5"></textarea>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sort.png" class="project-button sort" />
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-minus.png" class="project-button remove">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-add.png" class="project-button add">
							</li>
							<li>
								<textarea name="step-lines-0[]" id="line-0" rows="5"></textarea>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sort.png" class="project-button sort" />
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-minus.png" class="project-button remove">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-add.png" class="project-button add">
							</li>
						</ul>
					</div><!--[END #list]-->
				</div><!--[END .step-contents]-->
			</div><!--[END .steps-template]-->
			<?php if(isset($steps) && is_array($steps)) : ?>
				<?php $step_num = 1; foreach($steps as $step) : ?>
					<div id="step-<?php echo $step_num; ?>" class="step-wrapper">
						<input type="hidden" name="step-number-<?php echo $step_num; ?>" value="<?php echo (!empty($step->number)) ? $step->number : $step_num; ?>">
						<div class="step-title">
							<h3>Step <?php echo $step_num; ?></h3>
							<div class="remove-step"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-remove.png"></div>
						</div>
						<div class="step-contents group">
							<div id="image-list" class="alignleft">
								<?php // loop through our images array 3 times, checking if images exist. If not, add placeholders.
									for($i = 0; $i < 3; $i++) :
										if(isset($step->images[$i]) && !empty($step->images[$i]->text)) { ?>
											<div class="image-upload group has-image">
												<img src="<?php echo esc_url($step->images[$i]->text); ?>" alt="" class="alignleft steps-image" width="94" height="94" />
												<input type="hidden" name="step-images-<?php echo $step_num; ?>[]" class="image-url" value="<?php echo esc_url($step->images[$i]->text); ?>">
											</div><!--[END .image-upload]-->
										<?php } else { ?>
											<div class="image-upload group">
												<img src="http://placehold.it/94x94" alt="" class="alignleft steps-image" title="Upload an Image" width="94" height="94" />
												<input type="hidden" name="step-images-<?php echo $step_num; ?>[]" class="image-url" value="">
											</div><!--[END .image-upload]-->
										<?php }
									endfor;
								?>
							</div><!--[END #image-list]-->
							<div id="list" class="alignleft">
								<input type="text" name="step-title-<?php echo $step_num; ?>" id="project-header" class="widefat" placeholder="Add A Title" value="<?php echo (!empty($step->title)) ? wp_filter_post_kses($step->title) : ''; ?>">
								<ul id="sub-lists" class="sortable reset-list">
									<?php if(isset($step->lines)) : ?>
										<?php
											$total = count($step->lines); // Count the number of sub-steps
											$i = 1; // Used to set the right ID's and to check against
											foreach($step->lines as $key) : ?>
											<li>
												<textarea name="step-lines-<?php echo $step_num; ?>[]" id="line-<?php echo $i; ?>" rows="5"><?php echo wp_filter_post_kses($key->text); ?></textarea>
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sort.png" class="project-button sort" />
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-minus.png" class="project-button remove">
												<?php if($i === $total) : // Display our add button only on the last step on load. ?>
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-add.png" class="project-button add">
												<?php endif;
												$i++; ?>
											</li>
											<?php endforeach;
										?>
									<?php else : ?>
										<li>
											<textarea name="step-lines-<?php echo $step_num; ?>[]" id="line-<?php echo $step_num; ?>" rows="5"></textarea>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-sort.png" class="project-button sort" />
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-minus.png" class="project-button remove">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-add.png" class="project-button add">
										</li>
									<?php endif; ?>
								</ul>
							</div><!--[END #list]-->
						</div><!--[END .step-contents]-->
					</div><!--[END step-wrapper]-->
					<?php $step_num++; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<input type="hidden" name="total-steps" value="<?php echo $step_num - 1; ?>">
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

		// Loop through each step and create an object for each. Loop through the number of total steps sent through the $_POST array.
		for($i = 1; $i <= intval($_POST['total-steps']); $i++) {
			// Define a new $step array. Other wise, we'll end up getting duplicate content...
			$step = array();

			// Add our title to the object
			$step['title'] = wp_filter_post_kses($_POST['step-title-' . $i]);

			// Create the lines array and contain each line as an object in the Steps object
			$int = 0;
		 	foreach($_POST['step-lines-' . $i] as $line) {
				$step['lines'][] = (object) array('text' => wp_filter_post_kses($line), 'text_raw' => wp_filter_post_kses($line), 'bullet' => 'black', 'level' => 0);
				//echo $_POST['step-lines-' . $i][$int] . '<br />';
				$int++;
		 	}

			// Set the object array. At this moment. It's empty.
			$step['object'] = '';

			// Set our images array and contain each image as an object in the Steps object
			$int = 0;
			foreach($_POST['step-images-' . $i] as $image) {
				$step['images'][$int] = (object) array('imageid' => $post_id, 'orderby' => $int, 'text' => esc_url_raw($image));
				$int++; // Only increase the integer variable when we encounter a non-empty image value
			}

			// Count the number of Steps set in the step manager and save that number
			$step['number'] = intval($_POST['step-number-' . $i]);

			// Contain the whole $steps array into an object
			$step_object[] = (object) $step;

		}

		// Apparently update_post_meta() will serialize our data for us... and add/update our Steps row.
		update_post_meta($post_id, 'Steps', $step_object);

		//echo '<pre>'; print_r($step_object); echo '</pre>';
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

		return $data;
	}