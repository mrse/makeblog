<?php

add_action( 'wp_ajax_gigya_makeblog_page2form', 'gigya_makeblog_page2form' );
add_action( 'wp_ajax_nopriv_gigya_makeblog_page2form', 'gigya_makeblog_page2form' );

add_action( 'wp_ajax_gigya_makeblog_linksubform', 'gigya_makeblog_linksubform' );
add_action( 'wp_ajax_nopriv_gigya_makeblog_linksubform', 'gigya_makeblog_linksubform' );

add_action( 'wp_ajax_gigya_makeblog_articleform', 'gigya_makeblog_articleform' );
add_action( 'wp_ajax_nopriv_gigya_makeblog_articleform', 'gigya_makeblog_articleform' );

add_action('wp_ajax_gigya_makeblog_register', 'gigya_makeblog_register');
add_action('wp_ajax_nopriv_gigya_makeblog_register', 'gigya_makeblog_register');

add_action('wp_ajax_gigya_makeblog_update', 'gigya_makeblog_update');
add_action('wp_ajax_nopriv_gigya_makeblog_update', 'gigya_makeblog_update');

add_action('wp_ajax_esp_test', 'esp_test');
add_action('wp_ajax_nopriv_esp_test', 'esp_test');

add_action( 'fu_after_upload', function( $attachment_ids ) {

	$reversed = array_reverse( $attachment_ids );
	$post_id = intval( $_POST['post_ID'] );

	foreach ($reversed as $index => $attach_id) {
		$meta_key = $index < count($reversed) ? 'attached_image_' . $index : 'attached_image';
		makeblog_update_post_meta( $post_id, $meta_key, $attach_id );
		makeblog_update_post_meta( $post_id, '_thumbnail_id', $attach_id );
	}

	wp_redirect( home_url( '/submission' ) );

	exit;

} );


function gigya_makeblog_update_post_meta( $post_id, $field_name, $value = '' ) {

	if ( empty( $value ) OR ! $value ) {

		delete_post_meta( $post_id, $field_name );

	} elseif ( ! get_post_meta( $post_id, $field_name ) ) {

		add_post_meta( $post_id, $field_name, $value );

	} else {

		update_post_meta( $post_id, $field_name, $value );

	}

}

