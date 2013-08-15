<?php
	
	/**
	 * Our Gigya API Key for makezine.com
	 * Key's are valid for testing on localhost.
	 * @return string
	 */
	function get_gigya_api_key() {

		// Makezine Dev - 
		return '3_bjlVxC0gadZ6dN9q8K1ePCbDHtATT8OgJxZJcsr0ty8o5oKnvjI_G2DOZ1YasJHF';

		// Maker Faire Production
		// return '3_nUMOBEBpLoLnfNUbwAo9FCwTqzd6vTjpVt3Ojd807EIT5IcF94eM9hoV8vcqjoe8';
	}

	/**
	 * Gigya secret key. This key is valid across both Dev and Production API Keys.
	 * @return string
	 */
	function get_gigya_secret_key() {
		return 'GlvZcbxIY6Oy7lnWJheh56DXj3wKAiG3yVqhv++VLZM=';
	}

	/**
	 * The base URL for ESP, our digital publishing service.
	 * We will want to switch URL's when testing and for prodction
	 * @return string
	 */
	function get_esp_base_url() {
		// return 'https://www.pubservice.com'; // Production
		return 'https://espdev.espcomp.net'; // Dev
	}


	function get_esp_pubcode() {
		return 'MK';
	}

	function get_esp_account() {
		$esp = array(
			'cuid' => 'MWS', // Make Web Services
			'cpwd' => 'fume29teal'
		);
		
		return (object) $esp;
	}