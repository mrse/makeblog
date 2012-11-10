<?php

add_action('wp_ajax_gigya_makeblog_register', 'gigya_makeblog_register');
add_action('wp_ajax_nopriv_gigya_makeblog_register', 'gigya_makeblog_register');

add_action('wp_ajax_gigya_makeblog_update', 'gigya_makeblog_update');
add_action('wp_ajax_nopriv_gigya_makeblog_update', 'gigya_makeblog_update');

add_action('wp_ajax_esp_acct_search', 'esp_acct_search');
add_action('wp_ajax_nopriv_esp_acct_search', 'esp_acct_search');

add_action('wp_ajax_test_esp', 'test_esp');
add_action('wp_ajax_nopriv_test_esp', 'test_esp');


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
	
function XML2JSON($xml) {
	normalizeSimpleXML(simplexml_load_string($xml), $result);
	return json_encode($result);
}

function XML2array($xml) {
	normalizeSimpleXML(simplexml_load_string($xml), $result);
	return $result;
}

function get_esp_listener($srv) {
	$lisnr = '';
	
	$map = array(
		//service => listner
		 'AuthenticateSWUser' => ''
		,'AuthenticateURUser' => ''
		,'AuthenticateWIUser' => ''
		,'UpdateUserInfo'     => ''
		,'ws1000'             => ''   // *** Verify Existing User Logon ***
		,'ws1000TX'           => ''   //     Verify Existing User Logon with service periods
		,'ws1000WWDIPadLogin' => '01' //
		,'ws1000WWDIPadReg'   => '01' //
		,'ws1100'             => ''   //     Compute Tax and Shipping Prices
		,'ws1150'             => ''   //     Zip Code Validation
		,'ws1200'             => '01' // *** Add New Subscriber(s) or Product Buyer ***
		,'ws1219'             => '01' //
		,'ws1250'             => '01' //     Process payment(s) for Subscriber with a Balance Due
		,'ws1310'             => '02' //     Suspend/Un-suspend an Existing Account
		,'ws1400'             => ''   // *** Obtain Current Account Information ***
		,'ws1500'             => '02' // *** Update Current Account Information ***
		,'ws1600'             => '01' // *** Get UserId and Password from an Email Address ***
		,'ws1700'             => '02' //     Link Trial Subscription to Paid Subscription
		,'ws1800'             => '01' //     Convert Email Sub to Trial Sub
		,'ws1900'             => '02' //     Renew Subscriber(s)/Convert to paid
		,'ws2000'             => ''   //     Get matching account
		,'ws2100'             => '02' //     Get valid rate keys / renewal prices
		,'ws2200'             => ''   //     Set Account status
		,'ws2300'             => '02' //
		,'ws3100'             => '02' //     Cancel or Modify a Product order
		,'ws3400'             => ''   // *** Obtain Current Product Information ***
		,'ws3500'             => '02' // *** Update Current Product Information ***
		,'ws3600'             => '01' // *** Lookup Subscriber by Postal or Email Address ***
		,'ws3700'             => ''	  //
		,'ws4100'             => '03' //     Get all associated accounts within a company based on Global no.
	);
	
	if( array_key_exists($srv,$map) ) {
		$lisnr = $map[$srv];
	}
	
	return $lisnr;
}