function gigya_makeblog_page2form (){

	if( check_admin_referer('page2form_submit','page2form_subform') ){

		// Sanitize User Input
		$post_content = wp_filter_post_kses($_POST['page2_content']);
		$post_title = sanitize_text_field($_POST['page2_title']);
		$post_link = esc_url_raw($_POST['page2_link']);

		if( !is_user_logged_in() ) {

			$post_author = sanitize_text_field($_POST['page2_author']);		
			$post_author_email = is_email( $_POST['page2_email'] ) !== false ? $_POST['page2_email'] : false;
			$post_author_website =  esc_url_raw($_POST['page2_website']);
			$post_author_bio =  wp_filter_post_kses($_POST['page2_bio']);
			$post_author_id = 604631; // id of page 2

		} else {

			$user = wp_get_current_user();
			$post_author = $user->display_name;
			$post_author_email = $user->user_email;
			$post_author_website = $user->user_url;
			$post_author_bio = get_the_author_meta( 'description', $user->ID); 

		}

		$post = array(
			'post_content' => $post_content, //The full text of the post.
			'post_title' => $post_title, //The title of your post.
			'post_author' => $post_author_id,
			'post_status' => 'publish',
			'post_type' => 'guest-author'
		); 
		
		$make_post_id = wp_insert_post( $post );
		
		makeblog_update_post_meta( $make_post_id, 'author',  $post_author );
		makeblog_update_post_meta( $make_post_id, 'author_email',  $post_author_email );
		makeblog_update_post_meta( $make_post_id, 'author_website', $post_author_website );
		makeblog_update_post_meta( $make_post_id, 'author_bio',  $post_author_bio );
		makeblog_update_post_meta( $make_post_id, 'link', $post_link );

		echo $make_post_id;

		$email = array('jspurlock@oreilly.com','gareth@oreilly.com', 'sholbrook@oreilly.com');

		$page2_title = "Page2 Submission: " . $post_title;

		$page2_content = '<html><body>';
		$page2_content .= '<p>A summary of the content in the form you just submitted to MAKE.</p>';
		$page2_content .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$page2_content .= "<tr style='background: #eee;'><td><strong>Page2 Submission</strong> </td><td></td></tr>";
		$page2_content .= "<tr><td><strong>Title:</strong> </td><td>" . $post_title . "</td></tr>";		
		$page2_content .= "<tr><td><strong>Content:</strong> </td><td>" . $post_content . "</td></tr>";
		$page2_content .= "<tr><td><strong>URL:</strong> </td><td>" . $post_link . "</td></tr>";
		$page2_content .= "<tr><td><strong>Author Name:</strong> </td><td>" . $post_author . "</td></tr>";
		$page2_content .= "<tr><td><strong>Author Email:</strong> </td><td>" . $post_author_email . "</td></tr>";
		$page2_content .= "<tr><td><strong>Author Website:</strong> </td><td>" . $post_author_website . "</td></tr>";
		$page2_content .= "<tr><td><strong>Author Bio:</strong> </td><td>" . $post_author_bio . "</td></tr>";
		$page2_content .= "</table>";
		$page2_content .= "</body></html>";

		$headers = array( 'From: ' . $post_author .  ' <' . $post_author_email . '>'.  "\r\n" , 'Content-Type:text/html; charset=UTF-8' );

		wp_mail($email, $page2_title, $page2_content, $headers);

		if( $post_author_email !== false )
			wp_mail($post_author_email, $page2_title, $page2_content, $headers[1]);

	} 

	exit;

}


function gigya_makeblog_linksubform () {

	if( check_admin_referer('linksubform_submit','linksubform_subform') ){

		$link_title = sanitize_text_field($_POST['linksub_title']);
		$link_content =  wp_filter_post_kses($_POST['linksub_content']);
		$link_link = esc_url_raw($_POST['linksub_link']);

		if( !is_user_logged_in() ) {

			$link_name = sanitize_text_field( $_POST['linksub_name'] );
			$link_email = is_email( $_POST['linksub_email'] ) !== false ? $_POST['linksub_email'] : false;
			$link_website =  esc_url_raw($_POST['linksub_website']);
			$link_bio =  wp_filter_post_kses($_POST['linksub_bio']);

		} else {

			$user = wp_get_current_user();
			$link_name = $user->display_name;
			$link_email = $user->user_email;
			$link_website = $user->user_url;
			$link_bio = get_the_author_meta( 'description', $user->ID); 
			
		}

		$email = 'onlineeditors@makezine.com';

		$link_title = "User Link Submission: " . $link_title;

		$link_email_content  = '<html><body>';
		$link_email_content .= '<p>A summary of the content in the form you just submitted to MAKE.</p>';
		$link_email_content .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$link_email_content .= "<tr style='background: #eee;'><td><strong>User Link Submission</strong></td><td></td></tr>";
		$link_email_content .= "<tr><td><strong>Title:</strong> </td><td>" . $link_title . "</td></tr>";
		$link_email_content .= "<tr><td><strong>Content:</strong> </td><td>" . $link_content . "</td></tr>";
		$link_email_content .= "<tr><td><strong>URL:</strong> </td><td>" . $link_link . "</td></tr>";
		$link_email_content .= "<tr><td><strong>Author Name:</strong> </td><td>" . $link_name . "</td></tr>";
		$link_email_content .= "<tr><td><strong>Author Email:</strong> </td><td>" . $link_email . "</td></tr>";
		$link_email_content .= "<tr><td><strong>Author Website:</strong> </td><td>" . $link_website . "</td></tr>";
		$link_email_content .= "<tr><td><strong>Author Bio:</strong> </td><td>" . $link_bio . "</td></tr>";
		$link_email_content .= "</table>";
		$link_email_content .= "</body></html>";

		$headers = array( 'From: ' . $link_name .  ' <' . $link_email . '>'.  "\r\n" , 'Content-Type:text/html; charset=UTF-8' );

		wp_mail($email, $link_title, $link_email_content, $headers);

		if( $link_email !== false )
			wp_mail($link_email, $link_title, $link_email_content, $headers[1]);

	}

	exit;

}

