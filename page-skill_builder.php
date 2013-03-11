<?php
/**
 * Template Name: Skill Builder
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

									<?php the_content(); ?>
									
									<div class="cat" id="robotskills">

										<div class="cat-robotskills">

											<h2><a href="http://blog.makezine.com/tag/robotskills/">Robotics</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'robotskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=robotskills&posts_per_page=30');
													wp_cache_set( 'robotskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Robots Skills -->

									<div class="cat" id="electronskills">

										<div class="cat-electronskills">

											<h2><a href="http://blog.makezine.com/tag/electronskills/">Electronics</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'electronskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=electronskills&posts_per_page=30');
													wp_cache_set( 'electronskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Electronics -->

									<div class="cat" id="woodskills">

										<div class="cat-woodskills">

											<h2><a href="http://blog.makezine.com/tag/woodskills/">Woodworking</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'woodskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=woodskills&posts_per_page=30');
													wp_cache_set( 'woodskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Wood Skills -->

									<div class="cat" id="machine">

										<div class="cat-machine">

											<h2><a href="http://blog.makezine.com/tag/machineskills/">Machining</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'machineskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=machineskills&posts_per_page=30');
													wp_cache_set( 'machineskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Machine Skills -->

									<div class="cat" id="metalskills">

										<div class="cat-metalskills">

											<h2><a href="http://blog.makezine.com/tag/metalskills/">Metalworking</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'metalskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=metalskills&posts_per_page=30');
													wp_cache_set( 'metalskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Metal Skills -->

									<div class="cat" id="mechanicskills">

										<div class="cat-mechanicskills">

											<h2><a href="http://blog.makezine.com/tag/mechanicskills/">Mechanics</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'mechanicskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=mechanicskills&posts_per_page=30');
													wp_cache_set( 'mechanicskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Mechanic Skills -->

									<div class="cat" id="photoskills">

										<div class="cat-photoskills">

											<h2><a href="http://blog.makezine.com/tag/photoskills/">Photography &amp; Video</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'photoskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=photoskills&posts_per_page=30');
													wp_cache_set( 'photoskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Photo Skills -->

									<div class="cat" id="foodskills">

										<div class="cat-foodskills">

											<h2><a href="http://blog.makezine.com/tag/foodskills/">Food</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'foodskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=foodskills&posts_per_page=30');
													wp_cache_set( 'foodskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Food Skills -->

									<div class="cat" id="bikeshop">

										<div class="cat-bikeshop">

											<h2><a href="http://blog.makezine.com/tag/bikeshop/">Bikes</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'bikeshop' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=bikeshop&posts_per_page=30');
													wp_cache_set( 'bikeshop', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Bike Skills -->


									<div class="cat" id="hobby">

										<div class="cat-hobby">

											<h2><a href="http://blog.makezine.com/tag/hobbyskills/">Hobby</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'hobbyskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=hobbyskills&posts_per_page=30');
													wp_cache_set( 'machineskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Hobby Skills -->

									<div class="cat" id="plasticskills">

										<div class="cat-plasticskills">

											<h2><a href="http://blog.makezine.com/tag/plasticskills/">Plastics</a></h2>

											<?php 
											
												$my_query = wp_cache_get( 'plasticskills' );
												
												if( $my_query == false ) {
													$my_query = new WP_Query('tag=plasticskills&posts_per_page=30');
													wp_cache_set( 'plasticskills', $my_query, '', 43200  );
												}
											
											?>
										
											<ul class="drop-down">
										
												<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
											
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												
											
											<?php endwhile; ?>
											
											</ul>

										</div>

									</div><!-- Plastic Skills -->

									

									

									

									

									

									

									
								
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