function get_esp_error_meaning($code) {
	$k = ''.$code; //force to string
	$meaning = "unknown";
	
	$map = array(
		//general
		"99000" => "Invalid Login Credentials to ESP server"
		,"99001" => "Error loading request XML"
		,"99002" => "Invalid or incomplete input (missing request XML ,UID or Password)"
		,"99003" => "Invalid Data Error. Incomplete or missing required data."
		,"99004" => "Incomplete or Invalid Credit Card information"
		,"99005" => "Invalid Web Services User Login"
		,"99008" => "Server Time-out"
		,"99099" => "Unexpected error"
		
		//ws1000, ws1000tx Add New Subscriber(s) or Product Buyer
		,"10010" => "Good Logon"
		,"10011" => "Good Logon - Credit card information is about to expire" // ***
		,"10012" => "Good Logon – One or more related accounts about to expire or have expired" // ***
		,"10013" => "Subscriber is receiving credit service (no underlying paid service)"
		,"10015" => "Bad Logon - User ID invalid" // ***
		,"10016" => "Bad Logon - Password invalid" // ***
		,"10017" => "Good Logon - Account has expired" // ***
		,"10019" => "Account is about to expire" //***
		
		//ws1150 Zip Code Validation
		,"11501" => "The zip code is missing"
		,"11502" => "The state is missing"
		,"11503" => "The Zip code doesn't match the state"
		
		//ws1200 Add New Subscriber(s) or Product Buyer
		,"12011" => "User ID already assigned"
		,"12013" => "Master Account number is invalid"
		,"12014" => "Master Account does not qualify or is already in use"
		,"12017" => "Required name information missing (Last Name or company name)"
		,"12018" => "Credit card information invalid or missing"
		,"12019" => "Bill Address incomplete (Require street address, city, ZIP for US and City for Foreign country)"
		,"12020" => "Ship Address (Require street address, city, ZIP for US and City for Foreign country)"
		,"12021" => "User ID or password invalid or missing"
		,"12022" => "CC could not be authorized"
		,"12023" => "Invalid demographics"
		,"12024" => "Domain of email address is not recognized as valid"
		,"12025" => "Trial account not allowed. User has had an active account within last 6 months"
		,"12026" => "Email Address is not unique"
		,"12027" => "Invalid Pay type"
		,"12028" => "Invalid Group Code"
		,"12029" => "Invalid Customer number"
		,"12030" => "Invalid Handling Code"
		,"12031" => "Invalid Product Promotion Code"
		,"12032" => "Invalid Subscription Term"
		,"12033" => "Invalid Product Code"
		
		//ws1250 Process payment(s) for Subscriber with a Balance Due
		,"12501" => "Subscriber doesn't have an amount due"
		,"12502" => "Amount of payment doesn't match amount due"
		,"12517" => "Required name information missing (Last Name or  company name)"
		,"12518" => "Credit card information invalid or missing"
		,"12519" => "Bill Address incomplete (Require street address, city, ZIP for US and City for Foreign country)"
		,"12522" => "CC could not be authorized"
		,"12524" => "Domain of email address is not recognized as valid"
		
		//ws1310 Suspend/Un-suspend an Existing Account
		,"13101" => "Account Type or Status is not valid for suspend"
		,"13102" => "Account is already suspended"
		,"13103" => "Invalid Suspend From Date"
		,"13104" => "Suspend From Date cannot be after the expiration date"
		
		//ws1400 Obtain Current Account Information
		,"14001" => "No record found for given acct no. and pub"
		,"14002" => "Acct is cancelled"
		
		//ws1500 Update Current Account Information
		,"15010" => "Required name information missing (Last Name or Company Name must be present)"
		,"15011" => "Credit card information invalid or missing"
		,"15012" => "Invalid demographics"
		,"15013" => "User ID already in use"
		,"15014" => "Email address not unique"
		,"15015" => "Invalid Email address"
		,"15016" => "Invalid Handling Code"
		
		//ws1600 Get UserId and Password from an Email Address
		,"16001" => "Acct is cancelled"
		,"16011" => "Email address missing in input"
		
		//ws1700 Link Trial Subscription to Paid Subscription
		,"17010" => "Requested online account already linked to print account"
		,"17011" => "Print Account is in use by another online account"
		,"17012" => "Print Account does not qualify to allow an online account"
		,"17013" => "Unable to activate online account"
		,"17014" => "Missing or invalid information"
		
		//ws1800 Convert Email Sub to Trial Sub
		,"18010" => "Invalid account no."
		,"18011" => "Account is already a trial account"
		,"18012" => "Expire date is a past date"
		,"18013" => "Account type not Comp ( C )"
		
		//ws1900 Renew Subscriber(s)/Convert to paid
		,"19010" => "Renewal accepted"
		,"19011" => "Credit Order not allowed – Account already has a balance due"
		,"19012" => "Credit Order not allowed – Account has gone to credit hold"
		,"19013" => "Master Account number is invalid"
		,"19014" => "Master Account does not qualify or is already in use"
		,"19017" => "Required Billing information missing (Last Name or ?)"
		,"19018" => "Credit card information invalid or missing"
		,"19019" => "Billing Address incomplete (Require street address, city)"
		,"19020" => "Invalid acct no."
		,"19022" => "CC could not be authorized"
		,"19034" => "Invalid email address"
		
		//ws2000 Get matching account
		,"20010" => "No match found"
		,"20011" => "More than one match found"
		
		//ws2100 Get valid rate keys / renewal prices
		,"21010" => "Invalid acct no. (warning only)"
		
		//ws2200 Set Account status
		,"22010" => "Invalid acct no."
		,"22011" => "Invalid acct type"
		,"22012" => "Invalid status type requested"
		,"22013" => "Invalid expiry date OR Expiry date is in past"
		
		//ws3100 Cancel or Modify a Product order
		,"31001" => "Order already canceled"
		,"31002" => "Order successfully canceled"
		,"31003" => "Order successfully modified"
		,"31004" => "Order doesn't exist"
		,"31005" => "Order can't be modified or cancelled because it doesn't have an amount due"
		,"31006" => "Order is either not Active or is fully paid"
		,"31007" => "Invalid Item or order – This is specific to Product orders"
		
		//ws3400 Obtain Current Product Information
		,"34001" => "No record found for given Acct no."
		,"34002" => "Incorrect Company Code supplied"
		
		//ws3500 Update Current Product Information
		,"35001" => "No record found for given Acct no."
		,"35002" => "Incorrect Company Code supplied"
		,"35003" => "Incomplete address information provided"
		
		//ws3600 Lookup Subscriber by Postal or Email Address
		,"36001" => "Multiple Accounts Found"
		,"36002" => "No Accounts Found"
		
		//ws4100 Get all associated accounts within a company based on Global no.
		,"41001" => "No Accounts Found"
	);
	
	if( array_key_exists($k,$map) ) {
		$meaning = $map[$k];
	}

	return $meaning;
}

