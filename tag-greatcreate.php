<?php get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<div class="content">

							<a href="http://blog.makezine.com/tag/greatcreate"><img src="http://cdn.makezine.com/make/jake/great_create.jpg" border="0" alt="Great Create Archives" /></a>

							<div class="category-title">

								<h1 class="cat-title jumbo">RadioShack's The Great Create</h1>

								<div class="description"><?php echo category_description( $category_id ); ?></div>

								<div class="clear"></div>

							</div>

							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
							 	<article <?php post_class(); ?>>

							 		<div class="cat-thumb">

							 			<?php get_the_image( array( 'image_scan' => true, 'size' => 'archive-thumb' ) ); ?>

							 		</div>

							 		<div class="cat-blurb">

										<h3><a class="red" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

										<p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>

										<p class="meta">By <?php the_author_posts_link(); ?>, <?php the_time('Y/m/d \@ g:i a') ?></p>

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

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>