<?php

add_action('wp_ajax_gigya_makeblog_register', 'gigya_makeblog_register');
add_action('wp_ajax_nopriv_gigya_makeblog_register', 'gigya_makeblog_register');

add_action('wp_ajax_gigya_makeblog_update', 'gigya_makeblog_update');
add_action('wp_ajax_nopriv_gigya_makeblog_update', 'gigya_makeblog_update');

add_action('wp_ajax_esp_test', 'esp_test');
add_action('wp_ajax_nopriv_esp_test', 'esp_test');


function gigya_makeblog_register() {
	global $coauthors_plus;
	
	$payload = $_POST;
	$response = array();
	$response['complete'] = false;
	
	$profile = $payload['profile'];
	$profile_data = new stdClass;
	if( isset($payload['data']) ) {
		$profile_data = $payload['data'];
	}
	
	$cid = "";
	if( isset($payload['context']) ) {
		$context = $payload['context'];

		if( isset($context['cid']) ) {
			$cid = $context['cid'];
		}
	}
	
	//failsafe user info
	$firstName = "";
	if( isset($profile['firstName']) ) {
		$firstName = $profile['firstName'];
	}
	$lastName = "";
	if( isset($profile['lastName']) ) {
		$lastName = $profile['lastName'];
	}
	$name = $firstName." ".$lastName;
	$email = "";
	if( isset($profile['email']) ) {
		$email = $profile['email'];
	}
	$profileURL = "";
	if( isset($profile['profileURL']) ) {
		$profileURL = $profile['profileURL'];
	}
	$photoURL = "";
	if( isset($profile['photoURL']) ) {
		$photoURL = $profile['photoURL'];
	}
	$thumbnailURL = "";
	if( isset($profile['thumbnailURL']) ) {
		$thumbnailURL = $profile['thumbnailURL'];
	}
	$gender = "";
	if( isset($profile['gender']) ) {
		$gender = $profile['gender'];
	}
	$birthdate = "";
	if( !empty($profile['birthDay']) && !empty($profile['birthMonth']) && !empty($profile['birthYear']) ) {
		$bday = $profile['birthDay'];
		$bmo = $profile['birthMonth'];
		$byr = $profile['birthYear'];
		
		$birthdate = $bmo.'/'.$bday.'/'.$byr;
	}
	$zip = "";
	if( isset($profile['zip']) ) {
		$zip = $profile['zip'];
	}
	$city = "";
	if( isset($profile['city']) ) {
		$city = $profile['city'];
	}
	$state = "";
	if( isset($profile['state']) ) {
		$state = $profile['state'];
	}
	$country = "";
	if( isset($profile['country']) ) {
		$country = $profile['country'];
	}
	
	
	//DEBUG
//	$response['profile'] = $profile;
//	$response['data'] = $profile_data;
	
	//validate signature
	$uid     = $payload['UID'];
	$tstamp  = $payload['signatureTimestamp'];
	$sig     = $payload['UIDSignature'];
	$isValid = SigUtils::validateUserSignature($uid, $tstamp, get_gigya_secret_key(), $sig);

	if( true === $isValid ) { //signature is good

		//create guest author user
		$post = array(
			'post_content' => $uid." = ".$name, //The full text of the post.
			'post_title' => $name, //The title of your post.
			'post_author' => 604631, //generic make user
			'post_status' => 'published',
			'post_type' => 'guest-author'
		); 
		
		$make_post_id = wp_insert_post( $post );
		
		//update guest author meta info
		makeblog_update_post_meta( $make_post_id, 'cap-display_name',  sanitize_text_field($name) );
		makeblog_update_post_meta( $make_post_id, 'cap-first_name',  sanitize_text_field($firstName) );
		makeblog_update_post_meta( $make_post_id, 'cap-last_name',  sanitize_text_field($lastName) );
		makeblog_update_post_meta( $make_post_id, 'cap-user_email',  $email );
		makeblog_update_post_meta( $make_post_id, 'cap-website',  esc_url_raw($profileURL) );
		makeblog_update_post_meta( $make_post_id, 'cap-photo_url',  esc_url_raw($photoURL) );
		makeblog_update_post_meta( $make_post_id, 'cap-thumbnail_url',  esc_url_raw($thumbnailURL) );
		makeblog_update_post_meta( $make_post_id, 'cap-gender',  $gender );
		makeblog_update_post_meta( $make_post_id, 'cap-birthdate',  $birthdate );
		makeblog_update_post_meta( $make_post_id, 'cap-zip',  $zip );
		makeblog_update_post_meta( $make_post_id, 'cap-city',  $city );
		makeblog_update_post_meta( $make_post_id, 'cap-state',  $state );
		makeblog_update_post_meta( $make_post_id, 'cap-country',  $country );

		// The user login field shouldn't collide with any existing users
		$userLogin = $firstName;
		if( !empty($lastName) ) {
			if( !empty($userLogin) ) {
				$userLogin .= '-';
			}
			$userLogin .= $lastName;
		}
		$existing_coauthor = $coauthors_plus->get_coauthor_by( 'user_login', $userLogin );
		if ( $existing_coauthor && 'guest-author' == $existing_coauthor->type ) {
			$userLogin .= '-'. $make_post_id;
		}
		makeblog_update_post_meta( $make_post_id, 'cap-user_login', $userLogin );
		
		// Make sure the author term exists and that we're assigning it to this post type
		wp_set_post_terms( $make_post_id, $userLogin, "author", false );
		
		//setUID
		$url = "https://socialize-api.gigya.com/socialize.setUID?apiKey=".rawurlencode(get_gigya_api_key())."&secret=".rawurlencode(get_gigya_secret_key())."&format=json&UID=".$uid."&siteUID=".$make_post_id;
		$contents = wpcom_vip_file_get_contents( $url, 3, 900, array( 'obey_cache_control_header' => false ) );
		$jobj = json_decode($contents);
		
		//DEBUG
//		$response['url'] = $url;
//		$response['REST'] = $jobj;

		if($jobj->errorCode === 0) { // Success!
			$response['siteUID'] = $make_post_id;
			$response['complete'] = true;
		} else { // Error setting UID
			$response['error'] = "Gigya API";
			$response['message'] = "Error on gigya.setUID[" . $jobj->callId . "]: " . $jobj->errorMessage . " | " . $jobj->errorDetails;
		}
	
	} else { //signature is bad
	
		$response['error'] = "Gigya Signature";
		$response['message'] = "Gigya signature is invalid";
	}

	//return AJAX response
	header( "Content-Type: application/json" );
	echo json_encode($response);
	
	exit;
}