function get_esp_api_url($srv,$req) {
	// https://www.pubservice.com/wsrvc/Listener<##>.asmx/<SERVICE NAME>?CUID=<CUID>&CPWD=<CPWD>&REQ=<Request in XML format>
	
	$base  = get_esp_base_url();
	$esp   = get_esp_account();
	$lisnr = get_esp_listener($srv);

	$url = $base . '/wsrvc/Listener' . $lisnr . '.asmx/' . $srv . '?CUID=' . $esp->cuid . '&CPWD=' . rawurlencode($esp->cpwd) . '&REQ=' . rawurlencode($req);
	
	return $url;
}

function get_esp_xml($srv,$ary) {

	$pubcode = get_esp_pubcode();

	$string = '<pubcode>'.$pubcode.'</pubcode>';
	foreach($ary as $k=>$v) {
		if( is_array($v) ) {
			$string .= '<'.$k.'>';
			foreach($v as $sk=>$sv) {
				$string .= '<'.$sk.'>'.$sv.'</'.$sk.'>';
			}
			$string .= '</'.$k.'>';
		} else {
			$string .= '<'.$k.'>'.$v.'</'.$k.'>';
		}
	}
	
	$xml =  '<?xml version="1.0" encoding="utf-8" ?>'
			.'<'.$srv.'request>'
			.$string
			.'</'.$srv.'request>';

	return $xml;
}

