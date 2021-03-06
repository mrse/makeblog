<?php
/**
 * Home Page Template
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
make_get_header() ?>
		
	<div class="single">
	
		<div class="container">

			<div class="row">

				<div class="span8 add30">
					
					<?php // create a new custom query so we can return posts, 
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$query = new WP_Query( array(
							'post_type' => array( 'post', 'projects', 'review', 'video', 'magazine' ),
							'paged' => $paged,
							'tag__not_in' => array( 5183, 22815, 9947 ),
						) );

						if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				
					<div class="projects-masthead">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
					</div>
					
					<ul class="projects-meta">
						<?php if ( make_get_author( $post->ID ) ) : ?>
							<?php make_get_author( $post->ID ); ?>
						<?php endif ?>
						<li>Posted <span class="blue"><?php the_time('m/d/Y \@ g:i a'); ?></span></li>
						<li>Category <?php the_category(', '); ?></li>
						<li>Comments <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a></li>
					</ul>
				
					<article <?php post_class(); ?>>
						
						<div class="media">
							
							<a href="<?php the_permalink(); ?>" class="pull-left">
								<?php the_post_thumbnail( 'archive-thumb', array( 'class' => 'media-object' ) ); ?>
							</a>
							
							<div class="media-body">
								<p><?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?> <a href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
							</div>
							
							<div class="jetpack-sharing">
								<?php if ( function_exists( 'sharing_display') ) echo sharing_display(); ?> 
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
				
				
				<?php get_sidebar(); ?>
					
					
			</div>

		</div>

	</div>

<?php get_footer(); ?>