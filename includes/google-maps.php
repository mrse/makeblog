<?php

	/**
	 * Contains all the source code for running the Google Maps Marker Map found in Maker Camp
	 *
	 * Had major issues with integrating a custom map.. Out of time, taking the easy way out with Google Maps Engine Lite.
	 * For now we'll save the source code, but will not load them until we are ready. Revert back to 73afd0f7503575d7e4ddc2f1754c2572b2770cd5 on GitHub for all the geocode fun @colegeissinger built.
	 */
	

	/**
	 * Create the shortcode
	 * @param  Array  $atts    The array of attributes passed through the shortcode (Not supported right now)
	 * @param  String $content The string of content wrapped inside the shortcode (Not supported right now)
	 * @return String
	 */
	function make_makercamp_map_shortcode( $atts, $content ) {

		$output = '<iframe src="http://mapsengine.google.com/map/u/0/view?mid=zNd3spMv9Udc.kAZJyZ7T6RB8" width="99.5%" height="464"></iframe>';

		return $output;
	}
	add_shortcode( 'makercamp-map', 'make_makercamp_map_shortcode' );


	/**
	 * Adds our meta box to the maps page template
	 * @return Void
	 */
	function make_makercamp_map_data() {
		if ( isset( $_GET['post'] ) || isset( $_POST['post_ID'] ) ) {
			$post_id = $_GET['post'] ? absint( $_GET['post'] ) : absint( $_POST['post_ID'] ) ;
			$template_file = get_post_meta( $post_id,'_wp_page_template',true );
		}

		// check for a template type
		if ( $template_file == 'page-makercamp-map.php' && isset( $post_id ) )
			add_meta_box( 'make-maps-data', 'Map Data (JSON array only) This builds the contact table.', 'make_map_data_callback', 'page' );
	}
	add_action( 'add_meta_boxes', 'make_makercamp_map_data' );


	/**
	 * The callback function that will handle the form in our meta box
	 * @param  Object $post The post object
	 * @return String
	 */
	function make_map_data_callback( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'makercamp-nonce' );
		$map_data = get_post_meta( $post->ID, 'makercamp-maps-data', false );
		echo '<textarea name="makercamp-maps-data" id="makercamp-map-data" style="width:100%; height:90px;">' . esc_attr( $map_data[0] ) . '</textarea>';
	}