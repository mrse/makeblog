<?php make_get_header() ?>
		

	<div class="category-top">

		<div class="container">
		
			<div class="row">
			
				<div class="span4">
				
					<?php print apply_filters( 'taxonomy-images-queried-term-image', '', array( 'after' => '</div>', 'before' => '<div id="taxonomy-image">', 'image_size' => 'full') ); ?>
				
				</div>


				<div class="span8">
				
					<h1 class="jumbo"><?php single_cat_title('', true); ?></h1>
				
					<?php echo Markdown( strip_tags( category_description() ) ); ?>
					
					<?php make_child_category_list(); ?>
					
				</div>
				
			</div>
		
		</div>

	</div>
	
	<div class="grey">
	
		<div class="container">
								
			<div class="row">
			
				<div class="span12">
				
					<?php 

						$args = array(
							'category__in'		=> get_queried_object_id(), // Likely the queried object ID
							'title'				=> 'New in ' . get_queried_object()->name
						);
						
						make_carousel($args);
					?>
					
				</div>
			</div>
			
		</div>
		
	</div>
							
							
							<!-- Getting Started Section -->

							<div class="row">
							
								<div class="span6">
								
									<h4>Getting Started</h4>
									
									<?php

										$args = array(
											'post_type'			=> 'video',
											'posts_per_page'  	=> 1,
											'no_found_rows' 	=> true,
											'cat' 				=> get_queried_object_id()
										);
										
										$the_query = new WP_Query( $args );

										while ( $the_query->have_posts() ) : $the_query->the_post();
											$link = get_post_custom_values( 'Link' );
											echo do_shortcode('[youtube='. esc_url( $link[0] ) .'&w=460]');
										endwhile;

										// Reset Post Data
										wp_reset_postdata();

									?>
									
								</div>
								
								<div class="span6">
								
									
									<?php 
										$args = array(
											'title' 			=> 'Beginner ' . get_cat_name( get_queried_object_id() ) . ' Projects',
											'posts_per_page' 	=> 2,
											'orderby' 			=> 'date',
											'order' 			=> 'dsc',
											'tax_query' 		=> array( array( 'taxonomy' => 'difficulty', 'field' => 'slug', 'terms' => 'easy' ) )
											);
										make_post_loop($args); ?>
								
								</div>
								
							</div>
									
							<div class="row">
							
								<div class="span12">
								
									<?php 

										$args = array(
											'category__in'		=> get_queried_object_id(),
											'title'				=> 'Electronics Skill Builders'
										);
										
										make_carousel($args);
									?>
									
								</div>
							</div>
									
							
						</div>

					</div>
					
				</div>

				<?php get_footer();	?>