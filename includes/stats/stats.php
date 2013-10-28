<?php
/**
 * Stats Functions
 * 
 * Moving this to the admin. The original goal, was just to make it as a private page, but Mo dropped Mjölnir on that commit...
 *
 */
function make_get_tweet_count( $url ) {
 
	$json_string = wpcom_vip_file_get_contents( 'http://urls.api.twitter.com/1/urls/count.json?url=' . $url );
	$json = json_decode( $json_string, true );
 
	return intval( $json['count'] );
}
 
function make_get_like_count( $url ) {
 
	$json_string = wpcom_vip_file_get_contents( 'http://graph.facebook.com/?ids=' . $url );
	$json = json_decode( $json_string, true );
 
	return intval( $json[$url]['shares'] );
}

function make_get_plusone_count( $url ) {
 
	$args = array(
			'method' => 'POST',
			'headers' => array(
				// setup content type to JSON
				'Content-Type' => 'application/json'
			),
			// setup POST options to Google API
			'body' => json_encode(array(
				'method' => 'pos.plusones.get',
				'id' => 'p',
				'method' => 'pos.plusones.get',
				'jsonrpc' => '2.0',
				'key' => 'p',
				'apiVersion' => 'v1',
				'params' => array(
					'nolog'=>true,
					'id'=> $url,
					'source'=>'widget',
					'userId'=>'@viewer',
					'groupId'=>'@self'
				)
			 )),
			 // disable checking SSL sertificates
			'sslverify'=>false
		);
 
	// retrieves JSON with HTTP POST method for current URL
	$json_string = wp_remote_post( "https://clients6.google.com/rpc", $args );
 
	if ( is_wp_error( $json_string ) ) {
		// return zero if response is error
		return "0";
	} else {
		$json = json_decode( $json_string['body'], true );
		// return count of Google +1 for requsted URL
		return intval( $json['result']['metadata']['globalCounts']['count'] );
	}
}

function make_social_stats() {
	if ( $_POST ) {
		$url 		= ( isset( $_POST['url'] ) ) ? esc_url( $_POST['url'] ) : '' ;
		$post_ID 	= ( isset( $_POST['post_ID'] ) ) ? intval( $_POST['post_ID'] ) : '' ;
		$num_days 	= ( isset( $_POST['num_days'] ) ) ? intval( $_POST['num_days'] ) : '' ;
		$end_date 	= ( isset( $_POST['num_days'] ) ) ? sanitize_title( $_POST['end_date'] ) : '' ;
	}
	?>
	<div class="wrap">
	
		<h1>The Social Counter!</h1>
		
		<div id="" class="postbox metabox-holder">
			<h3 class="hndle"><span>Social Stats</span></h3>
			<div class="inside">
				<div class="table table_content">
					<p class="sub">Add a URL to get stats</p>
					<form action="" method="post" class="">
						<input type="text" class="span3" placeholder="url&hellip;" name="url">
						<?php wp_nonce_field( 'make_stats_nonce', 'make_stats_nonce' ); ?>
						<button type="submit" class="btn btn info">Submit</button>
					</form>
					
					<br class="clear">
					
					<?php
			
						if ( !empty( $_POST ) && wp_verify_nonce( $_POST['make_stats_nonce'], 'make_stats_nonce' ) ) {

							echo '<table class="table table-striped table-bordered"><thead><tr><th>Site</th><th>Count</th></tr></thead><tbody>';
							echo '<tr><td>Twitter Tweets</td>';
							echo '<td>' . make_get_tweet_count( $url ) . '</td></tr>';
							echo '<tr><td>Facebook Likes</td>';
							echo '<td>' . make_get_like_count( $url ) . '</td></tr>';
							echo '<tr><td>Google Plusses</td>';
							echo '<td>' . make_get_plusone_count( $url ) . '</td></tr>';
							echo '</tbody></table>';
						}
					?>
					
					<br class="clear">
				</div>
			</div>
		</div>

		<div class="postbox metabox-holder">

			<h3 class="hndle"><span>WordPress.com Stats Counter</span></h3>
			
			<div class="inside">
				<div class="table table_content">
					<p class="sub">Add a Post ID to combined stats for the page.</p>
					<form action="" method="post" class="">
						<input type="text" class="span3" placeholder="Post ID" name="post_ID">
						<input type="text" class="span3" placeholder="Number of Days" name="num_days">
						<input type="date" class="span3" placeholder="End Date" name="end_date">
						<?php wp_nonce_field( 'make_wpcom_stats_nonce', 'make_wpcom_stats_nonce' ); ?>
						<button type="submit" class="btn btn info">Submit</button>
					</form>
					
					<br class="clear">
					
					<?php
			
						if ( !empty( $_POST ) && wp_verify_nonce( $_POST['make_wpcom_stats_nonce'], 'make_wpcom_stats_nonce' ) ) {

							echo '<table class="table table-striped table-bordered"><thead><tr><th>Site</th><th>Count</th></tr></thead><tbody>';
							echo '<tr><td>Page Views</td>';
							echo '<td>' . wpcom_vip_get_post_pageviews( $post_ID, $num_days, $end_date ) . '</td></tr>';
							echo '</tbody></table>';
						}
					?>
					
					<br class="clear">
				</div>
			</div>

		</div>
	<?php
}

/**
 * Hook the page in
 */
function make_add_stats_menu_page() {
	add_submenu_page( 'index.php', 'Social Stats', 'Social Stats', 'edit_posts', 'social_stats', 'make_social_stats' );
}

add_action( 'admin_menu', 'make_add_stats_menu_page' );
