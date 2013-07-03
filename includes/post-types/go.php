<?php

function go_init() {
	register_post_type( 'go', array(
		'hierarchical'        => false,
		'public'              => true,
		'show_in_nav_menus'   => true,
		'show_ui'             => true,
		'supports'            => array( 'title' ),
		'has_archive'         => true,
		'query_var'           => true,
		'rewrite'             => true,
		'menu_position' 	  => 45,
		'labels'              => array(
			'name'                => __( 'Go Links', 'make' ),
			'singular_name'       => __( 'Go Link', 'make' ),
			'add_new'             => __( 'Add new go link', 'make' ),
			'all_items'           => __( 'Go Links', 'make' ),
			'add_new_item'        => __( 'Add new go link', 'make' ),
			'edit_item'           => __( 'Edit go link', 'make' ),
			'new_item'            => __( 'New go link', 'make' ),
			'view_item'           => __( 'View go links', 'make' ),
			'search_items'        => __( 'Search go links', 'make' ),
			'not_found'           => __( 'No go links found', 'make' ),
			'not_found_in_trash'  => __( 'No go links found in trash', 'make' ),
			'parent_item_colon'   => __( 'Parent go link', 'make' ),
			'menu_name'           => __( 'Go Links', 'make' ),
		),
	) );

}
add_action( 'init', 'go_init' );

function go_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['go'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Go updated. <a target="_blank" href="%s">View go</a>', 'make'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'make'),
		3 => __('Custom field deleted.', 'make'),
		4 => __('Go updated.', 'make'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Go restored to revision from %s', 'make'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Go published. <a href="%s">View go</a>', 'make'), esc_url( $permalink ) ),
		7 => __('Go saved.', 'make'),
		8 => sprintf( __('Go submitted. <a target="_blank" href="%s">Preview go</a>', 'make'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Go scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview go</a>', 'make'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Go draft updated. <a target="_blank" href="%s">Preview go</a>', 'make'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'go_updated_messages' );

$field_data = array (
	'advanced_testgroup' => array (
		'fields' => array(
			'url'				=> array(),
			'bitly_url'			=> array(),

	),
	'title'		=> 'URL',
	'context'	=> 'advanced',
	'pages'		=> array( 'go' ),
	),
);

$easy_cf = new Easy_CF($field_data);