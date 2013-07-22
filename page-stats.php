<?php
/**
 * Template Name: Stats Tool
 * Used to grab stats for tweets/plusses/likes
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */

//$url = 'http://makeprojects.com/Project/Kitty-Twitty-Cat-Toy/1439/1';

if ( $_POST ) {
	$url = esc_url( $_POST["url"] );
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Like, the best tool ever...</title>
		<?php wp_head(); ?>
	</head>

	<body>

	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->

		<div class="row">

			<div class="span6 offset3">

				<div class="hero-unit">
					<h1>The Social Counter!</h1>

				</div>

			</div>

		</div>
			
		<div class="row">

			<div class="span6 offset3">
		
				<div class="">
					
					<form action="" method="post" class="form-inline">
						<input type="text" class="span3" placeholder="url&hellip;" name="url">
						<button type="submit" class="btn btn info">Submit</button>
					</form>

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

				</div>

			</div>

		</div>

		<div class="row">

			<div class="span6 offset3">

				<footer>
					<p>&copy; <?php echo bloginfo( 'name' ) . ' ' . date( 'Y' ); ?></p>
				</footer>

			</div>

		</div>

	</div> <!-- /container -->

	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<?php wp_footer(); ?>
	</body>
</html>