function gigya_makeblog_articleform (){

	if( check_admin_referer('articleform_submit','articleform_subform') ){

		$article_title  = wp_filter_post_kses($_POST['article_title']);
		$article_mail  = sanitize_text_field($_POST['article_mail']);
		$article_city  = sanitize_text_field($_POST['article_city']);
		$article_state  = sanitize_text_field($_POST['article_state']);
		$article_zip = sanitize_text_field($_POST['article_zip']);
		$article_country  = sanitize_text_field($_POST['article_country']);
		$article_phone  = sanitize_text_field($_POST['article_phone']);
		$article_pitch  = sanitize_text_field($_POST['article_pitch']);
		$article_built  = sanitize_text_field($_POST['article_built']);
		$article_photo  = sanitize_text_field($_POST['article_photo']);
		$article_photo_url  = sanitize_text_field($_POST['article_photo_url']);
		$article_working  = sanitize_text_field($_POST['article_working']);
		$article_video_url  = esc_url_raw($_POST['article_video_url']);
		$article_writeup_url  = esc_url_raw($_POST['article_writeup_url']) ;
		$article_description  = wp_filter_post_kses($_POST['article_description']);
		$article_wordcount  = sanitize_text_field($_POST['article_wordcount']);


		if( !is_user_logged_in() ) {

			$article_name  = sanitize_text_field($_POST['article_name']);
			$article_email = is_email( $_POST['article_email'] ) !== false ? $_POST['article_email'] : false;
			$article_website =  esc_url_raw($_POST['article_website']);
			$article_bio  = wp_filter_post_kses($_POST['article_bio']);

		} else {

			$user = wp_get_current_user();
			$article_name = $user->display_name;
			$article_email = $user->user_email;
			$article_website = $user->user_url;
			$article_bio = get_the_author_meta( 'description', $user->ID); 

		}

		$email = 'editors@makezine.com';

		$article_title = "User Article Submission: " . sanitize_text_field($_POST['linksub_title']);

		$article_content = '<html><body>';
		$article_content .= '<p>A summary of the content in the form you just submitted to MAKE.</p>';
		$article_content .= '<table rules="all" style="border-color: #666;border:1px solid;" cellpadding="10">';
		$article_content .= "<tr style='background: #eee;'><td><strong>User Article Submission</strong> </td><td></td></tr>";
		$article_content .= "<tr><td><strong>Article Title:</strong> </td><td>" . $article_title . "</td></tr>";
		$article_content .= "<tr><td><strong>Name:</strong> </td><td>" . $article_name. "</td></tr>";
		$article_content .= "<tr><td><strong>Email:</strong> </td><td>" . $article_email . "</td></tr>";
		$article_content .= "<tr><td><strong>Mailing Address:</strong> </td><td>" . $article_mail . "</td></tr>";
		$article_content .= "<tr><td><strong>City:</strong> </td><td>" . $article_city . "</td></tr>";
		$article_content .= "<tr><td><strong>State:</strong> </td><td>" . $article_state . "</td></tr>";
		$article_content .= "<tr><td><strong>Zip:</strong> </td><td>" . $article_zip . "</td></tr>";
		$article_content .= "<tr><td><strong>Country:</strong> </td><td>" . $article_country. "</td></tr>";
		$article_content .= "<tr><td><strong>Phone:</strong> </td><td>" . $article_phone . "</td></tr>";
		$article_content .= "<tr><td><strong>Bio:</strong> </td><td>" . $article_bio . "</td></tr>";
		$article_content .= "<tr><td><strong>Website:</strong> </td><td>" . $article_website . "</td></tr>";
		$article_content .= "<tr><td><strong>Article Pitch:</strong> </td><td>" . $article_pitch . "</td></tr>";
		$article_content .= "<tr><td><strong>Project Built?:</strong> </td><td>" . $article_built . "</td></tr>";
		$article_content .= "<tr><td><strong>Project Photos?:</strong> </td><td>" . $article_photo . "</td></tr>";
		$article_content .= "<tr><td><strong>Project Photo URL:</strong> </td><td>" . $article_photo_url . "</td></tr>";
		$article_content .= "<tr><td><strong>Video of Project Working?:</strong> </td><td>" . $article_working . "</td></tr>";
		$article_content .= "<tr><td><strong>Video URL:</strong> </td><td>" . $article_video_url . "</td></tr>";
		$article_content .= "<tr><td><strong>Write-up URL:</strong> </td><td>" . $article_writeup_url. "</td></tr>";
		$article_content .= "<tr><td><strong>Article Description:</strong> </td><td>" . $article_description . "</td></tr>";
		$article_content .= "<tr><td><strong>Word Count:</strong> </td><td>" . $article_wordcount . "</td></tr>";
		$article_content .= "</table>";
		$article_content .= "</body></html>";
		$article_content = stripslashes($article_content);

		$headers = array( 'From: ' . $article_name .  ' <' . $article_email . '>'.  "\r\n" , 'Content-Type:text/html; charset=UTF-8' );

		wp_mail($email, $article_title, $article_content, $headers);

		if( $article_email !== false )
			wp_mail($article_email, $article_title, $article_content, $headers[1]);

	}

	exit;

}

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
	$isValid = SigUtils::validateUserSignature($uid, $tstamp, getGigyaSecretKey(), $sig);

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
		$url = "https://socialize-api.gigya.com/socialize.setUID?apiKey=".rawurlencode(getGigyaAPIKey())."&secret=".rawurlencode(getGigyaSecretKey())."&format=json&UID=".$uid."&siteUID=".$make_post_id;
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
	