function gigya_makeblog_update() {
		
	$payload = $_POST;
	$response = array();
	$response['complete'] = false;
	
	$profile = $payload['profile'];
	$uid = $payload['UID'];
	
	//failsafe user info
	$firstName = "";
	if( isset($profile['firstName']) ) {
		$firstName = $profile['firstName'];
	}
	$lastName = "";
	if( isset($profile['lastName']) ) {
		$lastName = $profile['lastName'];
	}
	$name = $firstName." ".$lastName;
	$email = "";
	if( isset($profile['email']) ) {
		$email = $profile['email'];
	}
	$profileURL = "";
	if( isset($profile['profileURL']) ) {
		$profileURL = $profile['profileURL'];
	}
	$photoURL = "";
	if( isset($profile['photoURL']) ) {
		$photoURL = $profile['photoURL'];
	}
	$thumbnailURL = "";
	if( isset($profile['thumbnailURL']) ) {
		$thumbnailURL = $profile['thumbnailURL'];
	}
	$gender = "";
	if( isset($profile['gender']) ) {
		$gender = $profile['gender'];
	}
	$birthdate = "";
	if( !empty($profile['birthDay']) && !empty($profile['birthMonth']) && !empty($profile['birthYear']) ) {
		$bday = $profile['birthDay'];
		$bmo = $profile['birthMonth'];
		$byr = $profile['birthYear'];
		
		$birthdate = $bmo.'/'.$bday.'/'.$byr;
	}
	$zip = "";
	if( isset($profile['zip']) ) {
		$zip = $profile['zip'];
	}
	$city = "";
	if( isset($profile['city']) ) {
		$city = $profile['city'];
	}
	$state = "";
	if( isset($profile['state']) ) {
		$state = $profile['state'];
	}
	$country = "";
	if( isset($profile['country']) ) {
		$country = $profile['country'];
	}
	
	//update guest author meta info
	makeblog_update_post_meta( $uid, 'cap-display_name',  sanitize_text_field($name) );
	makeblog_update_post_meta( $uid, 'cap-first_name',  sanitize_text_field($firstName) );
	makeblog_update_post_meta( $uid, 'cap-last_name',  sanitize_text_field($lastName) );
	makeblog_update_post_meta( $uid, 'cap-user_email',  $email );
	makeblog_update_post_meta( $uid, 'cap-website',  esc_url_raw($profileURL) );
	makeblog_update_post_meta( $uid, 'cap-photo_url',  esc_url_raw($photoURL) );
	makeblog_update_post_meta( $uid, 'cap-thumbnail_url',  esc_url_raw($thumbnailURL) );
	makeblog_update_post_meta( $uid, 'cap-gender',  $gender );
	makeblog_update_post_meta( $uid, 'cap-birthdate',  $birthdate );
	makeblog_update_post_meta( $uid, 'cap-zip',  $zip );
	makeblog_update_post_meta( $uid, 'cap-city',  $city );
	makeblog_update_post_meta( $uid, 'cap-state',  $state );
	makeblog_update_post_meta( $uid, 'cap-country',  $country );
	
	$response['complete'] = true;
	
	//return AJAX response
	header( "Content-Type: application/json" );
	echo json_encode($response);

	exit;
}

