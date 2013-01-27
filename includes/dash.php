<?php 


/**
 * Pulls content from the Dash API.
 *
 * @param string $type Which analytivs to return. Current options are 'realtime', 'analytics', and 'shares'.
 * @param string $hits String to preface the hit counter. If blank, nothing is added.
 * @param string $limit Integer, defaults to 5
 * @param string $size Integer, size of image to return.
 * @return string Unordered list
 */

function make_the_dash_shares_widget($type, $hits = null, $limit = 5, $size = 80) {

	$pop_posts = wp_cache_get( $type . '-dash' );
	if ( false === $pop_posts ) {
		$url = 'http://api.parsely.com/v2/'.$type.'/posts?limit=' . $limit . '&apikey=makezine.com&secret=C0RtpmzLu7lpfYSOq66jGKUesnseRPQYyNu8HBYvRMQ';
		$contents = wpcom_vip_file_get_contents( $url, 3, 900, array( 'obey_cache_control_header' => false ) );
		$json_output = json_decode($contents);
		wp_cache_set( 'pop_posts', $pop_posts );
	}

	$data = $json_output->data;

	$content = null;

	foreach ($data as $key => $item) {
		$needles = array( 'Craft Home', 'MAKE', 'Search' );
		$exclude = false;
		foreach ($needles as $needle) {
			$pos = strpos( $item->title, $needle );
			if ( $pos !== false ) {
				$exclude = true;
				break 1;
			}
		}
		if(!$exclude){

			$slideshow = '/slideshow/';
			if ($type == 'shares') {
				$url = $item->url;
			} else {
				$url = $item->link;
			}
			$rand = mt_rand();

			$pos = strpos( $url, $slideshow );

			$content .= '<div class="row-fluid item"><div class="span4">';
			//if ( $pos === 24 ) {
			//	$content .= '<a href="' . esc_url( $url ) . '"" data-target="#myModal-' . $rand . '" role="button" class="" data-toggle="modal">';
			//} else {
				$content .= '<a href="' . esc_url( $url ) . '">';
			//}

			if (isset($item->thumb_url_medium)) {
				if ( function_exists( 'wpcom_vip_get_resized_remote_image_url' ) ) {
					$content .= '<img src="' . wpcom_vip_get_resized_remote_image_url( $item->thumb_url_medium, $size, $size ) . '" class="thumbnail" alt="' . esc_attr($item->title) . '" />';
				} else {
					$content .= '<img src="' . esc_url($item->thumb_url_medium) . '" class="thumbnail" alt="' . esc_attr($item->title) . '" />';
				}
			} else {
				$content .= '<img src="http://1.gravatar.com/blavatar/dab43acfe30c0e28a023bb3b7a700440?s=70" class="thumbnail" alt="' . esc_attr($item->title) . '" />';
			}
			$content .= '</a></div><div class="span8"><h5>';
			//if ( $pos === 24 ) {
			//	$content .= '<a href="' . esc_url( $url ) . '"" data-target="#myModal-' . $rand . '" role="button" class="" data-toggle="modal">' . esc_html($item->title) . '</a>';
			//} else {
				$content .= '<a href="' . esc_url( $url ) . '">' . esc_html($item->title) . '</a>';
			//}
			$content .= '</h5><ul class="unstyled"><li>By: ' . esc_html($item->author)  . '</li>';
			if ($type == 'shares' && $hits != null) {
				$content .= '<li>'  . $hits .' <span class="badge badge-info">'.  esc_html($item->_shares) . '</span></li>';
			} elseif ($hits != null) {
				$content .= '<li>'  . $hits .' <span class="badge badge-info">'.  esc_html($item->_hits) . '</span></li>';
			}
			$content .= '</ul></div></div>';
			/*$content .= '<div class="modal hide slideshow" id="myModal-' . $rand . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">' . esc_html( $item->title ) . '</h3>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				</div>
			</div>';*/
		}
	}

	return $content;

}

function make_dash_get_the_shares( $url ) {

	$post_shares = wp_cache_get( $url . '-dash' );
	if ( false === $post_shares ) {
		$url = 'http://api.parsely.com/v2/shares/post/detail?apikey=makezine.com&url=' . urlencode( $url );
		$contents = wpcom_vip_file_get_contents( $url, 3, 900, array( 'obey_cache_control_header' => false ) );
		$json_output = json_decode($contents);
		wp_cache_set( 'post_shares', $post_shares );
	}

	if (isset($json_output->data[0])) {
		$total = $json_output->data[0]->total;
		return $total;
	} else {
		return 0;
	}

}

function make_most_commented_query() {
	$pop_query = new WP_Query( array(
		'post_type'              => 'post',
		'post_status'            => 'publish',
		'monthnum'               => date( 'n' ),
		'year'                   => date( 'Y' ),
		'orderby'                => 'comment_count',
		'posts_per_page'         => 8,
		'update_post_term_cache' => false,
		'no_found_rows'          => true,
	) );

	while ( $pop_query->have_posts() ) : $pop_query->the_post(); ?>
		<div class="row-fluid item">
			<div class="span4">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('comment-thumb', array('class' => 'thumbnail', )); ?>
				</a>
			</div>
			<div class="span8">
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<ul class="unstyled">
					<li>By: <?php the_author() ?></li>
					<li>Comments: <span class="badge badge-info"><?php comments_number( '0', '1', '%' ); ?></span></li>
				</ul>
			</div>
		</div>
	<?php endwhile; ?>

	<?php wp_reset_postdata(); ?>

<?php }
