<?php
/**
 * Single Page Template
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
make_get_header() ?>
		
	<div class="category-top">
	
		<div class="container">

			<div class="row">

				<div class="span12">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
						<article <?php post_class(); ?>>
						
							<div class="projects-masthead">
								
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								
							</div>
							
							<ul class="projects-meta">
								<li>
									By <?php 
									if( function_exists( 'coauthors_posts_links' ) ) {	
										coauthors_posts_links(); 
									} else { 
										the_author_posts_link(); 
									} ?>
								</li>
								<li>
									Category: <?php the_category(', '); ?>
								</li>
								<li>
									<?php the_tags( 'Tags: ', ', '); ?>
								</li>
							</ul>
									
							<div class="row">
							
								<div class="span8">

									<?php the_content(); ?>
									
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
										
								<?php get_sidebar(); ?>
									
							</div>
								
						</article>

					</div>

				</div>

		<?php get_footer(); ?>