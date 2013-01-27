<?php
/**
 * Template Name: Materials
 */
?>


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
									
									<div class="cat" id="advancedmaterials">

										<div class="cat-advancedmaterials">

											<h2><a href="http://blog.makezine.com/tag/advancedmaterials/">Advanced Materials</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-advancedmaterials' );
												
												if( $my_query == false ) {
													$args = array(
														'tag' => 'advancedmaterials',
														'posts_per_page' => 30,
														'no_found_rows' => true
														);
													$my_query = new WP_Query('$args');
													wp_cache_set( 'page-materials-query-advancedmaterials', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Advanced Materials (January 2012) -->

									<div class="cat" id="naturalmaterial">

										<div class="cat-naturalmaterial">

											<h2><a href="http://blog.makezine.com/tag/naturalmaterial/">Natural Materials </a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-naturalmaterial' );
												
												if( $my_query == false ) {
													$args = array(
														'tag' => 'naturalmaterial',
														'posts_per_page' => 30,
														'no_found_rows' => true
														);
													$my_query = new WP_Query('$args');													
													wp_cache_set( 'page-materials-query-naturalmaterial', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Natural Materials (March 2012) -->

									<div class="cat" id="concretematerial">

										<div class="cat-concretematerial">

											<h2><a href="http://blog.makezine.com/tag/concretematerial/">Concrete</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-concretematerial' );
												
												if( $my_query == false ) {
													
													$args = array(
														'tag' => 'concretematerial',
														'posts_per_page' => 30,
														'no_found_rows' => true
														);
													$my_query = new WP_Query('$args');
													wp_cache_set( 'page-materials-query-concretematerial', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!--Concrete Materials (April 2012) -->

									<div class="cat" id="reusedmat">

										<div class="cat-reusedmat">

											<h2><a href="http://blog.makezine.com/tag/reusedmat/">Reused Materials</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-reusedmat' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=reusedmat&posts_per_page=30');
													wp_cache_set( 'page-materials-query-reusedmat', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Reused Materials (May 2012) -->

									<div class="cat" id="ceramicsmat">

										<div class="cat-ceramicsmat">

											<h2><a href="http://blog.makezine.com/tag/ceramicsmat/">Ceramics</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-ceramicsmat' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=ceramicsmat&posts_per_page=30');
													wp_cache_set( 'page-materials-query-ceramicsmat', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Ceramic Materials (June 2012) -->

									<div class="cat" id="plywoodmat">

										<div class="cat-plywoodmat">

											<h2><a href="http://blog.makezine.com/tag/plywoodmat/">Plywood</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-plywoodmat' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=plywoodmat&posts_per_page=30');
													wp_cache_set( 'page-materials-query-plywoodmat', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Plywood Materials (July 2012) -->

									<div class="cat" id="metalmat">

										<div class="cat-metalmat">

											<h2><a href="http://blog.makezine.com/tag/metalmat/">Metals</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-metalmat' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=metalmat&posts_per_page=30');
													wp_cache_set( 'page-materials-query-metalmat', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Metal Materilas (August 2012) -->

									<div class="cat" id="castmat">

										<div class="cat-castmat">

											<h2><a href="http://blog.makezine.com/tag/castmat/">Casting Materials</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-castmat' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=castmat&posts_per_page=30');
													wp_cache_set( 'page-materials-query-castmat', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Casting Materials (October 2012) -->

									<div class="cat" id="papermat">

										<div class="cat-papermat">

											<h2><a href="http://blog.makezine.com/tag/papermat/">Paper</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-papermat' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=papermat&posts_per_page=30');
													wp_cache_set( 'page-materials-query-papermat', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Paper Materials (November 2012) -->


									<div class="cat" id="glassmat">

										<div class="cat-glassmat">

											<h2><a href="http://blog.makezine.com/tag/glassmat/">Glass</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'page-materials-query-glassmat' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=glassmat&posts_per_page=30');
													wp_cache_set( 'page-materials-query-glassmat', $my_query, '', 43200  );
												}
											
											?>
										
											<ul>
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Glass Materials (December 2012) -->
	
								
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