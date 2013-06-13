<?php
/**
 * Archive page template for projects custom post type.
 * Template name: Weekend Projects 2013
 * 
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
global $catslugs;
get_header(); ?>
		
	<div class="projects-home">
	
		<div class="container">

			<div class="row">

				<div class="span12">
				
					<img src="http://placekitten.com/940/320" alt="Placeholder" style="margin-bottom:20px;">
					
				</div>
				
			</div>
			
		</div>

	</div>
					
	<div class="grey">

		<div class="container">
		
			<div class="row">
			
				<div class="span12">
					
					<h3 class="heading">Featured Weekend Projects</h3>
					
				</div>
			
			</div>
			
			<div class="row">
			
				<div class="span8">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					<?php endif; ?>
					
				</div>
				
				<div class="span4">
				
					<img src="http://placekitten.com/300/250" alt="" style="margin-bottom:20px;">
					
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
							'title'				=> '<a href="http://blog.makezine.com/the-weekend-projects/">Current Weekend Projects</a>',
							'tax_query' => array(
								array(
									'taxonomy' => 'flags',
									'field' => 'slug',
									'terms' => 'weekend-project'
								)
							),
							'projects_landing'	=> true,
							'all'				=> true,
							'posts_per_page'	=> 36,
							'orderby'			=> 'date',
							'order'				=> 'asc'
						);

						make_carousel($args);
					?>
					
				</div>
			
			</div>
			
			<div class="row">
			
				<div class="span12">
				
					<?php 

						$args = array(
							'post_type'			=> 'post',
							'title'				=> 'Weekend Projects Blog Posts',
							'tag'				=> 'weekend-project',
							'projects_landing'	=> true,
							'all'				=> true,
							'posts_per_page'	=> 36,
							'orderby'			=> 'date',
							'order'				=> 'asc'
						);

						make_carousel($args);
					?>
					
				</div>
			
			</div>
			
			<div class="row">
			
				<div class="span12">
				
					
					
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