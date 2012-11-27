<?php

add_action( 'init', 'register_cpt_article' );

function register_cpt_article() {

	add_rewrite_rule( 'magazine/([^/]*)/([^/]*)/?$','index.php?magazine=$matches[2]','top' );

	$labels = array( 
		'name' => _x( 'Articles', 'article' ),
		'singular_name' => _x( 'Article', 'article' ),
		'add_new' => _x( 'Add New', 'article' ),
		'add_new_item' => _x( 'Add New Article', 'article' ),
		'edit_item' => _x( 'Edit Article', 'article' ),
		'new_item' => _x( 'New Article', 'article' ),
		'view_item' => _x( 'View Article', 'article' ),
		'search_items' => _x( 'Search Articles', 'article' ),
		'not_found' => _x( 'No articles found', 'article' ),
		'not_found_in_trash' => _x( 'No articles found in Trash', 'article' ),
		'parent_item_colon' => _x( 'Parent Article:', 'article' ),
		'menu_name' => _x( 'Articles', 'article' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'MAKE magazine articles will be stored here. Goal is to build the back archive of all issues and articles.',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array( 'category', 'post_tag', 'page-category', 'maker', 'location' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);

	register_post_type( 'magazine', $args );
}

add_action( 'init', 'volume_register_cpt_article' );

function volume_register_cpt_article() {

	$labels = array( 
		'name' => _x( 'Volumes', 'volume' ),
		'singular_name' => _x( 'Volume', 'volume' ),
		'add_new' => _x( 'Add New', 'volume' ),
		'add_new_item' => _x( 'Add New Volume', 'volume' ),
		'edit_item' => _x( 'Edit Volume', 'volume' ),
		'new_item' => _x( 'New Volume', 'volume' ),
		'view_item' => _x( 'View Volume', 'volume' ),
		'search_items' => _x( 'Search Volumes', 'volume' ),
		'not_found' => _x( 'No volumes found', 'volume' ),
		'not_found_in_trash' => _x( 'No volumes found in Trash', 'volume' ),
		'parent_item_colon' => _x( 'Parent Volume:', 'volume' ),
		'menu_name' => _x( 'Volumes', 'volume' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'MAKE magazine articles will be stored here. Goal is to build the back archive of all issues and articles.',
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);

	register_post_type( 'volume', $args );
}

$field_data = array (
	'advanced_testgroup' => array (				// unique group id
		'fields' => array(						// array "fields" with field definitions 
			'Hed'		=> array(),				// Custom Validator (see Ref: validator)
			'Dek'		=> array(),				// Custom Validator (see Ref: validator)
			'PullQuotes'	=> array(),			// A descriptive hint for the field
	),
	'title'		=> 'Magazine Meta',			// Group Title
	'context'	=> 'side',					// context as in http://codex.wordpress.org/Function_Reference/add_meta_box
	'pages'		=> array( 'magazine' ),		// pages as in http://codex.wordpress.org/Function_Reference/add_meta_box
	),
);

$easy_cf = new Easy_CF($field_data);


function make_magazine_toc($posttype = 'magazine', $title = 'Articles') {
	global $post;
	$args = array(
		'post_parent' => $post->ID,
		'no_found_rows' => true,
		'post_type' => $posttype,
		'posts_per_page'=>-1,
		'orderby' => 'name',
		'order' => 'asc'
	);
	
	$the_query = new WP_Query( $args );

	// Need a way to filter out the title if there are no results in the query.
	if($post->post_parent == 0 && !empty($the_query->posts) ) {
		echo '<h3>'. $title .'</h3>';
		//print_r($the_query);
	}

	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<article <?php post_class(); ?>>

			<div class="cat-thumb">

				<?php get_the_image( array( 'image_scan' => true, 'size' => 'archive-thumb' ) ); ?>

			</div>

			<div class="cat-blurb">

				<h3><a class="red" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>

				<p class="meta">By <?php the_author_posts_link(); ?>, <?php the_time('Y/m/d \@ g:i a') ?></p>
				<p>Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?> <?php edit_post_link('Fix me...', ' | '); ?></p>

			</div>

			<div class="clear"></div>
			
			<hr />

		</article> 

	<?php endwhile;

	// Reset Post Data
	wp_reset_postdata();

}


add_action('add_meta_boxes', 'make_add_meta_box');

function make_add_meta_box() { 
	add_meta_box('volume-parent', 'Magazine Volume', 'make_magazine_parent_page', 'magazine', 'side', 'high');
}

add_action( 'admin_menu', 'make_remove_parent_meta_box' );

function make_remove_parent_meta_box() { 
	remove_meta_box('pageparentdiv', 'magazine', 'normal');
}


function make_magazine_parent_page($post) {
	$post_type_object = get_post_type_object($post->post_type);
	if ( $post_type_object->hierarchical ) {
		$pages = wp_dropdown_pages(array('post_type' => 'volume', 'selected' => $post->post_parent, 'name' => 'parent_id', 'show_option_none' => __('(no parent)'), 'sort_column'=> 'menu_order, post_title', 'echo' => 0));
		if ( ! empty($pages) ) {
			echo $pages;
		} // end empty pages check
	} // end hierarchical check.
}

add_action( 'init', 'register_taxonomy_section' );

function register_taxonomy_section() {

	$labels = array( 
		'name' => _x( 'Section', 'section' ),
		'singular_name' => _x( 'Section', 'section' ),
		'search_items' => _x( 'Search Sections', 'section' ),
		'popular_items' => _x( 'Popular Sections', 'section' ),
		'all_items' => _x( 'All Sections', 'section' ),
		'parent_item' => _x( 'Parent Section', 'section' ),
		'parent_item_colon' => _x( 'Parent Section:', 'section' ),
		'edit_item' => _x( 'Edit Section', 'section' ),
		'update_item' => _x( 'Update Section', 'section' ),
		'add_new_item' => _x( 'Add New Section', 'section' ),
		'new_item_name' => _x( 'New Section', 'section' ),
		'separate_items_with_commas' => _x( 'Separate section with commas', 'section' ),
		'add_or_remove_items' => _x( 'Add or remove section', 'section' ),
		'choose_from_most_used' => _x( 'Choose from the most used section', 'section' ),
		'menu_name' => _x( 'Sections', 'section' ),
	);

	$args = array( 
		'labels' => $labels,
		'public' => true,
		'show_in_nav_menus' => true,
		'show_ui' => true,
		'show_tagcloud' => true,
		'hierarchical' => true,
		'rewrite' => true,
		'query_var' => true
	);

	register_taxonomy( 'section', array('magazine'), $args );
}

$field_data = array (
	'advanced_testgroup' => array (
		'fields' => array(
			'FeaturedPosts' => array(),
			'VideoURL' => array(),
		),
		'title'		=> 'Magazine Volume Setup',
		'context'	=> 'side',
		'pages'		=> array( 'volume' ),
	),
);

$easy_cf = new Easy_CF($field_data);