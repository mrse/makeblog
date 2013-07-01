<?php 

/*
Template Name: Skill Builders
*/

global $catslugs;
get_header(); ?>
		
	<div class="content-type">
	
		<div class="container">

			<div class="row">

				<div class="span12">
				
					<div class="content-type-top">
					
						<div class="row">
							
							<div class="span12">
								
								<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
										
									<h1>Make: <?php the_title(); ?></h1>
										
									<?php the_content(); ?>

								<?php endwhile; endif; ?>
								
								<h3>Find Projects by Category:</h3>
								
								<ul class="subs">
									
									<?php echo make_category_li('true'); ?>		
									
								</ul>
								
							</div>
							
						</div>
					
					</div>
					
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
							'post_type'			=> 'magazine',
							'title'				=> 'Featured Projects',
							'limit'				=> 2,
							'tag'				=> 'features',
							'projects_landing'	=> true,
							'all'				=> true
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
							'post_type'			=> 'projects',
							'title'				=> 'New Projects',
							'projects_landing'	=> true,
							'all'				=> true,
						);
						
						make_carousel($args);
					?>
					
				</div>
			
			</div>
			
			<div class="row">
			
				<div class="span12">
				
					<?php 

						$args = array(
							'post_type'			=> 'projects',
							'title'				=> '<a href="http://blog.makezine.com/the-weekend-projects/">Weekend Projects</a>',
							'tax_query' => array(
								array(
									'taxonomy' => 'flags',
									'field' => 'slug',
									'terms' => 'weekend-project'
								)
							),
							'projects_landing'	=> true,
							'all'				=> true,
							'posts_per_page'	=> 36
						);

						make_carousel($args);
					?>
					
				</div>
			
			</div>
			
		</div>
		
	</div>
				
	<?php

		if ($catslugs) {
			echo '<div class="grey dots topper"><div class="container"><div class="row"><div class="span12"><h2>Projects by Category</h2></div></div></div></div>';
			foreach ($catslugs as $category) {
				$category = wpcom_vip_get_term_by('name', $category, 'category');
				echo '<div class="grey"><div class="container"><div class="row"><div class="span12">';							
				$args = array(
					'post_type'			=> 'projects',
					'category__in'		=> $category->term_id,
					'title'				=> $category->name,
					'projects_landing'	=> true,
					'all'				=> true

				);
				make_carousel( $args );
				echo '</div></div></div>';
			} 
		} 
	?>

</div>

	<?php get_footer(); ?>