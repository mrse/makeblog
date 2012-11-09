<?php

function get_gigya_api_key() {
//	return '3_L_MW5BjUW-9SCHSxto-985_WeNNnpeLOtohnGzJaYe7Xs-3cuj_HuYFurMq24jti'; //prod *.makezine.com
	return '3_nUMOBEBpLoLnfNUbwAo9FCwTqzd6vTjpVt3Ojd807EIT5IcF94eM9hoV8vcqjoe8'; //dev *.smrtdsgn.com
}

function get_gigya_secret_key() {
	return 'GlvZcbxIY6Oy7lnWJheh56DXj3wKAiG3yVqhv++VLZM='; //both dev and prod
}

function get_esp_base_url() {
//	return 'https://www.pubservice.com'; //prod
	return 'https://espdev.espcomp.net'; //dev
}

function get_esp_pubcode() {
	return 'MK';
}

function get_esp_account() {
	$esp = array(
		 'cuid' => 'MWS' //Make Web Services
		,'cpwd' => 'fume29teal'
	);
	
	return (object) $esp;
}

?>