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
		if ( is_page_template( 'page-makercamp.php' || is_page_template( 'page-makercamp-map.php' ) ) ) {
			// wp_enqueue_style( 'thickbox' );
			// wp_enqueue_script( 'thickbox' );
			wp_enqueue_script( 'bootstrap' );
			wp_enqueue_script( 'maker-camp-js', get_stylesheet_directory_uri() . '/js/maker-camp.min.js', array('jquery'), '1.0', true );
		}
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
	 * @param  Array  $atts    An array of any options we'll be sending
	 * @param  String $content The string that holds our content wrapped in our shortcode
	 * @return String
	 *
	 * @version 1.0
	 */
	function make_mc_project_schedule_item( $atts, $content ) {
		extract( shortcode_atts( array(
			'date'  => '',        // String. The date as you want it to appear
			'img'   => '', 		  // String. URL to the project image
			'title' => '', 		  // String. Enter the title of the project
			'mentor' => '', 	  // String. Enter the name of the mentot
			'mentor_link' => '',  // URL.    Enter the mentors URL to link to.
			'link'  => '', 		  // String. Add in the URL to where you want the far right button to link to
			'link_title' => 'View on G+',    // URL. This variable takes the text that will display in the button on the far right
			'class' => '', 		  // String. Allows you to add extra classes. Separate each class with a space.
		), $atts ) );

		// wp_kses allow html array
		$allowed = array(
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array(),
		);

		// Check if new classes are tossed at us.
		$output  = ( ! empty( $class ) ) ? '<div class="row maker ' . esc_attr( $class ) . '">' : '<div class="row maker">' ;

		// Load the project photo
		if ( ! empty( $img ) ) {
			$output .= '<div class="span3 project-photo"><img src="' . wpcom_vip_get_resized_remote_image_url( esc_url( $img ), 166, 107 ) . '" /></div>';
		} else {
			$output .= '<div class="span3 project-photo"><img src="' . get_stylesheet_directory_uri() . '/img/makercamp/schedule-placeholder.png" /></div>';
		}

		$output .= '<div class="span6 project-body">';

		// Load the project title
		if ( ! empty( $title ) )
			$output .= '<h2 class="project-title">' . esc_attr( $title ) . '</h2>';

		if ( ! empty( $date ) )
			$output .= '<h3 class="date">' . esc_attr( $date ) . '</h3> ';

		if ( ! empty( $mentor ) ) {
			$output .= '<h3 class="mentor">';

			$output .= ' &mdash; Make Mentor: ';

			if ( ! empty( $mentor_link ) )
				$output .= '<a href="' . esc_url( $mentor_link ) . '">';

			$output .= $mentor;

			if ( ! empty( $mentor_link ) )
				$output .= '</a>';

			$output .= '</h3>';
		}

		// Add the main body paragraph
		$output .= wp_kses_post( do_shortcode( $content ) );

		// Close the project body
		$output .= '</div>';

		$output .= '<div class="span3 project-link">';

		// Check if a link is set or not and display the right HTML
		if ( ! empty( $link ) ) {
			$output .= '<a href="' . esc_url( $link ) . '" class="button blue small-button';
		} else {
			$output .= '<p class="button blue small-button';
		}

		$output .= '">';

		$output .= esc_attr( $link_title );

		// Check again and close the needed HTML if a link is set or not
		if ( ! empty( $link ) ) {
			$output .= '</a>';
		} else {
			$output .= '</p>';
		}

		// Close the project link
		$output .= '</div>';
		
		// Put an end to this madness. Close the .maker class
		$output .= '</div>';

		// Now spit it out...
		return $output;
	}
	add_shortcode( 'maker-camp-project', 'make_mc_project_schedule_item' );


	/**
	 * The shortcode to displaying the project materials link and modal window
	 * @param  Array  $atts    An array of any options we'll be sending
	 * @param  String $content The string that holds our content wrapped in our shortcode
	 * @return String
	 */
	function make_mc_project_schedule_materials( $atts, $content ) {
		extract( shortcode_atts( array(
			'link_id'   => '',
			'link_name' => 'Materials and Instructions',
			'class'     => '',
			'width'     => 600,
			'height'    => 550,
		), $atts ) );

		// wp_kses allow html array
		$allowed = array(
			'br' 	 => array(),
			'em' 	 => array(),
			'strong' => array(),
		);

		if ( ! empty( $content ) ) {
			$output = '<h4><a class="' . esc_attr( $class ) . '" data-toggle="modal" href="#' . esc_attr( $link_id ) . '">' . esc_html( $link_name ) . '</a></h4>
			<div class="modal hide fade" id="' .esc_attr( $link_id ) . '">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">&times;</a>
					<h3>' . esc_html( $link_name ) . '</h3>
				</div>
				<div class="modal-body">' . wp_kses_post( do_shortcode( $content ) ) . '</div>
				<div class="modal-footer">
					<a class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
				</div>
			</div>';

			return $output;
		}
	}
	add_shortcode( 'maker-camp-project-materials', 'make_mc_project_schedule_materials' );
	
