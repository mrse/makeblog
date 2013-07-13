<?php

function newsletter_init() {
	register_post_type( 'newsletter', array(
		'hierarchical'			=> true,
		'public'				=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'				=> true,
		'supports'				=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'comments', 'revisions', 'page-attributes' ),
		'has_archive'			=> true,
		'query_var'				=> true,
		'rewrite'				=> true,
		'taxonomies'			=> array( 'category', 'post_tag', 'maker' ),
		'labels'				=> array(
			'name'					=> __( 'Newsletters', 'makeblog' ),
			'singular_name'			=> __( 'Newsletter', 'makeblog' ),
			'add_new'				=> __( 'Add new newsletter', 'makeblog' ),
			'all_items'				=> __( 'Newsletters', 'makeblog' ),
			'add_new_item'			=> __( 'Add new newsletter', 'makeblog' ),
			'edit_item'				=> __( 'Edit newsletter', 'makeblog' ),
			'new_item'				=> __( 'New newsletter', 'makeblog' ),
			'view_item'				=> __( 'View newsletter', 'makeblog' ),
			'search_items'			=> __( 'Search newsletters', 'makeblog' ),
			'not_found'				=> __( 'No newsletters found', 'makeblog' ),
			'not_found_in_trash'	=> __( 'No newsletters found in trash', 'makeblog' ),
			'parent_item_colon'		=> __( 'Parent newsletter', 'makeblog' ),
			'menu_name'				=> __( 'Newsletters', 'makeblog' ),
		),
	) );

}
add_action( 'init', 'newsletter_init' );

function newsletter_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['newsletter'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Newsletter updated. <a target="_blank" href="%s">View newsletter</a>', 'makeblog'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'makeblog'),
		3 => __('Custom field deleted.', 'makeblog'),
		4 => __('Newsletter updated.', 'makeblog'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Newsletter restored to revision from %s', 'makeblog'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Newsletter published. <a href="%s">View newsletter</a>', 'makeblog'), esc_url( $permalink ) ),
		7 => __('Newsletter saved.', 'makeblog'),
		8 => sprintf( __('Newsletter submitted. <a target="_blank" href="%s">Preview newsletter</a>', 'makeblog'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Newsletter scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview newsletter</a>', 'makeblog'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Newsletter draft updated. <a target="_blank" href="%s">Preview newsletter</a>', 'makeblog'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'newsletter_updated_messages' );
