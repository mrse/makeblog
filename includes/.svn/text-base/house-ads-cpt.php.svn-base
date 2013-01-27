<?php

add_action( 'init', 'register_cpt_house_ads' );

function register_cpt_house_ads() {

	$labels = array( 
		'name' => _x( 'House Ads', 'craft' ),
		'singular_name' => _x( 'House Ad', 'craft' ),
		'add_new' => _x( 'Add New', 'craft' ),
		'add_new_item' => _x( 'Add New House Ad', 'craft' ),
		'edit_item' => _x( 'House Ad', 'craft' ),
		'new_item' => _x( 'New House Ad', 'craft' ),
		'view_item' => _x( 'View House Ads', 'craft' ),
		'search_items' => _x( 'Search House Ads', 'craft' ),
		'not_found' => _x( 'No House Ads found', 'craft' ),
		'not_found_in_trash' => _x( 'No House Ads found in Trash', 'craft' ),
		'parent_item_colon' => _x( 'Parent Craft:', 'craft' ),
		'menu_name' => _x( 'House Ads', 'craft' ),
	);

	$args = array( 
		'labels' => $labels,
		'supports' => array( 'title', 'thumbnail'  ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'publicly_queryable' => false,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post',
	);

	register_post_type( 'house-ads', $args );
}

$field_data = array (
	'advanced_testgroup' => array (
		'fields' => array(
			'LinkURL' => array(),
	),
	'title'		=> 'House Ad Meta',
	'context'	=> 'side',
	'pages'		=> array( 'house-ads' ),
	),
);

$easy_cf = new Easy_CF($field_data);