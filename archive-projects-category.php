<?php
/**
 * Archive page template for projects custom post type.
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
$cat = get_queried_object();
get_header(); ?>
		
	<div class="projects-home">
	
		<div class="art">
		
			<div class="container">

				<div class="row">

					<div class="span12">
					
						<div class="projects-top">
						
							<div class="row">
								
								<div class="span8">
									
									<h1><?php echo $cat->name; ?></h1>
									<h3>Make: Projects</h3>
							
									<?php 
										echo Markdown($cat->category_description);
										
										if ( make_pregnancy_check( $cat->cat_ID ) ) {
											echo '<h3>Find ' . $cat->name . ' Projects by Category:</h3>';
											echo '<ul class="subs">' . make_sub_category_list( $cat->slug, true ) . '</ul>';
										}
									?>
									
								</div>
								
								<div class="span4"></div>
								
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
							'post_type'			=> 'projects',
							'title'				=> 'Featured '. $cat->name .' Projects',
							'limit'				=> 2,
							'tag'				=> 'Featured',
							'projects_landing'	=> true,
							'all'				=> true,
							'category__in'		=> $cat->cat_ID
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
							'title'				=> 'New '. $cat->name .' Projects',
							'projects_landing'	=> true,
							'all'				=> true,
							'category__in'		=> $cat->cat_ID
						);
						
						make_carousel($args);
					?>
					
				</div>
			</div>
			
		</div>
		
	</div>
				
	<?php

		$difficulties = array('Easy', 'Moderate', 'Difficult' );

		if ($difficulties) {
			echo '<div class="grey dots topper"><div class="container"><div class="row"><div class="span12"><h2>' . $cat->name .' Projects by Difficulty</h2></div></div></div></div>';
			foreach ($difficulties as $difficulty) {
				$difficulty = wpcom_vip_get_term_by('name', $difficulty, 'difficulty');
				echo '<div class="grey"><div class="container"><div class="row"><div class="span12">';							
				$args = array(
					'post_type'			=> 'projects',
					'difficulty'		=> $difficulty->name,
					'title'				=> $difficulty->name,
					'projects_landing'	=> true,
					'all'				=> true,
					'category__in'		=> $cat->cat_ID
				);
				make_carousel( $args );
				echo '</div></div></div>';
			} 
		} 
	?>

</div>

	<?php get_footer(); ?>