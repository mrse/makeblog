<?php
/**
 * The template for displaying the archive of all posts.
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

						<?php if (!is_home()) { ?>

							<ul class="breadcrumb">
			
								<?php if(class_exists('bcn_breadcrumb_trail')) {
									$breadcrumb_trail = new bcn_breadcrumb_trail;
									$breadcrumb_trail->opt['home_title'] = "Home";
									$breadcrumb_trail->opt['current_item_prefix'] = '<li class="current">';
									$breadcrumb_trail->opt['current_item_suffix'] = '</li>';
									$breadcrumb_trail->opt['separator'] = '<span class="divider">&nbsp;/&nbsp;</span>';
									$breadcrumb_trail->opt['home_prefix'] = '<li>';
									$breadcrumb_trail->opt['home_suffix'] = '</li>';
									$breadcrumb_trail->opt['max_title_length'] = 70;
									$breadcrumb_trail->fill();
									$breadcrumb_trail->display();
								} ?>
										
							</ul>

						<?php } ?>

						<div class="content">


							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
								<article <?php post_class(); ?>>

									<!--<p class="categories"><?php the_category(', '); ?></p>-->

									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

									<p class="meta top">By <?php the_author_posts_link(); ?>, <?php the_time('m/d/Y \@ g:i a') ?></p>

									<?php the_content(); ?>

									<div class="clear"></div>

									<div class="row">

										<div class="postmeta">
		
											<div class="span-thumb thumbnail">
											
												<?php echo get_avatar( get_the_author_meta('user_email'), 72); ?>
											
											</div>
											
											<div class="span-well well">
											
												<p>Posted by <?php 
													if( function_exists( 'coauthors_posts_links' ) ) {	
														coauthors(); 
													} else { 
														the_author_posts_link(); 
													} ?> | <a href="<?php the_permalink(); ?>"><?php the_time('l F jS, Y g:i A'); ?></a></p>
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