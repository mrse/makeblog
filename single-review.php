<?php
/*
 * Template name: Volume Page
 */

get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<div class="content">


							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
								<article <?php post_class(); ?>>

									<!--<p class="categories"><?php the_category(', '); ?></p>-->

									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

									<?php
										if (has_post_thumbnail()) {
											echo '<div class="post-image">';
												the_post_thumbnail('review-large');
											echo '</div>';
										}
									?>

									

									<?php if($post->post_parent !== 0) { ?>
										<p class="meta top">By <?php if( function_exists( 'coauthors_posts_links' ) ) {	coauthors_posts_links(); } else { the_author_posts_link(); } ?> , <?php the_time('Y/m/d \@ g:i a') ?></p>
									<?php } ?>

									<?php the_content(); ?>

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
					
					<?php if (has_category('3d-printing-desktop-manufacturing')) {
						get_sidebar();
					} else {
						get_sidebar('review');
					} ?>

			<?php get_footer(); ?>