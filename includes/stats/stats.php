<?php
/**
 * Stats Functions
 * 
 * Moving this to the admin. The original goal, was just to make it as a private page, but Mo dropped Mjölnir on that commit...
 *
 */
function make_get_tweets( $url ) {
 
	$json_string = wpcom_vip_file_get_contents( 'http://urls.api.twitter.com/1/urls/count.json?url=' . $url );
	$json = json_decode($json_string, true);
 
	return intval( $json['count'] );
}
 
function make_get_likes( $url ) {
 
	$json_string = wpcom_vip_file_get_contents('http://graph.facebook.com/?ids=' . $url);
	$json = json_decode($json_string, true);
 
	return intval( $json[$url]['shares'] );
}

function make_get_plusones( $url ) {
 
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
		$url = esc_url( $_POST["url"] );
	}
	?>
	<div class="wrap">
	
		<h1>The Social Counter!</h1>
		
		<div id="" class="postbox metabox-holder">
			<h3 class="hndle"><span>Like, the best tool ever...</span></h3>
			<div class="inside">
				<div class="table table_content">
					<p class="sub">Add a URL to get stats</p>
					<form action="" method="post" class="">
						<input type="text" class="span3" placeholder="url&hellip;" name="url">
						<button type="submit" class="btn btn info">Submit</button>
					</form>
					
					<br class="clear">
					
					<?php
			
						if ($_POST) {

							echo '<table class="table table-striped table-bordered"><thead><tr><th>Site</th><th>Count</th></tr></thead><tbody>';
							echo '<tr><td>Twitter Tweets</td>';
							echo '<td>' . make_get_tweets( $url ) . '</td></tr>';
							echo '<tr><td>Facebook Likes</td>';
							echo '<td>' . make_get_likes( $url ) . '</td></tr>';
							echo '<tr><td>Google Plusses</td>';
							echo '<td>' . make_get_plusones( $url ) . '</td></tr>';
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
