<?php

	/**
	 * Contains all the source code for running the Google Maps Marker Map found in Maker Camp
	 *
	 * Had major issues with integrating a custom map.. Out of time, taking the easy way out with Google Maps Engine Lite.
	 * For now we'll save the source code, but will not load them until we are ready.
	 */
	

	/**
	 * Create the shortcode
	 * @param  Array  $atts    The array of attributes passed through the shortcode (Not supported right now)
	 * @param  String $content The string of content wrapped inside the shortcode (Not supported right now)
	 * @return String
	 */
	function make_makercamp_map_shortcode( $atts, $content ) {
		// Prefered method, but not ready for prime time.
		// $output .= '<div id="map-canvas" style="height:464px; width:100%;"></div>';

		// Current method. In time, use the custom map
		$output = '<iframe src="http://mapsengine.google.com/map/u/0/view?mid=zNd3spMv9Udc.kAZJyZ7T6RB8" width="99.5%" height="464"></iframe>';

		return $output;
	}
	add_shortcode( 'makercamp-map', 'make_makercamp_map_shortcode' );


	/**
	 * Load our resources
	 * @return void
	 */
	function make_makercamp_add_gm_resources() {

		// Only load these resources when we use the Maker Camp Map page template
		if ( ! is_admin() && is_page_template( 'page-makercamp-map.php' ) ) {

			$addresses = get_post_meta( get_the_ID(), 'makercamp-maps-data', true );
			wp_enqueue_script( 'make-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAujQEAqvu3Mrv4_E1ySsKuyk650i9HhzQ&sensor=true', array( 'jquery' ) );
			wp_enqueue_script( 'make-makercamp-google-maps', get_stylesheet_directory_uri() . '/js/google-maps.js', array( 'make-google-maps-api' ), '1.0' );
			wp_localize_script( 'make-makercamp-google-maps', 'makercamp', array(
				'addresses' => $addresses,
			) );
		}
	}
	//add_action( 'wp_enqueue_scripts', 'make_makercamp_add_gm_resources' );


	/**
	 * Adds our meta box to the maps page template
	 * @return Void
	 */
	function make_makercamp_map_data() {
		if ( isset( $_GET['post'] ) || isset( $_POST['post_ID'] ) ) {
			$post_id = $_GET['post'] ? $_GET['post'] : intval( $_POST['post_ID'] ) ;
			$template_file = get_post_meta( $post_id,'_wp_page_template',true );
		}

		// check for a template type
		if ( $template_file == 'page-makercamp-map.php' && isset( $post_id ) )
			add_meta_box( 'make-maps-data', 'Map Data (JSON format only)', 'make_map_data_callback', 'page' );
	}
	//add_action( 'add_meta_boxes', 'make_makercamp_map_data' );


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


	/**
	 * Hook and save our custom meta box on post save
	 * @param  String $post_id Contains the current posts ID
	 * @return Void
	 */
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
	//add_action( 'save_post', 'make_map_data_save' );


	/**
	 * Allows use to geocode via server side. CLient-side has a max limit of 10 when done through a loop of static address.
	 * Server-side will also cache for us and Google will handle all of that.
	 *
	 * NOTE: Had many issues with query limits and the data being passed and over all, we ran out of time to automate geocoding..
	 * 		 This script is being schelved for the time being.
	 * 		 
	 * @param  Array $address The array of address for us to Geocode
	 * @return Array|Boolean
	 */
	function make_map_geocode( $addresses, $post_id ) {

		// $addresses = get_post_meta( get_the_ID(), 'makercamp-maps-data', false );
		// Check if the WP_Http class is included
		if ( ! class_exists( 'WP_Http' ) )
			include_once( ABSPATH . WPINC . '/class-http.php' );

		// Take our JSON array and decode it for using in PHP
		$addresses = json_decode( htmlspecialchars_decode( $addresses ) );
		
		if ( is_array( $addresses ) ) {

			// Set the array we'll pass each modified array into
			$new_addresses = array();

			foreach( $addresses as $key => $value ) {

				// Convert $value from an Object to an Array
				$value = (array) $value;

				// Check if we already have a lat and long in the array
				if ( ! isset( $value['lat'] ) && ! isset( $value['lng'] ) && ! isset( $value['no-coords'] ) ) {

					$address = $value['Work City'] . ', ' . $value['Work State'] . ' ' . $value['Work Zip'] . ' ' . $value['Work Country'];

					// Set the Google Map Geocode URL
					$url = 'http://maps.google.com/maps/api/geocode/json?sensor=false&address=' . urlencode( $address );

					// Create a new WP HTTP class
					$wp_http = new WP_Http;

					// Fetch the data
					$request_json = $wp_http->request( $url );
					$request = json_decode( $request_json['body'], true );
					$results = $request['results'][0]['geometry']['location'];

					if ( ! empty( $results ) ) {
						foreach ( $results as $k => $v ) {
							$value[ $k ] = $v;
						}
					} else {
						$value['no-coords'] = false;
					}

					$new_addresses[] = $value;
				}

			}

			// Convert our new array into json
			if ( ! empty( $new_addresses ) ) {
				$new_addresses_json = json_encode( $new_addresses );

				// Check if anything has changed between our variables and update our post meta
				if ( $new_addresses_json != $addresses ) {

					$update_meta = update_post_meta( $post_id, 'makercamp-maps-data', $new_addresses_json );

					if ( $update_meta )
						update_post_meta( $post_id, 'makercamp-maps-data', $new_addresses_json );
				}

				return stripslashes( json_encode( $new_addresses ) );
			} else {
				return json_encode( $addresses );
			}

		} else {
			return false;
		}
	}
