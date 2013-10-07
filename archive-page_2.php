<?php
/**
 * The template for displaying the archive of Page:2 posts.
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 */

get_header(); ?>
		
		<div class="single">
		
			<div class="container">

				<div class="row">

					<div class="span8">

						<div class="content">
						
							<a href="http://blog.makezine.com/contribute/">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/contribute-page-2_jbr-1.jpg" alt="Contribute to Page: 2">
							</a>

							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							 
							 	<?php
								 	$bio = get_post_custom_values('author_bio');
									$name = get_post_custom_values('author');
									$url = get_post_custom_values('author_website');
									$email = get_post_meta($post->ID, 'author_email', true);
									$size = 40;
								?>
								
								<article <?php post_class(); ?>>

									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

									<p class="meta top">By <a href="<?php echo esc_url( $url[0] ); ?>"><?php echo esc_html( $name[0] ); ?></a>, <?php the_time('m/d/Y \@ g:i a') ?></p>

									<?php the_content(); ?>

									<?php make_makers(); ?>

									<div class="row">

										<div class="postmeta">
		
											<div class="span-thumb thumbnail">
											
												<?php echo get_avatar( $email, $size ); ?>
											
											</div>
											
											<div class="span-well well">
											
												<p>Posted by: <a href="<?php echo esc_url( $url[0] ); ?>"><?php echo esc_html( $name[0] ); ?></a> | <a href="<?php the_permalink(); ?>"><?php the_time('l F jS, Y g:i A'); ?></a></p>
												<p>Bio: <?php echo wp_kses_post( $bio[0] ); ?></p>		
												<p>Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?> <?php edit_post_link('Fix me...', ' | '); ?></p>

											</div>

										</div>
										
									</div>
								
								</article>

							<?php endwhile; ?>
		
							<ul class="pager">
							
								<li class="previous"><?php previous_posts_link('&larr; Previous Page'); ?></li>
								<li class="next"><?php next_posts_link('Next Page &rarr;'); ?></li>
							
							</ul>

							<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>
						
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