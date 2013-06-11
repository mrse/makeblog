<?php

	/**
	 * The function to display author/maker bios
	 *
	 * @version  1.0
	 * @author  Cole Geissinger <cgeissinger@makermedia.com>
	 * 
	 */
	

	class Make_Authors {

		/**
		 * Get our authors information via Gravatar
		 * @return Object
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		public function make_get_author_data() {
			global $post;

			$author_id = $post->post_author;
			$author    = get_userdata( $author_id );
			$url       = 'http://en.gravatar.com/' . $author->data->user_login . '.json';
			$contents  = wpcom_vip_file_get_contents( $url );

			if ( $contents != false ) {
				$json_output = json_decode( $contents );								
				$data        = $json_output->entry[0];

				return $data;
			} else {
				return false;
			}
		}


		/**
		 * Return the full HTML block for our author-bio's
		 * @return String|Bool
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		public function full_author_formatted() {
			$author = $this->make_get_author_data();
			$output = '';

			// Make sure a user was loaded.
			if ( $author ) {
				$output .= '<div class="author-bio row">';
					$output .= '<div class="author-photo span2">';
					
						// Return the authro bio photo.
						$output .= $this->author_photo();
				
					$output .= '</div>';

					$output .= '<div class="span6">';

						// Return the author name.
						$output .= $this->author_name();

						// Display the bio info.
						if ( isset( $author->aboutMe ) ) 
							$output .= $this->author_bio( $author );
						
						// Display the soical media accounts.
						if ( isset( $author->accounts ) ) {
							$output .= $this->author_social( $author );
						}
						
						// Display the author website urls. We'll also pass it our already quried Author data.
						if ( isset( $author->urls ) ) {
							$output .= $this->author_urls( $author );
						};
					$output .= '</div>';
				$output .= '</div>';

				return $output;
			} else {

				// If no author is returned, lets just return false for conditional checks
				return false;
			}
		}


		/**
		 * Returns only the data for the author name
		 * @return String
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		public function author_name() {
			global $post;

			$output = '<h3 class="jumbo">BY <a class="noborder" href="' . get_author_posts_url( $post->post_author ) . '">' . get_the_author_meta( 'display_name' ) . '</a></h3>';

			return $output;
		}


		/**
		 * Returns only the data for the author bio photo
		 * @return String
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		public function author_photo() {
			global $post;

			$coauthor = array_shift( get_coauthors() );

			$output = '<a href="' . get_author_posts_url( $post->post_author ) . '">' . get_avatar( $coauthor->user_email, 200 ) . '</a>';

			return $output;
		}


		/**
		 * Returns only the data for the author website urls.
		 * @param  Object $author Allows us to pass through the $author object if we need to or else we'll load it ourselves.
		 * @return String
		 *
		 * @version 1.0
		 * @since   1.0
		 */
		public function author_urls( $author ) {
			// Only load our author data if we aren't passing it already
			if ( empty( $author ) )
				$author = $this->make_get_author_data();

			$output = '<ul class="links">';
				foreach ( $author->urls as $url ) {
					$output .= '<li><a class="noborder" href="' . esc_url( $url->value ) . '">' . esc_html( $url->title ) . '</a></li>';
				}
			$output .= '</ul>';

			return $output;
		}


		/**
		 * Returns only the data for the authors social media websites.
		 * @param  Object $author Allows us to pass through the $author object if we need to or else we'll load it ourselves.
		 * @return String
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		public function author_social( $author ) {
			// Only load our author data if we aren't passing it already
			if ( empty( $author ) )
				$author = $this->make_get_author_data();

			$output = '<ul class="social">';
				foreach ( $author->accounts as $account ) {
					$output .= '<li class="' . esc_attr( $account->shortname ) . '"><a class="noborder" href="' . esc_url( $account->url ) . '"><span class="sp">&nbsp;</span></a></li>';
				}

				if ( isset( $author->emails[0]->value ) ) {
					$output .= '<a href="' . esc_attr( antispambot( "mailto:" . $author->emails[0]->value ) ) . '">' . antispambot( $author->emails[0]->value ) . '</a>';
				}
			$output .= '</ul>';

			return $output;
		}


		public function author_bio( $author ) {
			// Only load our author data if we aren't passing it already
			if ( empty( $author ) )
				$author = $this->make_get_author_data();

			$output = markdown( $author->aboutMe );

			return $output;
		}
	}

	// Load our class into a handy dandy variable so we can use this in our helper function.
	$make_author_class = new Make_Authors;


	/**
	 * Helper function for returning all of our bio info stuff.
	 * @param  String $type   Insert the type of data you want returned
	 *         Accepted Para  full - DEFAULT
	 *         				  name
	 *         				  photo
	 *         				  bio
	 *         				  social
	 *         				  urls
	 * @return Mixed
	 *
	 * @version  1.0
	 * @since    1.0
	 */
	function make_author_bio( $type = 'full' ) {
		global $make_author_class;

		// Return the full HTML block
		if ( $type == 'full' )
			echo $make_author_class->full_author_formatted();

		// Return the author name only
		if ( $type == 'name' )
			echo $make_author_class->author_name();

		// Return the author photo
		if ( $type == 'photo' )
			echo $make_author_class->author_photo();

		// Returns the author bio
		if ( $type == 'bio' )
			echo $make_author_class->author_bio();

		// Return the author website urls
		if ( $type == 'urls' )
			echo $make_author_class->author_urls();

		// Return the author social media buttons
		if ( $type == 'social' )
			echo $make_author_class->author_social();
	}