function get_esp_api($srv,$params) {
	
	$response = array();
	$response['complete'] = false;
		
	$xmlreq =     get_esp_xml($srv,$params); //generate xml request
	$url    = get_esp_api_url($srv,$xmlreq); //generate url for GET
	
	$response['xml_req'] = $xmlreq;

	$xmlresp = wpcom_vip_file_get_contents( $url, 3, 900, array( 'obey_cache_control_header' => false ) ); //send GET request
	
	if( ! $xmlresp ) { //GET returned false
	
		$response['error']   = "wpcom_vip_file_get_contents";
		$response['message'] = "unable to get contents from url: ".$url;
		$response['url']    = $url;

	} else { //xml returned ok

		$simpleXmlElem = simplexml_load_string( $xmlresp ); //load xml into object
		
		if ( ! $simpleXmlElem ) { //unable to parse xml
			
			$response['error'] = "ESP API";
			$response['message'] = "can't parse xml response";
			$response['xml_resp']  = $xmlresp;
			
		} else {
			
			$ary = XML2array( $xmlresp );
			$response['esp'] = $ary;
			$response['url']     = $url;
			$response['xml_resp'] = $xmlresp;
			
			if( isset($ary['messagecodes']) ) { //grab an translate all message codes

				//get all message codes and meanings
				$codes = $ary['messagecodes'];
//				$response['codes'] = $codes;
				if( is_array($codes['code']) ) {
					$codes = $codes['code'];
				}
				$codeary = array();
				if( is_array($codes) ) {
					foreach($codes as $code) {
						if( ! empty($code) ) {
							$meaning = get_esp_error_meaning($code);
							if( isset($meaning) ) {
								$codeary[$code] = $meaning;
							}
						}
					}
				} else {
//					$response['codes'] = $codes;
					if( ! empty($codes) ) {
						$meaning = get_esp_error_meaning($codes);
						$codeary[$codes] = $meaning;
					}
				}
				$response['message_codes'] = $codeary;

			}

			$response['esp_tx'] = "failure"; //set default transaction result from response
			if( "0" != $ary['returncode'] ) { //transaction succeeded

				//
				// process transaction results
				//
				
				//set transactions flags in response
				$response['esp_tx'] = "success";
				$response['complete'] = true;
			}
		}

	}
	
	return $response;
}

function test_esp() {
	
	$payload = $_POST;

/*
	$srv = "ws1000";
	$params = array(
		 "uid"  => "stefan"
		,"upwd" => "stefan"
	);

	$srv = "ws1600";
	$params = array(
		"emailaddress" => "whyisjake@gmail.com"
	);

	$srv = "ws1400";
	$params = array(
		"acctno" => "000500"
	);

	$srv = "ws3600";
	$params = array(
		"shippingdetails" => array(
			"lname"     => ""
			,"fname"    => ""
			,"address1" => ""
			,"address2" => ""
			,"city"     => ""
			,"state"    => ""
			,"zip"      => ""
			,"country"  => ""
			,"email"    => "adutt@espcomp.com"
		)
	);

*/
	$srv = "ws3600";
	$params = array(
		"shippingdetails" => array(
			"lname"     => "spurlock"
			,"fname"    => "jake"
			,"address1" => ""
			,"address2" => ""
			,"city"     => ""
			,"state"    => "ca"
			,"zip"      => "95401"
			,"country"  => ""
			,"email"    => ""
		)
	);

	$response = get_esp_api($srv,$params);
	
	//return AJAX response
	header( "Content-Type: application/json" );
	echo json_encode($response);

	exit;
}

/**
 *
 */
