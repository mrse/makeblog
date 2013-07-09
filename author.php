<?php 

// Get our current authors info
$author = get_queried_object();

// Contains the username which should match the Gravatar account URL.
$gravatar_login = $author->data->user_login;

// used to display all post related to this authro in the carousel
$author_ids = $author->ID;

// Get all the Coauthor Plus data
$coauthor = array_shift( get_coauthors() ); 

// Contain our coauthor email into a variable. This may be overwritten when account is linked
$avatar_email = $coauthor->user_email;

// Setup some new variables or override some when an author is linked.
if ( ! empty( $author->linked_account ) ) {

	// We need the ID of the linked author so we can get their posts.
	$linked_author = get_user_by( 'slug', $author->linked_account );

	// When an account is linked, we want to add this email into mix to see if we return gravatar data
	$gravatar_login = $linked_author->user_login;

	// When linked, we want to concatenate the linked author ID into the WP_Query carousel.
	$author_ids .= ',' . $linked_author->ID;

	// Set linked account email as the gravatar email
	$avatar_email = $linked_author->user_email;
}

make_get_header() ?>

	<div class="category-top">

		<div class="container">
		
			<div class="row">
			
				<div class="span4">
				
					<?php echo get_avatar( $avatar_email, 298 ); ?>
				
				</div>

				<div class="span8">
				
					<?php
						$url = 'http://en.gravatar.com/'. $gravatar_login .'.json';
						$contents = wpcom_vip_file_get_contents( $url );

						if ( $contents != false ) {
							$json_output = json_decode( $contents );								
							$gauthor = $json_output->entry[0]; ?>
					
							<h1 class="jumbo"><a class="noborder" href="<?php echo home_url(); ?>/author/<?php if ( isset( $gauthor ) ) echo urlencode( $gauthor->requestHash ); ?>"><?php if ( isset( $gauthor->displayName ) ) echo esc_attr( $gauthor->displayName ); ?></a></h1>
						
							<?php if ( isset( $gauthor->aboutMe ) )
								echo markdown( $gauthor->aboutMe ); ?>

							<?php if ( isset( $gauthor->accounts ) ) {
								$accounts = $gauthor->accounts; ?>
								<ul class="social">
									<?php 
										foreach ( $accounts as $account ) {
											echo '<li class="' . esc_attr( $account->shortname ) . '"><a class="noborder" href="' . esc_url( $account->url ) . '"><span class="sp">&nbsp;</span></a></li>';
										} 
									?>
									<?php 
										if ( isset( $gauthor->emails[0]->value ) ) {
											echo '<a href="' . esc_attr( antispambot( "mailto:" . $gauthor->emails[0]->value ) ) . '">' . antispambot( $gauthor->emails[0]->value ) . '</a>';
										} 
									?>
								</ul>
							<?php } ?>

							<?php if ( isset( $gauthor->urls ) ) {
								$urls = $gauthor->urls; ?>
								<ul class="links">
									<?php
										foreach ( $urls as $url ) {
											echo '<li><a class="noborder" href="' . esc_url( $url->value ) . '">' . esc_html( $url->title ) . '</a></li>';
										}
									?>
								</ul>
							<?php }
						} else { ?>
							<h1 class="jumbo"><a class="noborder" href="<?php echo home_url(); ?>/author/<?php if ( isset( $author ) ) echo urlencode( $author->user_nicename ); ?>"><?php if ( isset( $author->display_name ) ) echo esc_attr( $author->display_name ); ?></a></h1>	
						<?php } 
					?>
					
				</div>
				
			</div>
		
		</div>

	</div>

	<div class="grey child">
	
		<div class="container">

			<div class="row">
			
				<div class="span12">
				
					<h2>Latest from <?php echo $author->display_name; ?></h2>
				
				</div>
				
			</div>
			
			<?php

				$types = array( 'posts' => 'post', 'craft' => 'craft', 'projects' => 'projects', 'videos' => 'video', /*'articles' => 'magazine',*/ 'reviews' => 'review' );

				foreach ( $types as $type ) { ?>

					<div class="row">
			
						<div class="span12">
							
							<?php 
								$args = array(
									'author'		=> $author_ids,
									'title' 		=> /* $author->display_name . '\'s ' .*/ ucfirst( make_post_type_better_name( $type ) ),
									'post_type'		=> $type,
									'all'			=> all
								);

								make_carousel( $args );
							?>
							
						</div>
					
					</div>
					
			<?php } ?>
			
		</div>
	
	<?php get_footer();	?>