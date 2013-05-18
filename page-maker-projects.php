<?php
/**
 * Template name: Maker Projects
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
get_header(); ?>
		
		<div class="single">

			<div class="container">
				 
				 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				 
				 	<?php 
						$video = get_post_custom_values('VideoURL');
						if ($video[0]) { ?>
				
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<div class="row">
							
								<div class="span8">
								
									<div class="row">
									
										<?php 
											$video = get_post_custom_values('VideoURL');
											if ($video[0]) {
												echo '<div class="span12">';
													echo make_youtube_iframe($video[0], 620, 345);
												echo '</div>';
											}
										?>
										
									</div>
										
									<div class="row">
									
										<hr>
										<?php
											$featuredposts = get_post_custom_values('FeaturedPosts');
											$posts = array_map( 'get_post', explode( ',', $featuredposts[0] ) );
											foreach ( $posts as $post ) { 
										?>
												<div class="span2">
													<a href="<?php echo get_permalink($post->ID); ?>">
														<?php echo get_the_post_thumbnail( $post->ID, 'new-thumb', array('class' => 'hide-thumbnail' ) ); ?>
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
								
							</div>

					<?php } ?>

				<div class="row">

					<div class="span8">
			
							<article <?php post_class(); ?>>

								<?php
								
									$args = array(
										'post__in'			=> array( 308202, 307019, 307584, 269342, 268475, 306681, 308288, 308202, 268757, 306781 ),
										'post_type' 		=> 'any',
										'title'			 	=> 'Electronics',
										);
									make_magazine_toc($args);

									$args = array(
										'post__in'			=> array( 267847, 307395, 308366, 269299, 267499, 307643, 267868, 269644, 308316, 267475 ),
										'post_type' 		=> 'any',
										'title'			 	=> 'Home',
										);
									make_magazine_toc($args);

									$args = array(
										'post__in'			=> array( 269424, 306655, 268163, 267478, 308356, 26748, 268570, 269242, 267959 ),
										'post_type' 		=> 'any',
										'title'			 	=> 'Workshop',
										);
									make_magazine_toc($args);

									$args = array(
										'post__in'			=> array( 267740, 268439, 268935, 267650, 267632, 269113, 267599 ),
										'post_type' 		=> 'any',
										'title'			 	=> 'Science',
										);
									make_magazine_toc($args);

									$args = array(
										'post__in'			=> array( 307336, 268529, 268641, 307350, 268779, 268369, 268976, 307649 ),
										'post_type' 		=> 'any',
										'title'			 	=> 'Craft',
										);
									make_magazine_toc($args);

									$args = array(
										'post__in'			=> array( 267724, 267430, 268575, 306948, 268067, 268174, 268390, 267777, 268082 ),
										'post_type' 		=> 'any',
										'title'			 	=> 'Art &amp; Design',
										);
									make_magazine_toc($args);

								?>

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

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>