<?php

function getGigyaAPIKey() {
//	return '3_L_MW5BjUW-9SCHSxto-985_WeNNnpeLOtohnGzJaYe7Xs-3cuj_HuYFurMq24jti'; //prod *.makezine.com
	return '3_nUMOBEBpLoLnfNUbwAo9FCwTqzd6vTjpVt3Ojd807EIT5IcF94eM9hoV8vcqjoe8'; //dev *.smrtdsgn.com
}

function getGigyaSecretKey() {
	return 'GlvZcbxIY6Oy7lnWJheh56DXj3wKAiG3yVqhv++VLZM='; //both dev and prod
}

function getESPBaseURL() {
//	return 'https://www.pubservice.com'; //prod
	return 'https://espdev.espcomp.net'; //dev
}

function getESPPubCode() {
	return 'MK';
}

function getESPAccount() {
	$esp = array(
		 'cuid' => '123'
		,'cpwd' => 'pwd'
	);
	
	return (object) $esp;
}

?>