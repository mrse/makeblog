<?php

require_once( WP_CONTENT_DIR . '/themes/vip/plugins/vip-init.php' );

if ( function_exists( 'wpcom_vip_enable_opengraph' ) ) {
	wpcom_vip_enable_opengraph();
}

if ( function_exists( 'vip_contrib_add_upload_cap' ) ) {
	vip_contrib_add_upload_cap();
}

if ( function_exists( 'wpcom_vip_sharing_twitter_via' ) ) {
	wpcom_vip_sharing_twitter_via( 'make' );
}

wpcom_vip_load_plugin( 'breadcrumb-navxt' );
wpcom_vip_load_plugin( 'wp-help' );
wpcom_vip_load_plugin( 'recent-comments' );
wpcom_vip_load_plugin( 'easy-custom-fields' );
wpcom_vip_load_plugin( 'edit-flow' );
wpcom_vip_load_plugin( 'wp-page-numbers' );
wpcom_vip_load_plugin( 'lazy-load' );
wpcom_vip_load_plugin( 'get-the-image' );
wpcom_vip_load_plugin( 'storify' );
wpcom_vip_load_plugin( 'cheezcap' );
wpcom_vip_load_plugin( 'add-meta-tags-mod' );
wpcom_vip_load_plugin( 'wpcom-thumbnail-editor' );
wpcom_vip_load_plugin( 'wp-frontend-uploader' );
wpcom_vip_load_plugin( 'multiple-post-thumbnails' );
wpcom_vip_load_plugin( 'taxonomy-images' );
wpcom_vip_load_plugin( 'simply-show-ids' );
//wpcom_vip_load_plugin( 'wpcom-related-posts' );
wpcom_vip_load_plugin( 'view-all-posts-pages' );
wpcom_vip_load_plugin( 'co-authors-plus' );
wpcom_vip_load_plugin( 'zoninator' );


if (is_page('contribute')) {
	wpcom_vip_load_plugin( 'wp-frontend-uploader' );	
}

if ( ! jetpack_is_mobile() ) {
	wpcom_vip_load_plugin( 'facebook' );
}

/**
 * Redirects to handle legacy URL structure from old site
 */
if ( function_exists( 'vip_regex_redirects' ) ) {
	$redirects = array(
		'|/archive/([0-9]{4})/([0-9]{2})/([^/]+)\.html|' => '|/$1/$2/$3/|', // MT articles
		'|/([0-9]+)\.html$|' => '|/$1/|', // MT page structure - just redirect to postname and WordPress will resolve
		'|/archive/category/([a-zA-Z_]+)|' => '|/category/$1/|', // MT category
		'|/archive/category/([a-zA-Z_]+)/index.xml$|' => '|/category/$1/feed/', // MT category feed
		'|/archive/category/([a-zA-Z_]+)/feed|' => '|/category/$1/feed/', // Old WordPress Podcast feeds
		'|/archive/category/([a-zA-Z]+)/([0-9]+)\.html$|' => '|/category/$1/page/$2/', // MT paginated category structure
	);
	vip_regex_redirects( $redirects );
}
if ( function_exists( 'vip_redirects' ) ) {
	vip_redirects( array(
		'/index.xml'         => 'http://blog.makezine.com/feed/', // really old feeds
		'/feed/rss'          => 'http://blog.makezine.com/feed/', // really old feeds
		'/podcast'           => 'http://blog.makezine.com/video/', // Old podcast => video
		//'/home-page-include' => 'http://makezine.com/', // Old podcast => video
	) );
}

/**
 * Handle URLs with underscores in the post_name. Turn:
 *      http://blog.makezine.com/2009/01/toolbox_from_miserable_old_box_to_w/
 * into:
 *      http://blog.makezine.com/2009/01/toolbox-from-miserable-old-box-to-w/
 * We could do this with regex but the regex approach is much more gnarly
 * @see http://vip-support.automattic.com/tickets/4424
 */
if ( false !== strpos( $_SERVER['REQUEST_URI'], '_' ) )
	add_action( 'template_redirect', 'makeblog_redirect_urls_with_underscores' );
function makeblog_redirect_urls_with_underscores( ) {
	if ( !is_404() )
		return;
	$new_uri = str_replace( '_', '-', $_SERVER['REQUEST_URI'] );
	$new_url = home_url( $new_uri );
	wp_safe_redirect( $new_url );
	exit;
}

/**
 * For pre-VIP launch URLs, modify the permalink within the_content so the share buttons
 * utilitize the old URL structure. Only modify it temporarily though, and remove after finished
 */
add_filter( 'the_content', 'makeblog_add_permalink_filter' );
function makeblog_add_permalink_filter( $the_content ) {
	global $post;

	if ( $post->ID <= 171681 ) {
		add_filter( 'post_link', 'makeblog_filter_the_content_permalink', 10, 2 );
		add_filter( 'pre_get_shortlink', 'makeblog_filter_the_content_shortlink', 10, 2 );
	}
	
	return $the_content;
}
add_filter( 'the_content', 'makeblog_remove_permalink_filter', 1000 );
function makeblog_remove_permalink_filter( $the_content ) {
	
	remove_filter( 'post_link', 'makeblog_filter_the_content_permalink' );
	remove_filter( 'pre_get_shortlink', 'makeblog_filter_the_content_shortlink' );
	return $the_content;
}
function makeblog_filter_the_content_permalink( $permalink, $post ) {

	// Replace the /yyyy/mm/dd/ structure with /archive/yyyy/mm/
	$old_date_struct = date( '/Y/m/d/', strtotime( $post->post_date ) );
	$new_date_struct = date( '/Y/m/', strtotime( $post->post_date ) );
	$new_date_struct = '/archive' . $new_date_struct;
	$permalink = str_replace( $old_date_struct, $new_date_struct, $permalink );

	// Remove the trailing slash and append .html
	$permalink = rtrim( $permalink, '/' );
	$permalink .= '.html';	
	return $permalink;
}
function makeblog_filter_the_content_shortlink( $ret, $post_id ) {

	$permalink = get_permalink( $post_id );
	return $permalink;
}

vip_main_feed_redirect( 'http://feeds.feedburner.com/makezineonline' );
