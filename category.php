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
			
				<div class="span8">
					
					<?php
						$args = array(
							'category__in'	=> get_queried_object_id(), // Likely the queried object ID
							'title'			=> 'Featured ' . get_queried_object()->name,
							'limit'			=> 2,
							'tag'			=> 'Featured'
						);
						make_carousel( $args ); ?>
					
				</div>
				
				<div class="span4">
					
					<div class="sidebar-ad">

						<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
						<div id='div-gpt-ad-664089004995786621-2'>
							<script type='text/javascript'>
								googletag.display('div-gpt-ad-664089004995786621-2');
							</script>
						</div>
						<!-- End AdSlot 2 -->

					</div>
					
				</div>
				
			</div>
								
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
	
	<?php

		$children = make_children( get_queried_object_id() );
		if ($children) {
			foreach ($children as $child => $category) {

	?>
			
			
	
	
	<div class="grey child">
	
		<div class="container">

			<div class="row">
			
				<div class="span12">
			
					<h2>Latest in <?php echo $category->name; ?></h2>
				
				</div>
				
			</div>
			
			<div class="row">
			
				<div class="span6">
				
					<div class="video-box">
						
						<?php

							$args = array(
								'post_type'			=> 'video',
								'posts_per_page'	=> 1,
								'no_found_rows'		=> true,
								'cat'				=> $category->term_id,
								'orderby'			=> 'rand'
							);
							
							$the_query = new WP_Query( $args );

							while ( $the_query->have_posts() ) : $the_query->the_post();
								$link = get_post_custom_values( 'Link' , $post->ID );
								echo do_shortcode('[youtube='. esc_url( $link[0] ) .'&w=442]');
								the_title( '<h4>' . '<a href="' . get_permalink() . '">', '</a></h4>' );
								echo '<p>' . wp_trim_words( strip_shortcodes( $post->post_content ), 20, '...' ) . '</p>';
							endwhile;

							// Reset Post Data
							wp_reset_postdata();

						?>
						
						<div class="clearfix"></div>
						
					</div>
					
				</div>
				
				<div class="span6">
				
					
					<?php 
						$args = array(
							'title' 			=> 'Beginner ' . $category->name . ' Projects',
							'posts_per_page' 	=> 2,
							'post_type'			=> 'projects',
							'cat'				=> $category->term_id,
							'orderby' 			=> 'date',
							'order' 			=> 'dsc',
							//'tax_query' 		=> array( array( 'taxonomy' => 'difficulty', 'field' => 'slug', 'terms' => 'easy' ) )
							);
						make_post_loop($args); ?>
				
				</div>
				
			</div>
					
			<div class="row">
			
				<div class="span12">
				
					<?php 

						$args = array(
							'category__in'		=> $category->term_id,
							'title'				=> $category->name . ' Skill Builders'
						);
						
						make_carousel($args);
					?>
					
				</div>
			
			</div>
						
		</div>
		
	<?php } } ?>
				<?php get_footer();	?>