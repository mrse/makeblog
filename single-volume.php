<?php
/*
 * Template name: Volume Page
 */

get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">
			
				<div class="content">
				 
				 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				 
				 	<?php 
						$video = get_post_custom_values('VideoURL');
						if ($video[0]) { ?>
				
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<div class="row-fluid">
							
								<div class="span8">
								
									<div class="row-fluid">
									
										<?php 
											$video = get_post_custom_values('VideoURL');
											if ($video[0]) {
												echo '<div class="span12">';
													echo make_youtube_iframe($video[0], 605, 340);
												echo '</div>';
											}
										?>
										
									</div>
										
									<div class="banner">
									
										<?php
											$featuredposts = get_post_custom_values('FeaturedPosts');
											$posts = array_map( 'get_post', explode( ',', $featuredposts[0] ) );
											foreach ( $posts as $post ) { 
												//print_r($post); ?>
												<div class="teaser2">
													<a href="<?php echo get_permalink($post->ID); ?>">
														<?php echo get_the_post_thumbnail( $post->ID, 'volume-thumb', array('class' => 'thumbnail' ) ); ?>
														<?php echo get_the_title( $post->ID ); ?>
													</a>
												</div>
											
											<?php } 
											wp_reset_query(); ?>
										
									</div>
														
								</div>
								
								<div class="span4">
								
									<?php the_content(); ?>

								</div>
								
							</div>
						
						<?php } else { ?>

							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<div class="row-fluid">
							
								<div class="span8">
								
									<?php the_content(); ?>
									
								</div>
								
								<div class="span4">
										
									<div class="banner">
									
										<?php
											$featuredposts = get_post_custom_values('FeaturedPosts');
											if ($featuredposts[0]) {
												$posts = array_map( 'get_post', explode( ',', $featuredposts[0] ) );
												foreach ( $posts as $post ) { 
													//print_r($post); ?>
														<a href="<?php echo get_permalink($post->ID); ?>">
															<?php echo get_the_post_thumbnail( $post->ID, 'side-thumb', array('class' => 'thumbnail' ) ); ?>
															<?php echo get_the_title( $post->ID ); ?>
														</a>
												
												<?php } 
												wp_reset_query();
												
											}
										?>
											
											
										
									</div>
														
								</div>
								
								<div class="span4">
								
									

								</div>
								
							</div>

					<?php } ?>
				
				</div>

				<div class="row">

					<div class="span8">

						<div class="content">
			
							<article <?php post_class(); ?>>

								<!--<p class="categories"><?php the_category(', '); ?></p>-->

								<?php if($post->post_parent !== 0) { ?>
									<p class="meta top">By <?php the_author_posts_link(); ?>, <?php the_time('Y/m/d \@ g:i a') ?></p>		
								<?php } ?>

								<?php echo make_magazine_toc('review', 'Reviews') ?>

								<?php echo make_magazine_toc('magazine', 'Articles') ?>
								
								<?php echo make_magazine_toc('projects', 'Projects') ?>
								
								<?php echo make_magazine_errata('Web Extras'); ?>

								<div class="clear"></div>
							
							</article>

							<?php endwhile; ?>

							<ul class="pager">
							
								<li class="previous"><?php previous_posts_link('&larr; Previous Page'); ?></li>
								<li class="next"><?php next_posts_link('Next Page &rarr;'); ?></li>
							
							</ul>

							<?php if (function_exists('make_printer_makershed_thing')) { echo make_printer_makershed_thing(); } ?>

							<div class="comments">
								<?php comments_template(); ?>
							</div>
							
							<?php else: ?>
							
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
							<?php endif; ?>

						</div>

					</div>

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>