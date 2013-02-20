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

	$post_args = array(
		'before'			=> '<div class="clear"></div><p class="self"><h4>Pages:</h4>',
		'after'				=> '</p>',
		'link_before'		=> '<span class="badge">',
		'link_after'		=> '</span>',
		'next_or_number'	=> 'number',
		'pagelink'			=> '%',
		'echo'				=> 0
	);

	$other_args = array(
		'before'			=> '<div class="clear"></div><p class="self"> ',
		'after'				=> '</p>',
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

	if ( 'slideshow' == get_post_type() ) {
		$content = wp_link_pages($other_args).wp_link_pages($args).$content/*.make_vapp_the_link('View All Slides', 'self')*/;
		return $content;
	} elseif ( 'post' == get_post_type() ) {
		$content = $content.wp_link_pages( $post_args );
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

	$output = '<div id="myCarousel" class="carousel slide" data-interval=""><div class="carousel-inner">';
	$i = 0;
	foreach( $images as $image ) {
		$i++;
		if ($i == 1) {
			$output .= '<div class="item active">';	
		} else {
			$output .= '<div class="item">';
		}
		$output .= wp_get_attachment_image( $image->ID, 'medium');
		if (isset($image->post_title)) {
			$output .= '<div class="carousel-caption">';
			$output .= '<h4>' . $image->post_title . '</h4>';
			if (isset($image->post_excerpt)) {
				$output .= '<p>' . $image->post_excerpt . '</p>';
			}
			$output .= '</div>';
			
		}
		$output .= '</div>';
		
	} //foreach
	$output .= '</div>
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
	</div>';
	$output .= '<p class="pull-right"><span class="viewall" style="cursor:pointer">View All</span></p>';
	$output .= '
		<script>
			jQuery(document).ready(function(){
				jQuery(".viewall").click(function() {
					jQuery(".carousel-inner").removeClass("carousel-inner");
					googletag.pubads().refresh();
					_gaq.push([\'_trackPageview\']);
					console.log(\'Pushed a pageview, and an ad refresh, like a boss.\');
				})
			});
		</script>
	';
	return $output;
}

add_shortcode( 'bs_slideshow', 'make_bs_slideshow' );

function make_get_arg_title( $args, $title ) {
	$output = null;
	if ( $title == true ) {
		$view = $args['title'];
	} else {
		$view = 'View All';
	}
	if ( $args['all'] == false ) {
		$output = null;
	} elseif (isset($args['tag'])) {
		$output .= '<a href="' . esc_url( get_term_link( $args['tag'], 'post_tag' ) ) . '">' . $view . '</a>';
	} elseif ( isset( $args['category__in'] ) && ($args['category__in'] > 0 )  ) {
		$output .= '<a href="' . esc_url( get_term_link( intval( $args['category__in'] ), 'category' ) ) . '">' . $view . '</a>';
	} else {
		$output .= $view;
	}
	return $output;
}

function make_carousel( $args ) {

	$defaults = array(
		'category__in'		=> 0, 				// Likely the queried object ID
		'posts_per_page'	=> 8,				// Need to have this divisable by 8, ideally.
		'no_found_rows'		=> true,			// Helps to keep the query fast.
		'title'				=> 'New Posts!',	//To be change, immediately.
		'post_type'			=> 'post',
		'all'				=> null,
		'limit'				=> 4,
		'projects_landing'	=> false,
		'post_type'			=> array( 
								'post', 
								'magazine', 
								'video', 
								'projects',
								'review' )
	);

	$args = wp_parse_args( $args, $defaults );

	$rand = mt_rand(0, 100);
	$id = 'newcarousel' . $rand;

	$the_query = new WP_Query( $args );

	if ( $the_query->post_count == 0 ) {
		return;
	}

	?>

<div class="row-fluid">
	<div class="span10">
		<h3 class="heading">
			<?php echo make_get_arg_title( $args, true ); ?>
		</h3>
	</div>
	<div class="span2">
		<p class="pull-right"><a href="#" class="all"><?php echo make_get_arg_title( $args, false ); ?></p>
	</div>
</div>

<div id="<?php echo $id ?>" class="carousel slide" data-interval="false">
	<div class="carousel-inner">
	
		<?php

			$arrays = array_chunk( $the_query->posts, $args['limit'], true );

			foreach( $arrays as $idx => $posts) {
				
				if ( $idx == 0 ) {
					echo '<div class="item active">';	
				} else {
					echo '<div class="item">';
				}
				echo '<div class="row">';
					foreach ($posts as $post) {
						$type = get_post_type( $post );
						if ($args['limit'] == 4 ) {
							echo '<div class="span3 ' . $type . '">';
							if ($type == 'video') {
								echo '<a class="" data-toggle="modal" onclick="_gaq.push([\'_trackPageview\', \'' . get_post_permalink( $post->ID ) . '\']);" href="#myModal-' . $post->ID . '">';
								echo '<span class="' . $type .'-icon"></span>';
								echo '</a>';
							} elseif ( $args['projects_landing'] == false ) {
									echo '<span class="' . $type .'-icon"></span>';
							}
							get_the_image( array( 'post_id' => $post->ID,'image_scan' => true, 'meta_key' => array( 'Image' ), 'size' => 'category-thumb-small', 'image_class' => 'hide-thumbnail' ) );
						} elseif ($args['limit'] == 2) {
							echo '<div class="span4 ' . $type . '">';
							if ($type == 'video') {
								echo '<a class="" data-toggle="modal" onclick="_gaq.push([\'_trackPageview\', \'' . get_post_permalink( $post->ID ) . '\']);" href="#myModal-' . $post->ID . '">';
								echo '<span class="' . $type .'-icon"></span>';
								echo '</a>';
							} else {
								echo '<span class="' . $type .'-icon"></span>';
							}

							get_the_image( array( 'post_id' => $post->ID,'image_scan' => true, 'meta_key' => array( 'Image' ), 'size' => 'category-thumb', 'image_class' => 'hide-thumbnail' ) );
						}
						
						if ( $args['projects_landing'] == true ) {
							echo '<div class="project-meta"><ul>';
							$time = get_post_custom_values('TimeRequired');
							if ($time[0]) {
								echo '<li>Time: <span>' . esc_html( $time[0] ) . '</span></li>';
							}
							$terms = get_the_terms( $post->ID, 'difficulty' );
							if ($terms) {
								foreach ($terms as $term) {
									echo '<li>Difficulty: <span>' . esc_html( $term->name ) . '</span></li>';
								}
							}
							echo '</ul></div>';
						}
						echo '<h4><a href="';
						echo get_permalink( $post->ID );
						echo '">';
						echo get_the_title( $post->ID );
						echo '</a></h4>';
						echo '<p>' . wp_trim_words( strip_shortcodes( $post->post_content ), 15, '...' ) . '</p>';
						echo '</div>'. "\n";
						if ($type == 'video') {
							echo '<div class="modal hide" id="myModal-' . $post->ID . '">
								<div class="modal-header">
									<a class="close" data-dismiss="modal">&times;</a>
									<h3>' . get_the_title( $post->ID ) . '</h3>
								</div>
								<div class="modal-body">';
									$link = get_post_custom_values( 'Link' , $post->ID );
									echo do_shortcode('[youtube='. esc_url( $link[0] ) .'&w=530]');
									echo apply_filters('the_content', strip_shortcodes( $post->post_content ) );
								echo '</div>
								<div class="modal-footer">
									<a href="#" class="btn" data-dismiss="modal">Close</a>
								</div>
							</div>';
						}
					}
					echo '</div>';
				echo '</div>';


			}

			// Reset Post Data
			wp_reset_postdata();

		?>
	
	</div>

	<a class="left cat-carousel-control" href="#<?php echo $id ?>" data-slide="prev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/larr.png" alt="Left"></a>
	<a class="right cat-carousel-control" href="#<?php echo $id ?>" data-slide="next"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/rarr.png" alt="Left"></a>

</div>
	
<?php }
