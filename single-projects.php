<?php
/*
 * Template name: Project
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
										<p class="meta top">By <?php the_author_posts_link(); ?>, <?php the_time('Y/m/d \@ g:i a') ?></p>		
									<?php } ?>

									<?php the_content(); ?>

									<script type="text/javascript">
									jQuery(document).ready(function(){
										jQuery('.big_images .1').addClass('active');
										jQuery('.big_images .2, .big_images .3').hide();
										jQuery('right_column img').click(function () {
      										var title = jQuery(this).attr('class');
      										console.log(title);
    									});
									});

									</script>

									<div class="clear"></div>
								
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

					<?php get_sidebar('review'); ?>

			<?php get_footer(); ?>