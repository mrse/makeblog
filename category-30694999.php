<?php get_header('craft'); ?>
		
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

								<h1 class="cat-title jumbo"><?php single_cat_title('', true); ?></h1>

								<div class="clear"></div>

								<!--<div class="description"><?php //echo category_description( $category_id ); ?></div>-->

								<div class="clear"></div>

							</div>

							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
							 	<article <?php post_class(); ?>>

							 		<div class="cat-thumb">

							 			<?php get_the_image( array( 'image_scan' => true, 'size' => 'archive-thumb' ) ); ?>

							 		</div>

							 		<div class="cat-blurb">

							 			<?php 
							 				$parent = $_REQUEST['parent']; 
							 				if (isset($parent)) { ?>
							 					<h3><a class="red" href="<?php the_permalink(); ?>?parent=<?php echo esc_html($parent); ?>"><?php the_title(); ?></a></h3>
							 				<?php } else { ?>
							 					<h3><a class="red" href="<?php the_permalink(); ?>?parent=<?php echo make_get_category_name_strip_slash(); ?>"><?php the_title(); ?></a></h3>
							 				<?php } ?>

										<p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>

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

					<?php get_sidebar('craft'); ?>

			<?php get_footer('craft'); ?>