function get_esp_api_url($srv,$req) {
	// https://www.pubservice.com/wsrvc/Listener<##>.asmx/<SERVICE NAME>?CUID=<CUID>&CPWD=<CPWD>&REQ=<Request in XML format>
	
	$base  = getESPBaseURL();
	$esp   = getESPAccount();
	$lisnr = getESPListener($srv);

	$url = $base . '/wsrvc/Listener' . $lisnr . '.asmx/' . $srv . '?CUID=' . $esp->cuid . '&CPWD=' . rawurlencode($esp->cpwd) . '&REQ=' . $req;
	
	return $url;
}

function get_esp_xml($srv,$ary) {
	$string = "";
	foreach($ary as $k=>$v) {
		$string .= '<'.$k.'>'.$v.'</'.$k.'>';
	}
	
	$body =  '<?xml version="1.0" encoding="utf-8" ?>'
			.'<'.$srv.'request>'
			.$string
			.'</'.$srv.'request>';

	return $xml;
}

function esp_test() {
	
	$payload = $_POST;
	$response = array();
	$response['complete'] = false;
	
	$pubcode = getESPPubCode();
	$uid = "";
	$upwd = "";
	$params = array(
		 "pubcode" => $pubcode
		,"uid"     => $uid
		,"upwd"    => $upwd
	);
	
	$xmlreq = get_esp_xml( "ws1000",$params);
	$url    = get_esp_api_url("ws1000",$xmlreq);
	
	$xmlresp = wpcom_vip_file_get_contents( $url );
	
	$simpleXmlElem = simplexml_load_string( $xmlresp );
	
	if ( ! $simpleXmlElem ) {
		$response['error'] = "ESP API";
	} else {
		$json = XML2JSON( $xmlresp );
		$response['xml']  = $xmlresp;
		$response['json'] = $json;
		$response['complete'] = true;
	}
	
	//return AJAX response
	header( "Content-Type: application/json" );
	echo json_encode($response);

	exit;

}

?>