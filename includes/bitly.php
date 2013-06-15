<?php
/**
 * Create a Bit.ly URL
 */
function make_bitly_url( $url ) {
	// Base URL for the API
	$bitly = 'http://api.bit.ly/shorten';
	// Arguments to append.
	$args = array(
		'version' 	=> '2.0.1',
		'longUrl' 	=> $url,
		'login'		=> 'jspurlock',
		'apiKey'	=> 'R_0bd5a31ae74e16ceef7dd529bbf78fca',
		'format'	=> 'json'
	);
	
	// Formatted long URL
	$long_url = add_query_arg( $args, $bitly );

	// Get the response
	$response = wpcom_vip_file_get_contents( $long_url );

	// Decode the JSON
	$json = json_decode( $response, true );

	// Return the URL
	return $json['results'][$url]['shortUrl'];
}