function get_esp_acct($params) {

	$acct = false;
	
	if( array_key_exists("acctno",$params) ) { //lookup w/ acct number
		// e.g.
		//	$params = array(
		//		"acctno" => "000500"
		//	);
		
		$acct = get_esp_api("ws1400",$params); //Obtain Current Account Information
/* e.g.
			{
				"complete": true,
				"xml_req": "<?xml version=\"1.0\" encoding=\"utf-8\" ?><ws1400request><pubcode>MK<\/pubcode><acctno>000500<\/acctno><\/ws1400request>",
				"esp": {
					"returncode": "1",
					"pubcode": "MK",
					"acctno": "000500",
					"uid": "jakesuid",
					"upwd": "apassword",
					"accttype": "R",
					"subaccttype": null,
					"status": "A",
					"expiredate": "7\/1\/2013 12:00:00 AM",
					"amountdue": "0.0000",
					"globalacctno": null,
					"renewamtyr": "0",
					"renewamtmth": "0",
					"renewamtday": "0",
					"lastorderterm": "12",
					"lastordertermunit": "M",
					"currentpromocode": "PROMO1",
					"groupcode": null,
					"handlingcode": "PWD",
					"billmefirstdate": null,
					"billmelastdate": null,
					"adddate": "9\/24\/2007 12:00:00 AM",
					"emailoptioncode1": null,
					"emailoptioncode2": null,
					"emailoptioncode3": null,
					"emailoptioncode4": null,
					"emailoptioncode5": null,
					"emailvalid": null,
					"shippingdetails": {
						"lname": "SPURLOCK",
						"fname": "JAKE",
						"title": "SUPREME COMMANDER",
						"companyname": null,
						"address1": "1234 SOME PL",
						"address2": null,
						"city": "SEBASTAPOL",
						"state": "CA",
						"zip": "95472-2811",
						"zipcode": "95472-2811",
						"country": null,
						"telephone": "UNITED STATES",
						"fax": null,
						"email": "JSPURLOCK@OREILLY.COM",
						"clientcustno": null
					},
					"billingdetails": {
						"lname": null,
						"fname": null,
						"companyname": null,
						"address1": null,
						"address2": null,
						"city": null,
						"state": null,
						"zip": null,
						"zipcode": null,
						"country": null,
						"telephone": null,
						"fax": null,
						"email": null
					},
					"ccdetails": {
						"cctype": "A",
						"ccname": "JAKE SPURLOCK",
						"ccnumber": "************1234",
						"ccexpmm": "MM",
						"ccexpyy": "YYYY"
					},
					"demographics": null,
					"messagecodes": {
						"code": null
					}
				},
				"message_codes": [],
				"esp_tx": "success"
			}
*/
	} elseif ( array_key_exists("uid",$params) && array_key_exists("upwd",$params) ) { //lookup w/ esp user id and password
		// e.g.
		//	$params = array(
		//		 "uid"  => "stefan"
		//		,"upwd" => "stefan"
		//	);
		
		$acct = get_esp_api("ws1000",$params); //Verify Existing User Logon
/* e.g.
			{
				"complete": true,
				"xml_req": "<?xml version=\"1.0\" encoding=\"utf-8\" ?><ws1000request><pubcode>MK<\/pubcode><uid>stefan<\/uid><upwd>stefan<\/upwd><\/ws1000request>",
				"esp": {
					"returncode": "1",
					"uid": "stefan",
					"pubcode": "MK",
					"acctno": "000500",
					"accttype": "R",
					"subaccttype": null,
					"status": "C",
					"lname": "UNIDENTIFIED PAYMENTS",
					"fname": null,
					"expiredate": "12\/1\/2011 12:00:00 AM",
					"lastpromocode": "EXX",
					"handlingcode": "MWEB",
					"zip": "91606-3156",
					"messagecodes": {
						"code": ["10012", "10010"]
					},
					"globalacctno": "20429048",
					"copies": "1"
				},
				"message_codes": {
					"10012": "Good Logon \u2013 One or more related accounts about to expire or have expired",
					"10010": "Good Logon"
				},
				"esp_tx": "success"
			}
*/

	} else { //lookup w/ postal or email address
		// e.g.
		//	$params = array(
		//		"email"    => "adutt@espcomp.com"
		//	);
		//
		//	$params = array(
		//		"lname"     => "spurlock"
		//		,"fname"    => "jake"
		//		,"address1" => ""
		//		,"address2" => ""
		//		,"city"     => ""
		//		,"state"    => "ca"
		//		,"zip"      => "95401"
		//		,"country"  => ""
		//	);
		
		
		$shippingdetails = array( //prototype of req fields
			"lname"     => ""
			,"fname"    => ""
			,"address1" => ""
			,"address2" => ""
			,"city"     => ""
			,"state"    => ""
			,"zip"      => ""
			,"country"  => ""
			,"email"    => ""
		);
		
		//grab relevant query parameters and set shippingdetails
		foreach( array_keys($shippingdetails) as $k ) {
			if( array_key_exists($k,$params) ) {
				$shippingdetails[$k] = $params[$k];
			}
		}
		
		$acct = get_esp_api("ws3600",array("shippingdetails"=>$shippingdetails)); //Lookup Subscriber by Postal or Email Address
/* e.g.
			{
				"complete": true,
				"xml_req": "<?xml version=\"1.0\" encoding=\"utf-8\" ?><ws3600request><pubcode>MK<\/pubcode><shippingdetails><lname><\/lname><fname><\/fname><address1><\/address1><address2><\/address2><city><\/city><state><\/state><zip><\/zip><country><\/country><email>adutt@espcomp.com<\/email><\/shippingdetails><\/ws3600request>",
				"esp": {
					"returncode": "1",
					"fname": "ARTI",
					"lname": "DUTT",
					"globalacctno": null,
					"subscription": {
						"pubcode": "MK",
						"uid": "artidutt",
						"acctno": "874868",
						"accttype": "S",
						"subaccttype": null,
						"status": "A",
						"expiredate": "1\/1\/1900",
						"emailaddr": "ADUTT@ESPCOMP.COM"
					},
					"messagecodes": null
				},
				"esp_tx": "success"
			}
*/
	}
	
	if( array_key_exists('esp',$acct) ) { //add esp normalized
		
		$esp = $acct['esp'];
		if( array_key_exists('subscription',$esp) ) { //info is in subscription subarray
			$esp = $esp['subscription'];
		}
		
		$esp_normalized = array();
		if( array_key_exists('acctno',$esp) ) {
			$esp_normalized['acctno'] = $esp['acctno'];
		}
		if( array_key_exists('uid',$esp) ) {
			$esp_normalized['uid'] = $esp['uid'];
		}
		if( array_key_exists('accttype',$esp) ) {
			$esp_normalized['accttype'] = $esp['accttype'];
		}
		if( array_key_exists('status',$esp) ) {
			$esp_normalized['status'] = $esp['status'];
		}
		if( array_key_exists('expiredate',$esp) ) {
			$esp_normalized['expiredate'] = $esp['expiredate'];
		}
		if( array_key_exists('adddate',$esp) ) {
			$esp_normalized['adddate'] = $esp['adddate'];
		}
		$acct['esp_normalized'] = $esp_normalized;

	}

	return $acct;
}

