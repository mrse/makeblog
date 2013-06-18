<?php

	/**
	 * Contains all the source code for running the Google Maps Marker Map found in Maker Camp
	 */
	function make_makercamp_add_gm_resources() {

		// Only load these resources when we use the Maker Camp Map page template
		if ( ! is_admin() && is_page_template( 'page-makercamp-map.php' ) ) {

			$addresses = get_post_meta( get_the_ID(), 'makercamp-maps-data', false );
			wp_enqueue_script( 'make-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAujQEAqvu3Mrv4_E1ySsKuyk650i9HhzQ&sensor=true', array( 'jquery' ) );
			wp_enqueue_script( 'make-makercamp-google-maps', get_stylesheet_directory_uri() . '/js/google-maps.js', array( 'make-google-maps-api' ), '1.0' );
			wp_localize_script( 'make-makercamp-google-maps', 'makercamp', array(
				'addresses' => str_replace('&quot;', '"', $addresses[0]),
			) );
		}
	}
	add_action( 'wp_enqueue_scripts', 'make_makercamp_add_gm_resources' );


	function make_makercamp_map_shortcode( $atts, $content ) {
		$output .= '<div id="map-canvas" class="span12" style="height:751px;"></div>';

		return $output;
	}
	add_shortcode( 'makercamp-map', 'make_makercamp_map_shortcode' );


	function make_makercamp_map_data() {
		$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
		$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
		  // check for a template type
		  if ($template_file == 'page-makercamp-map.php')
		    add_meta_box( 'make-maps-data', 'Map Data (JSON format only)', 'make_map_data_callback', 'page' );
	}
	add_action( 'add_meta_boxes', 'make_makercamp_map_data' );


	function make_map_data_callback( $post ) {
		wp_nonce_field( basename( __FILE__ ), 'makercamp-nonce' );
		$map_data = get_post_meta( $post->ID, 'makercamp-maps-data', false );
		echo '<textarea name="makercamp-maps-data" id="makercamp-map-data" style="width:100%; height:90px;">' . esc_attr( $map_data[0] ) . '</textarea>';
	}

	function make_map_data_save( $post_id ) {
		// Bail if we're doing an auto save
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		
		// if our nonce isn't there, or we can't verify it, bail
		if( !isset( $_POST['makercamp-nonce'] ) || !wp_verify_nonce( $_POST['makercamp-nonce'], basename( __FILE__ ) ) ) return;
		
		// if our current user can't edit this post, bail
		if( !current_user_can( 'edit_post' ) ) return;

		
		// Make sure your data is set before trying to save it
		if( isset( $_POST['makercamp-maps-data'] ) )
			update_post_meta( $post_id, 'makercamp-maps-data', esc_attr( $_POST['makercamp-maps-data'] ) );
			
	}
	add_action( 'save_post', 'make_map_data_save' );
