<?php get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<div class="content">
						
							<?php
								if (is_tag( 'greatcreate' )) {
									echo '<a href="http://blog.makezine.com/tag/greatcreate"><img src="http://cdn.makezine.com/make/jake/great_create.jpg" border="0" alt="Great Create Archives" /></a>';
								} elseif ( is_tag( array( 'altsxsw', 'elmers' ) ) ) {
									echo '<a href="http://www.elmers.com/glueguide"><img src="http://cdn.makezine.com/make/ads/glue_guide.jpg" style="height:auto; max-width:580px;" border="0" alt="Elmers Glue Guide" /></a>';
								}
							?>

							<div class="category-title">

								<h1 class="cat-title jumbo"><?php echo make_get_better_tag_title(); ?></h1>

								<div class="clear"></div>

							</div>

							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
							 	<article <?php post_class(); ?>>

							 		<div class="cat-thumb">
							 		
								 		<?php 
								 			$image = get_post_custom_values('Image');
											if ( !empty( $image[0] ) ) {
												echo '<img src="' . wpcom_vip_get_resized_remote_image_url( make_projects_to_s3( $image[0] ), 200, 200 ) . '" alt="' . esc_attr( the_title('', '', false ) ) . '" />';
											} else {
												get_the_image( array( 'image_scan' => true, 'size' => 'archive-thumb' ) );
											}
										?>

							 		</div>

							 		<div class="cat-blurb">

										<h3><a class="red" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

										<p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>

										<p>Posted by 
											<?php if(function_exists('coauthors_posts_links')) {
												coauthors();
											} else { 
												the_author_posts_link();
											} ?>
											<?php $type = get_post_type( $post->ID ); if ($type != 'projects') { echo ' | <a href="' . get_permalink() . '">' . get_the_time('l F jS, Y g:i A'); } ?></a></p>
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

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>