<?php
/**
 * The template for displaying the Maker Pro category archives.
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */

get_header('craft'); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<div class="content">

							<div class="category-title">

								<?php 

									print apply_filters( 'taxonomy-images-queried-term-image', '', array( 'after' => '</div>', 'before' => '<div id="taxonomy-image">', 'image_size' => 'full') );
								?>

								<p class="uppercase">Topic:</p>

									<div class="span4 title-area pro-title-area">
										<h1 class="cat-title jumbo"><?php single_cat_title('', true); ?></h1>
									</div>

									<div class="span4 pro-newsletter">
										<p>Are you in the business of making?
										Stay up to date with MAKE Market Wire newsletter. Sign up here.</p>
										<form action="http://makermedia.createsend.com/t/r/s/jrsydu/" method="post" id="subForm">
											<fieldset>
												<div class="input-append control-group email-area">
													<input class="span2" id="appendedInputButton" name="cm-jrsydu-jrsydu" id="jrsydu-jrsydu" type="text" placeholder="Enter your email">
													<button class="btn btn-primary" type="submit" value="Subscribe">JOIN</button>
												</div>
											<fielset>
										</form>
									<!--END span4 title-area-->
									</div>

								<div class="clear"></div>

							</div>

							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
							 	<article <?php post_class(); ?>>

							 		<div class="cat-thumb">

							 			<?php get_the_image( array( 'image_scan' => true, 'size' => 'archive-thumb' ) ); ?>

							 		</div>

							 		<div class="cat-blurb">

							 			<?php 
							 				if ( ! empty( $_REQUEST['parent'] ) ) { ?>
							 					<h3><a class="red" href="<?php echo esc_url( add_query_arg( 'parent', rawurlencode( strip_tags( $_REQUEST['parent'] ) ), get_permalink() ) ); ?>"><?php the_title(); ?></a></h3>
							 				<?php } else { ?>
							 					<h3><a class="red" href="<?php echo esc_url( add_query_arg( 'parent', make_get_category_name_strip_slash(), get_permalink() ) ); ?>"><?php the_title(); ?></a></h3>
							 				<?php } ?>

										<p><?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?> <a href="<?php the_permalink(); ?>">Read more &raquo;</a></p>

										<p class="meta">By <?php the_author_posts_link(); ?>, <?php the_time('Y/m/d \@ g:i a') ?></p>
										<p>Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?> <?php edit_post_link('Fix me...', ' | '); ?></p>

									</div>

									<div class="clear"></div>
									
									<hr />

								</article>

							<?php endwhile; ?>

							<ul class="pager">
							
								<li class="previous"><?php previous_posts_link('&larr; Previous Page'); ?></li>
								<li class="next"><?php next_posts_link('Next Page &rarr;'); ?></li>
							
							</ul>

							<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>
						
							<?php else: ?>
							
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
							<?php endif; ?>

						</div>

					</div>

					<?php 
						if ( ( 'craft' == get_post_type() ) || in_category( 30694999 ) || post_is_in_descendant_category( 30694999 ) ) {
							get_sidebar('craft');
							get_footer('craft');
						} else { 
							get_sidebar();
							get_footer();
						}
					?>