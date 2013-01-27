<?php
WP_CLI::add_command( 'makeblog', 'MAKE_CLI' );

class MAKE_CLI extends WP_CLI_Command {

	/**
	 * Convert a category to a tag
	 * Create a new term, and then assign all posts the tag
	 *
	 * @subcommand copy-category-to-tag
	 * @synopsis <category-name>
	 */
	public function copy_category_to_tag( $args, $assoc_args ) {

		list( $slug ) = $args;

		$category = get_term_by( 'slug', $slug, 'category' );
		if ( ! $category )
			WP_CLI::error( "'{$slug}' isn't a valid category slug" );

		$tag = get_term_by( 'name', $category->name, 'post_tag' );
		if ( ! $tag ) {
			$tag = wp_insert_term( $category->name, 'post_tag' );
			$tag = get_term_by( 'id', $tag['term_id'], 'post_tag' );
			WP_CLI::line( "Created a tag for '{$tag->name}'" );
		}

		$args = array(
			'category__in' => array( $category->term_id ),

			'posts_per_page' => 1000,
			'offset' => 0,

			'post_type' => 'any',

			// Prevent new posts from affecting the order
			'orderby' => 'ID',
			'order' => 'ASC',

			// Speed this up
			'no_found_rows' => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		);

		// Get the first set of posts
		$query = new WP_Query( $args );

		$found_posts = 0;

		WP_CLI::line( "Adding '{$tag->name}' as a tag to posts in the category of the same name" );

		// Start looping through chunks of posts
		while ( $query->have_posts() ) {

			foreach ( $query->posts as $post ) {
				WP_CLI::out('.');
				$found_posts++;

				wp_set_object_terms( $post->ID, array( $tag->slug ), 'post_tag', true );
			}

			$this->free_up_memory();

			// Get more posts to process
			$args['offset'] = $args['offset'] + $args['posts_per_page'] ;
			$query = new WP_Query( $args );
		}

		WP_CLI::line( '' );
		WP_CLI::success( "All done. {$found_posts} posts were affected" );

	}

	/**
	 * Merge category
	 *
	 * @subcommand merge-category
	 * @synopsis <from-slug> <to-slug>
	 */
	public function merge_category( $args, $assoc_args ) {

		list( $from, $to ) = $args;

		$from_cat = get_term_by( 'slug', $from, 'category' );
		if ( ! $from_cat )
			WP_CLI::error( "No from category with slug '{$from}'" );

		$to_cat = get_term_by( 'slug', $to, 'category' );
		if ( ! $to_cat )
			WP_CLI::error( "No to category with slug '{$to}'" );

		WP_CLI::line( "Merging '{$from}' to '{$to}'" );
		wp_delete_term( $from_cat->term_id, 'category', array( 'default' => $to_cat->term_id, 'force_default' => true ) );
		WP_CLI::success( "Merge complete" );
	}

	/**
	 * Delete category
	 *
	 * @subcommand delete-category
	 * @synopsis <slug>
	 */
	public function delete_category( $args, $assoc_args ) {

		list( $slug ) = $args;

		$category = get_term_by( 'slug', $slug, 'category' );
		if ( ! $category )
			WP_CLI::error( "No category with slug '{$slug}'" );

		wp_delete_term( $category->term_id, 'category' );
		WP_CLI::success( "Delete complete" );
	}

	private function free_up_memory() {
		global $wpdb, $wp_object_cache;
		$wpdb->queries = array(); // or define( 'WP_IMPORTING', true );
		if ( ! is_object( $wp_object_cache ) )
			return;
		$wp_object_cache->group_ops = array();
		$wp_object_cache->stats = array();
		$wp_object_cache->memcache_debug = array();
		$wp_object_cache->cache = array();
		$wp_object_cache->__remoteset(); // important
	}
}