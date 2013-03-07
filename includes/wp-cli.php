<?php
/**
 * makeblog commands for the WP-CLI framework
 *
 * @package wp-cli
 * @since 3.0
 * @see https://github.com/wp-cli/wp-cli
 */

WP_CLI::add_command( 'make', 'MAKE_WP_CLI_Command' );

class MAKE_WP_CLI_Command extends WP_CLI_Command {

	/**
	 * Prints permalinks for projects with the Make:Projects URL
	 *
	 * @subcommand csv
	 * 
	 */
	public function make_query_to_csv() {
		// Create a new output file
		$file = sprintf( '/tmp/%s-make-query-to-csv.csv', date( 'Y-m-d' ) );
		file_put_contents( $file, "" );

		$args = array(
			'post_type' => array( 'projects' ),
			'post_status' => 'any',
			'posts_per_page' => 3000,
		);

		$query = new WP_Query($args);

		if( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$link = get_post_custom_values( 'Link' );
				file_put_contents( $file, get_the_ID() . ", " . get_permalink() . ", " . esc_url( $link[0] ) . ", " . substr(esc_url( $link[0] ), -6, -2) . "\n", FILE_APPEND );
			endwhile;
		endif;

	}

	/**
	 * Prints a redirect map for Make: Projects/
	 *
	 * @subcommand redirect
	 * 
	 */
	public function make_redirect_map() {
		// Create a new output file
		$file = sprintf( '/tmp/%s-htaccess.txt', date( 'Y-m-d' ) );
		file_put_contents( $file, "" );

		$args = array(
			'post_type' => array( 'projects' ),
			'post_status' => 'any',
			'posts_per_page' => 3000,
		);

		$query = new WP_Query($args);

		if( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$link = get_post_custom_values( 'Link' );
				$bad = array(":", '/', '+');
				$good = array('\:', '\/', '\+' );
				$link = get_post_custom_values( 'Link' );
				if (!empty($link[0])) {
					if ( get_post_status ( get_the_ID() ) == 'publish' ) {
						file_put_contents( $file, "rewriterule ^" . str_replace( $bad, $good, substr( esc_url( $link[0] ), 24 ) ) . " \"" .  ( str_replace( $bad, $good, get_permalink() ) ) . "\" [R=301,L] \n", FILE_APPEND );
					} else {
						file_put_contents( $file, "rewriterule ^" . str_replace( $bad, $good, substr( esc_url( $link[0] ), 24 ) ) . " \"http\:\/\/blog.makezine.com\/projects\/\" [R=301,L] \n", FILE_APPEND );
					}
				}
			endwhile;
		endif;

	}

	/**
	 * Inserts comments from Make: Projects
	 *
	 * @subcommand comments
	 * 
	 */
	public function make_projects_comment_import() {
		include_once 'comments.php';
		foreach ($comments as $comment) {
			$data = array(
				'comment_post_ID' => $comment['comment_post_ID'],
				'comment_author' => $comment['comment_author'],
				'comment_author_email' => $comment['comment_author_email'],
				'comment_content' => $comment['comment_content'],
				'comment_date' => date( 'Y-m-d H:i:s', strtotime( $comment['comment_date'] ) )
			);
			$comment_id = wp_insert_comment( $comment );
			if ( !$comment_id ) {
				WP_CLI::error( "Could not create comment" );
			} else {
				WP_CLI::success( "Inserted comment $comment_id." );
			}
		}
	}

	/**
	 * Inserts comments from Make: Projects
	 *
	 * @subcommand parts
	 * 
	 */
	public function make_projects_parts_import() {
		include_once 'parts.php';
		foreach ($parts as $part) {
			$pid = add_post_meta( $part['post_ID'], 'parts', $part );
			if ( !$pid ) {
				WP_CLI::error( "Could not create part..." );
			} else {
				WP_CLI::success( "Inserted part: $pid->notes." );
			}
		}
	}
}