function XML2JSON($xml) {

	function normalizeSimpleXML($obj, &$result) {
		$data = $obj;
		if (is_object($data)) {
			$data = get_object_vars($data);
		}
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				$res = null;
				normalizeSimpleXML($value, $res);
				if (($key == '@attributes') && ($key)) {
					$result = $res;
				} else {
					$result[$key] = $res;
				}
			}
		} else {
			$result = $data;
		}
	}
	normalizeSimpleXML(simplexml_load_string($xml), $result);
	return json_encode($result);
}

function get_esp_listener($srv) {
	$lisnr = '';
	
	$map = array(
		//service => listner
		 'AuthenticateSWUser' => ''
		,'AuthenticateURUser' => ''
		,'AuthenticateWIUser' => ''
		,'UpdateUserInfo'     => ''
		,'ws1000'             => '' // *** Verify Existing User Logon ***
		,'ws1000TX'           => '' //     Verify Existing User Logon with service periods
		,'ws1100'             => '' //     Compute Tax and Shipping Prices
		,'ws1150'             => '' //     Zip Code Validation
		,'ws1400'             => '' // *** Obtain Current Account Information ***
		,'ws2000'             => '' //     Get matching account
		,'ws2200'             => '' //     Set Account status
		,'ws3400'             => '' // *** Obtain Current Product Information ***
		,'ws3700'             => ''

		,'ws1000WWDIPadLogin' => '01'
		,'ws1000WWDIPadReg'   => '01'
		,'ws1200'             => '01' // *** Add New Subscriber(s) or Product Buyer ***
		,'ws1219'             => '01'
		,'ws1250'             => '01' //     Process payment(s) for Subscriber with a Balance Due
		,'ws1600'             => '01' // *** Get UserId and Password from an Email Address ***
		,'ws1800'             => '01' //     Convert Email Sub to Trial Sub
		,'ws3600'             => '01' // *** Lookup Subscriber by Postal or Email Address ***

		,'ws1310' => '02' //     Suspend/Un-suspend an Existing Account
		,'ws1500' => '02' // *** Update Current Account Information ***
		,'ws1700' => '02' //     Link Trial Subscription to Paid Subscription
		,'ws1900' => '02' //     Renew Subscriber(s)/Convert to paid
		,'ws2100' => '02' //     Get valid rate keys / renewal prices
		,'ws2300' => '02' //
		,'ws3100' => '02' //     Cancel or Modify a Product order
		,'ws3500' => '02' // *** Update Current Product Information ***
		
		,'ws4100' => '03' //     Get all associated accounts within a company based on Global#
	);
	
	if( array_key_exists($srv,$map) ) {
		$lisnr = $map[$srv];
	}
	
	return $lisnr;
}

function get_esp_api_url($srv,$req) {
	// https://www.pubservice.com/wsrvc/Listener<##>.asmx/<SERVICE NAME>?CUID=<CUID>&CPWD=<CPWD>&REQ=<Request in XML format>
	
	$base  = get_esp_base_url();
	$esp   = get_esp_account();
	$lisnr = get_esp_listener($srv);

	$url = $base . '/wsrvc/Listener' . $lisnr . '.asmx/' . $srv . '?CUID=' . $esp->cuid . '&CPWD=' . rawurlencode($esp->cpwd) . '&REQ=' . $req;
	
	return $url;
}

function get_esp_xml($srv,$ary) {
	$string = "";
	foreach($ary as $k=>$v) {
		$string .= '<'.$k.'>'.$v.'</'.$k.'>';
	}
	
	$xml =  '<?xml version="1.0" encoding="utf-8" ?>'
			.'<'.$srv.'request>'
			.$string
			.'</'.$srv.'request>';

	return $xml;
}

function esp_test() {
	
	$payload = $_POST;
	$response = array();
	$response['complete'] = false;
	
	$pubcode = get_esp_pubcode();
	$uid = "";
	$upwd = "";
	$params = array(
		 "pubcode" => $pubcode
		,"uid"     => $uid
		,"upwd"    => $upwd
	);
	
	$xmlreq = get_esp_xml( "ws1000",$params);
	$url    = get_esp_api_url("ws1000",$xmlreq);
	
//	$xmlresp = wpcom_vip_file_get_contents( $url );
	
//	$simpleXmlElem = simplexml_load_string( $xmlresp );
	
//	if ( ! $simpleXmlElem ) {
//		$response['error'] = "ESP API";
//	} else {
//		$json = XML2JSON( $xmlresp );
		$response['xml']  = $xmlresp;
//		$response['json'] = $json;
		$response['complete'] = true;
//	}
	
	//return AJAX response
	header( "Content-Type: application/json" );
	echo json_encode($response);

	exit;

}

?>