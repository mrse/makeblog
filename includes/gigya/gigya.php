<?php


	/**
	 * All the goodness that is Gigya.
	 *
	 * These scripts will allow us to register new Guest Author accounts and plays a big roll in our new Community areas within Makeblog and MakerFaire
	 */
	

	// Load our Gigya Signatures
	include_once( 'class-signature-utility.php' );

	// Load our Gigya Helper Functions
	include_once ( 'helper-functions.php' );

	// Load our Gigya Guest Author/Co-Authors Plus integrations
	include_once( 'contribute-guest-author.php' );


	function make_gigya_add_resources() {
		wp_enqueue_script( 'make-gigya-core', 'http://cdn.gigya.com/JS/socialize.js?apikey=' . get_gigya_api_key() );
		wp_enqueue_script( 'make-gigya-utility', get_stylesheet_directory_uri() . '/includes/gigya/js/gigya-utility.js', array( 'jquery' ), '1.0' );
	}
	add_action( 'wp_enqueue_scripts', 'make_gigya_add_resources' );