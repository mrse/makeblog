<?php
/**
 * Functions for the Craft Custom Post Type
 *
 * 
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 */
/**
 * Registers the Craft CPT
 */
function register_cpt_craft() {

	$labels = array( 
		'name' => _x( 'Craft Posts', 'craft' ),
		'singular_name' => _x( 'Craft Post', 'craft' ),
		'add_new' => _x( 'Add New', 'craft' ),
		'add_new_item' => _x( 'Add New Craft Post', 'craft' ),
		'edit_item' => _x( 'Edit Craft Post', 'craft' ),
		'new_item' => _x( 'New Craft Post', 'craft' ),
		'view_item' => _x( 'View Craft Post', 'craft' ),
		'search_items' => _x( 'Search Craft Posts', 'craft' ),
		'not_found' => _x( 'No Craft Posts found', 'craft' ),
		'not_found_in_trash' => _x( 'No Craft Posts found in Trash', 'craft' ),
		'parent_item_colon' => _x( 'Parent Craft:', 'craft' ),
		'menu_name' => _x( 'Craft', 'craft' ),
	);

	$args = array( 
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
		'taxonomies' => array( 'category', 'post_tag', 'page-category', 'maker', 'location' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'menu_icon' => get_stylesheet_directory_uri() .'/img/cutter.png',
	);

	register_post_type( 'craft', $args );
}
add_action( 'init', 'register_cpt_craft' );

/**
  * Easy Custom Field Info -- Soon to be depracated.
 */
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


/**
  * Crab the craft header if we are on a craft page.
 */
function make_get_header() {
	if (is_single()) {
		$primary_cat = get_the_category();
		$primary_cat = $primary_cat[0]->term_id;
	} elseif (is_category()) {
		$primary_cat = get_queried_object_id();
	} else {
		$primary_cat = null;
	}
	if ( $primary_cat == 15803 || $primary_cat == 30694999 || 'craft' == get_post_type() ) {
		get_header('craft');
	} else { 
		get_header();
	}
}