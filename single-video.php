<?php get_header(); ?>
		
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

									<p class="meta top"><?php the_time('Y/m/d \@ g:i a') ?></p>

									<div class="social"></div>

									<?php the_content(); ?>

									<div class="clear"></div>

									<div class="row">

										<div class="postmeta">
		
											<div class="span-thumb thumbnail">
											
												<?php echo get_avatar( get_the_author_meta('user_email'), 72); ?>
											
											</div>
											
											<div class="span-well well">
											
												<p>Posted by 
													<?php if(function_exists('coauthors_posts_links')) {
														coauthors_posts_links();
													} else { 
														the_author_posts_link();
													} ?> | <a href="<?php the_permalink(); ?>"><?php the_time('l F jS, Y g:i A'); ?></a></p>
												<p>Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?> <?php edit_post_link('Fix me...', ' | '); ?></p>

											</div>

										</div>
										
									</div>
								
								</article>

							<?php endwhile; ?>
		
							<div class="breadcrumb">
								<div class="pull-left"><?php previous_post_link('&larr;&nbsp;%link'); ?></div>
								
								<div class="pull-right"><?php next_post_link('%link&nbsp;&rarr;'); ?> </div>
								
								<div class="clear"></div>
							</div>
							
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