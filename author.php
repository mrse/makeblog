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
				
					<h1 class="jumbo"><?php echo $author->display_name; ?></h1>
				
					<p><?php  echo Markdown( $author->description ); ?></p>
					
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
							'author'		=> get_queried_object_id(), // Likely the queried object ID
							'title'			=> 'Featured ' . get_queried_object()->name,
							'limit'			=> 2,
							'tag'			=> 'Featured',
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
								
			<div class="row">
			
				<div class="span12">
				
					<?php 

						$args = array(
							'author'	=> get_queried_object_id(), // Likely the queried object ID
							'title'		=> 'New in ' . get_queried_object()->name
						);
						
						make_carousel($args);
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

				function make_post_type_better_name( $name ) {
					if ($name == 'post') {
						return 'posts';
					} elseif ($name == 'projects' ) {
						return 'projects';
					} elseif ( $name == 'videos' ) {
						return 'videos';
					} elseif ( $name == 'magazine' ) {
						return 'articles';
					} elseif ( $name == 'review' ) {
						return 'reviews';
					}
				}
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