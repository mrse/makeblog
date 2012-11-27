<?php 

add_action( 'init', 'make_register_cpt_slideshow' );

function make_register_cpt_slideshow() {

	$labels = array( 
		'name' => _x( 'Slideshows', 'slideshow' ),
		'singular_name' => _x( 'Slideshow', 'slideshow' ),
		'add_new' => _x( 'Add New', 'slideshow' ),
		'add_new_item' => _x( 'Add New Slideshow', 'slideshow' ),
		'edit_item' => _x( 'Edit Slideshow', 'slideshow' ),
		'new_item' => _x( 'New Slideshow', 'slideshow' ),
		'view_item' => _x( 'View Slideshow', 'slideshow' ),
		'search_items' => _x( 'Search Slideshows', 'slideshow' ),
		'not_found' => _x( 'No slideshows found', 'slideshow' ),
		'not_found_in_trash' => _x( 'No slideshows found in Trash', 'slideshow' ),
		'parent_item_colon' => _x( 'Parent Slideshow:', 'slideshow' ),
		'menu_name' => _x( 'Slideshows', 'slideshow' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);

	register_post_type( 'slideshow', $args );
}


add_filter( 'the_content', 'slideshow_content_filter', 5 );

function slideshow_content_filter( $content ) {

	if ( 'slideshow' == get_post_type() ) {

		$other_args = array(
			'before'			=> '<div class="clear"></div><p class="self"> ',
			'after'				=> ' ' . make_vapp_the_link('View All', '') . '</p>',
			'link_before'		=> '<span class="badge">',
			'link_after'		=> '</span>',
			'next_or_number'	=> 'number',
			'pagelink'			=> '%',
			'echo'				=> 0
		);
		$args = array(
			'before'			=> '<div id="nav-buttons">',
			'after'				=> '</div>',
			'link_before'		=> '',
			'link_after'		=> '',
			'next_or_number'	=> 'next',
			'nextpagelink'		=> __('<span class="carousel-control new next" style="font-size:60px;">&rsaquo;</span>'),
			'previouspagelink'	=> __('<span class="carousel-control new prev" style="font-size:60px;">&lsaquo;</span>'),
			'pagelink'			=> '%',
			'echo'				=> 0
		);
		$content = wp_link_pages($other_args).wp_link_pages($args).$content;
		return $content;
	} else {
		return $content;
	}
}

function make_slideshow_hotkeys() {
	if ( ('slideshow' ) == get_post_type() ) {
		wp_enqueue_script(
			'hotkeys',
			get_template_directory_uri() . '/js/jquery.hotkeys.js',
			array('jquery')
		);
	}
	
}
add_action('wp_enqueue_scripts', 'make_slideshow_hotkeys');

function make_slidehow_embed( $atts ) {
	extract( shortcode_atts( array(
		'slug' => 'makes-3d-print-shop-weekend/',
		'title' => 'Modal Header',
		'link' => 'Lauch Slideshow'
	), $atts ) );

	if (jetpack_is_mobile() || is_feed()) {
		return $content. '<p><a href="'.esc_url( 'http://blog.makezine.com/slideshow/' . $slug .'/' ).'" taget="_blank" class="btn btn-primary">View Slideshow</a></p>';
	} else {
		return '<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">'.esc_html($link). '</a>
			<div class="modal hide slideshow" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">'.esc_html($title).'</h3>
				</div>
				<div class="modal-body">
					<iframe width="940" height="600" frameborder=0 src="'.esc_url( 'http://blog.makezine.com/slideshow/' . $slug .'/' ).'"></iframe>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
			</div>';
	}
}
add_shortcode( 'make_slideshow', 'make_slidehow_embed' );

function make_add_slideshow_endpoint() {
	add_rewrite_endpoint( 'embed', EP_PERMALINK | EP_PAGES );
}
//add_action( 'init', 'make_add_slideshow_endpoint' );


function make_embed_template_redirect() {
	global $wp_query;

	// if this is not a request for embed or a singular object then bail
	if ( ! isset( $wp_query->query_vars['embed'] ) || ! is_singular() )
		return;

	// include custom template
	include dirname( __FILE__ ) . '/single-slideshow-embed.php';
	exit;
}
//add_action( 'template_redirect', 'make_embed_template_redirect' );

//add_rewrite_rule( 'slideshow/([^/]+)/([0-9]+)/embed(/(.*))?/?$','index.php?slideshow=$matches[1]&embed=$matches[3]&pagename=$matches[2]','top' );


function make_bs_slideshow() {
	global $post;
	$images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	$output = '<div id="myCarousel" class="carousel slide"><div class="carousel-inner">';

	$i = 0;
	foreach( $images as $image ) {
		$i++;
		if ($i == 1) {
			$output .= '<div class="item active">';	
		} else {
			$output .= '<div class="item">';
		}
		
		$output .= wp_get_attachment_image( $image->ID, 'medium');
		$output .= '</div>';
		
	} //foreach
	$output .= '</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	</div>';
	$output .= '
		<script>
			jQuery(".carousel").carousel();
		</script>
	';

	return $output;
}