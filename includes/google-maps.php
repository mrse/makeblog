<?php

	/**
	 * Contains all the source code for running the Google Maps Marker Map found in Maker Camp
	 */
	function make_makercamp_add_gm_resources() {

		// Only load these resources when we use the Maker Camp Map page template
		if ( ! is_admin() && is_page_template( 'page-makercamp-map.php' ) ) {
			wp_enqueue_script( 'make-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAujQEAqvu3Mrv4_E1ySsKuyk650i9HhzQ&sensor=true', array( 'jquery' ) );
			wp_enqueue_script( 'make-makercamp-google-maps', get_stylesheet_directory_uri() . '/js/google-maps.js', array( 'make-google-maps-api' ), '1.0' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'make_makercamp_add_gm_resources' );


	function make_makercamp_map_shortcode( $atts, $content ) {
		$output .= '<div class="row"><div id="map-canvas" class="span12" style="height:300px;"></div></div>';

		return $output;
	}
	add_shortcode( 'makercamp-map', 'make_makercamp_map_shortcode' );