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

function getESPListener($srv) {
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

?>