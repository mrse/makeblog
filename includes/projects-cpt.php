<?php

add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

	$labels = array( 
		'name' => _x( 'Projects', 'Project' ),
		'singular_name' => _x( 'Project', 'Project' ),
		'add_new' => _x( 'Add New', 'Project' ),
		'add_new_item' => _x( 'Add New Project', 'Project' ),
		'edit_item' => _x( 'Edit Project', 'Project' ),
		'new_item' => _x( 'New Project', 'Project' ),
		'view_item' => _x( 'View Project', 'Project' ),
		'search_items' => _x( 'Search Projects', 'Project' ),
		'not_found' => _x( 'No Projects found', 'Project' ),
		'not_found_in_trash' => _x( 'No Projects found in Trash', 'Project' ),
		'parent_item_colon' => _x( 'Parent Project:', 'Project' ),
		'menu_name' => _x( 'Projects', 'Project' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'MAKE magazine Projects will be stored here. Goal is to build the back archive of all issues and Projects.',
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

	register_post_type( 'projects', $args );
}

$field_data = array (
	'advanced_testgroup' => array (
		'fields' => array(
			'Description'				=> array(),
			'TimeRequired'				=> array(),
			'Difficulty'				=> array(),
			'Link'						=> array(),
			'MakeProjectsGuideNumber'	=> array(),
	),
	'title'		=> 'Projects Meta',
	'context'	=> 'side',
	'pages'		=> array( 'projects' ),
	),
);

$easy_cf = new Easy_CF($field_data);


function make_magazine_projects_toc() {
	global $post;
	$args = array(
		'post_parent' => $post->ID,
		'no_found_rows' => true,
		'post_type' => 'projects'
	);
	
	if($post->post_parent == 0) {
		echo '<h3>Projects</h3>';
	}

	$the_query = new WP_Query( $args );

	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<Project <?php post_class(); ?>>

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

		</Project> 

	<?php endwhile;

	// Reset Post Data
	wp_reset_postdata();

}


add_action('add_meta_boxes', 'make_projects_add_meta_box');

function make_projects_add_meta_box() { 
	add_meta_box('volume-parent', 'Magazine Volume', 'make_magazine_parent_page', 'projects', 'side', 'high');
}

add_action( 'admin_menu', 'make_projects_remove_parent_meta_box' );

function make_projects_remove_parent_meta_box() { 
	remove_meta_box('pageparentdiv', 'projects', 'normal');
}

function make_projects_add_review($content) {
	global $post;
	if ('projects' == get_post_type()) {
		$guide = get_post_custom_values('MakeProjectsGuideNumber');
		if (isset($guide[0])) {
			$content .= js_make_project($guide);
		}
		return $content;
	} else {
		return $content;
	}
}

add_filter( 'the_content', 'make_projects_add_review' );