<?php make_get_header() ?>
		
		<div class="clear"></div>

		<div style="background-color:white;">

			<div class="container">

				<div class="row">

					<div class="span12">

						<div class="">

							<div class="category-title">
							
								<h1 class="cat-title jumbo"><?php single_cat_title('', true); ?></h1>
								
								<div class="row">
								
									<div class="span4">
									
										<?php 

											print apply_filters( 'taxonomy-images-queried-term-image', '', array( 'after' => '</div>', 'before' => '<div id="taxonomy-image">', 'image_size' => 'full') );
										?>
									
									</div>


									<div class="span8">
									
										<?php

											$cat_ID = get_queried_object_id();

											echo Markdown( strip_tags( category_description() ) );

											$args = array(
												'type'                     => 'post',
												'child_of'                 => $cat_ID,
												'parent'                   => '',
												'orderby'                  => 'name',
												'order'                    => 'ASC',
												'hide_empty'               => 1,
												'hierarchical'             => 1,
												'exclude'                  => '',
												'include'                  => '',
												'number'                   => '',
												'taxonomy'                 => 'category',
												'pad_counts'               => false )
											;
											$categories = get_categories( $args );

										?>
										
										<ul class="nav nav-pills">
										
										<?php
											foreach ($categories as $category) {
												echo '<li><a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a></li>';
											}
										?>
										
										</ul>
										
									</div>
									
								</div>

							</div>
							
							<div class="row">
							
								<div class="span12">
								
									<?php 

										//print_r(get_queried_object());

										$args = array(
											'category__in'		=> get_queried_object_id(), // Likely the queried object ID
											'title'				=> 'New in ' . get_queried_object()->name
										);
										
										make_carousel($args);
									?>
									
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