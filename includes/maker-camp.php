<?php
	/**
	 * This page contains all source code pertaining to Maker Camp.
	 *
	 * @package    makeblog
	 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
	 * @author     Cole Geissinger <cgeissinger@makermedia.com>
	 * 
	 */
	
	/**
	 * Adds a menu field to the menus section of the admin area for Maker Camp.
	 * @return void
	 *
	 * @version  1.0
	 */
	function make_mc_register_menu() {
		register_nav_menu( 'mc-header-menu', __( 'Maker Camp Nav' ) );
	}
	add_action( 'init', 'make_mc_register_menu' );


	/**
	 * Load our javascript and other resources
	 * @return void
	 *
	 * @version  1.0
	 */
	function make_mc_load_resources() {
		wp_enqueue_script( 'maker-camp-js', get_stylesheet_directory_uri() . '/js/maker-camp.min.js', array('jquery'), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'make_mc_load_resources' );

	
	/****** Shortcodes *****/

	/**
	 * A simple shortcode that will allow us to echo out the logo.
	 * Great to use becase we don't actually contain the logo in the header file...
	 * @param  Array  $atts an array of any options we'll be sending
	 * @return String
	 *
	 * @version  1.0
	 */
	function make_mc_logo( $atts ) {
		extract( shortcode_atts( array(
			'width'  => 570, // Only accepts integers
			'height' => 175, // Only accepts integers
		), $atts ) );
		
		return '<img src="http://makezineblog.files.wordpress.com/2013/05/maker-camp-logo2.png?w=' . intval( $width ) . '" alt="Maker Camp - On Google+" width="' . intval( $width ) . '" height="' . intval( $height ) . '">';
	}
	add_shortcode('maker-camp-logo', 'make_mc_logo' );


	/**
	 * Displays all the code needed for displaying an event or "project" in the schedule page.
	 *
	 * Use the attributes to add custom information and wrap the body description with this tag.
	 * @param  Array  $atts an array of any options we'll be sending
	 * @return String
	 *
	 * @version 1.0
	 */
	function make_mc_project_schedule_item( $atts, $content ) {
		extract( shortcode_atts( array(
			'url'   => '', 		  // String. Will format all data tossed in through esc_url()
			'img'   => '', 		  // String. URL to the project image
			'type'  => 'Project', // String. Enter the project type. Defaults to "Project"
			'date'  => '', 		  // String. Enter the date like "Monday, July 8th"
			'title' => '', 		  // String. Enter the title of the project
			'class' => '', 		  // String. Allows you to add extra classes. Separate each class with a space.
		), $atts ) );

		// wp_kses allow html array
		$allowed = array(
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array(),
		);

		// Check if new classes are tossed at us.
		if ( ! empty( $class ) ) {
			$output = '<div class="maker span ' . esc_attr( $class ) . '">';
		} else {
			$output = '<div class="maker span">';
		}

		// Check that an image is entered
		if ( ! empty( $img ) ) {
			// Add our clickable region to display the description body
			$output .= '<div class="more-info">';
			$output .= '<img src="' . esc_url( $img ) . '"';

			// Additionally, check that a title was entered
			if ( ! empty( $title ) )
				$output .= ' alt="Coke Mentos Rocket Car"';

			// Close the img tag.
			$output .= '>';

			// Close the .more-info class
			$output .= '</div>';
		}
		
		// Load the project type. Default is "Project"
		$output .= '<h5><span class="project-type">' . esc_attr( $type ) . '</span>';

		// Check that a date is set.
		if ( ! empty( $date ) )
			$output .= esc_attr( $date );

		// Now we can close the H5 for the title and date and start the opening tag for the title
		$output .= '</h5>';

		// Check we have a title. We want to check this independently of the URL.
		if ( ! empty( $title ) )
			$output .= '<div class="more-info"><h6 class="title">' . wp_kses( $title, $allowed ) . '</h6></div>';

		// Add our body description. This is the area that is hidden by default but slides out when the event is clicked.
		$output .= '<div class="maker-description"><div class="desc-body"><a href="#" class="close-btn">Close Window</a>' . $content . '</div><div class="desc-feat text-right"><a href="' . esc_url( $url ) . '" class="button blue small-button">Attend the Event</a></div></div>';
		
		// Put an end to this madness. Close the .maker class
		$output .= '</div>';

		// Now spit it out...
		return $output;
	}
	add_shortcode( 'maker-camp-project', 'make_mc_project_schedule_item' );
	
