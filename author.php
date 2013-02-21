<?php 
$author = get_queried_object();
make_get_header() ?>

	<div class="category-top">

		<div class="container">
		
			<div class="row">
			
				<div class="span4">
				
					<?php 
						$coauthor = array_shift( get_coauthors() ); 
						echo get_avatar( $coauthor->user_email, 298);
						?>
				
				</div>

				<div class="span8">
				
					<?php
						$url = 'http://en.gravatar.com/'. $author->data->user_login .'.json';
						$contents = wpcom_vip_file_get_contents( $url );

						if ( empty( $contents ) || is_wp_error( $contents ) )
							continue;
						
						$json_output = json_decode($contents);
						if ( !$json_output || !isset( $json_output->entry ) )
							continue;

						$author = $json_output->entry[0];
					?>
					
					<style type="text/css">
						.author_meta { background-image:url('<?php echo $author->profileBackground->url; ?>'); }
					</style>

					
					<h1 class="jumbo"><a class="noborder" href="http://blog.makezine.com/author/<?php if (isset($author)) {echo $author->requestHash; } ?>"><?php if (isset($author->displayName)) {echo $author->displayName; } ?></a></h1>
				
					<?php if (isset( $author->aboutMe )) { echo markdown( $author->aboutMe ); } ?>
					<?php if (isset( $author->accounts )) { $accounts = $author->accounts;  ?>
						<ul class="social">
							<?php foreach ($accounts as $account) {
								echo '<li class="' . esc_attr( $account->shortname ) . '"><a class="noborder" href="' . esc_url( $account->url ) . '"><span class="sp">&nbsp;</span></a></li>';
							}
							?>
							<?php 
								if ( isset( $author->emails[0]->value ) ) {
									echo '<a href="' . esc_attr( antispambot( "mailto:".$author->emails[0]->value ) ) . '">'.antispambot( $author->emails[0]->value ).'</a>';
								} 
							?>
						</ul>
					<?php } ?>
					<?php if (isset($author->urls)) { $urls = $author->urls;  ?>
						<ul class="links">
							<?php
								foreach ($urls as $url) {
									echo '<li><a class="noborder" href="' . esc_url( $url->value ) . '">'. esc_html( $url->title ) . '</a></li>';
								}
							?>
						</ul>
					<?php } ?>
				</div>
					
				</div>
				
			</div>
		
		</div>

	</div>
	
	<div class="grey">
	
		<div class="container">
		
			<div class="row">
			
				<div class="span8">
					
					<?php
						$args = array(
							'author'	=> get_queried_object_id(), // Likely the queried object ID
							'title'		=> 'New from ' . $author->displayName,
							'all'		=> true,
							'limit'		=> 2
						);
						make_carousel( $args ); ?>
					
				</div>
				
				<div class="span4">
					
					<div class="sidebar-ad">

						<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
						<div id='div-gpt-ad-664089004995786621-2'>
							<script type='text/javascript'>
								googletag.display('div-gpt-ad-664089004995786621-2');
							</script>
						</div>
						<!-- End AdSlot 2 -->

					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
	<div class="grey child">
	
		<div class="container">

			<div class="row">
			
				<div class="span12">
			
					<h2>Latest from <?php echo $author->displayName; ?></h2>
				
				</div>
				
			</div>
			
			<?php

				$types = array('posts' => 'post', 'projects' => 'projects', 'videos' => 'videos', 'articles' => 'magazine', 'reviews' => 'review' );

				foreach ( $types as $type ) { ?>

					<div class="row">
			
						<div class="span12">
						
							<?php 

								$args = array(
									'author'		=> get_queried_object_id(),
									'title' 		=> /* $author->display_name . '\'s ' .*/ ucfirst( make_post_type_better_name( $type ) ),
									'post_type'		=> $type,
									'all'			=> true
								);

								make_carousel( $args );
							?>
							
						</div>
					
					</div>
					
			<?php } ?>
			
		</div>
	
	<?php get_footer();	?>