/**
 *
 */
function esp_acct_search() {

	$params = $_POST;
	unset($params['action']);
	
	$response = get_esp_acct($params);

	//return AJAX response
	header( "Content-Type: application/json" );
	echo json_encode($response);

	exit;
}


/**
 * Determine if user is logged into Gigya
 *
 * returns wp post id / gigya uid if logged in, false otherwise
 */
function is_gigya_user_logged_in() {
	
	$uid = false;
	
	if( ! empty($_COOKIE['gigyaLoggedIn']) ) {
		
		$uid = $_COOKIE['gigyaLoggedIn'];
		
	}
	
	return $uid;
}

/**
 * Determine if user is an ESP subscriber
 *
 * returns acct no. if logged in, false otherwise
 */
function is_gigya_user_esp_subscriber($userarray) {
	
	$esp = false;

	$data = $userarray['data'];
	if( array_key_exists('esp',$data) ) {
		
		$esp = $data['esp'];
	}
	
	return $esp;
}

/**
 * Get Gigya user profile and data array
 *
 * returns array( "profile"=>array(), "data"=>array() )
 */
function get_gigya_user_array($uid) {

	//getAccountInfo
	$include = "profile,data"; //available: "data,emails,identities-active,identities-all,irank,loginIDs,profile"
	$url = "https://socialize-api.gigya.com/accounts.getAccountInfo?apiKey=".rawurlencode(get_gigya_api_key())."&secret=".rawurlencode(get_gigya_secret_key())."&format=json&UID=".$uid."&include=".$include;
	$contents = wpcom_vip_file_get_contents( $url, 3, 900, array( 'obey_cache_control_header' => false ) );
	$jobj = json_decode($contents);
	$userarray = array(
		"profile" => $jobj['profile']
		,"data" => $jobj['data']
	);
		
	return $userarray;
}

?>