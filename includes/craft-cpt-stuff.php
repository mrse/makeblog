<?php

$field_data = array (
	'RSS' => array (
		'fields' => array(
			'rss' => array(
				'type' => 'toggle'
				),
		),
	'title'		=> 'RSS Feed of MAKE',
	'context'	=> 'side',
	'pages'		=> array( 'craft' ),
	),
);

$easy_cf = new Easy_CF($field_data);