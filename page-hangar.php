<?php
/**
 * Archive page template for projects custom post type.
 *
 * Template Name: Hangar
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
get_header(); ?>
		
	<div class="projects-home">
	
		<div class="container">
							
			<div class="row">
				
				<div class="span9">
					
					<h1>Maker Hangar</h1>
					
					<p>Lucas Weakley is a 17-year-old Eagle Scout who will be a senior next year in the Engineering and Manufacturing Institute for Technology (EMIT) at Forest High School in Ocala, Fla. He's been fascinated with making things ever since he was little and played around with Lego (he still does). As he got older, Lucas became more interested in flight and got his first RC plane for his ninth birthday. Recently he’s been designing and building his own planes and now hosts a YouTube show called BusyBee TV, a biweekly show where he does reviews, how-tos, scratch builds, and other things related with the hobby.</p>
					
					<p>Lucas also has his own aerial videography company called TopView Aerials, where he gets hired to film real estate, events, and other activities with his multicopters and other aerial vehicles. When he graduates high school, Lucas hopes to attend Embry-Riddle Aeronautical College to study mechanical engineering with an aviation emphasis. He hopes to design, build, and fly real planes in the future. </p>
					
				</div>
				
				<div class="span3">
					
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/lukas.jpg" alt="Lukas Weakley">
					
				</div>
			
			</div>
		
		</div>

	</div>
					
	<div class="grey content">

		<div class="container">
		
			<div class="row">
			
				<div class="span8">
					
					<?php
						$args = array(
							'post_type'			=> 'projects',
							'title'				=> 'Featured Projects',
							'limit'				=> 2,
							'tag'				=> 'Featured',
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
							'post_type'			=> 'video',
							'title'				=> 'Recent Videos',
							'projects_landing'	=> false,
							'all'				=> false,
							'playlist'			=> 'maker-hanger',
							'debug'				=> false
						);
						make_carousel($args);
					?>
					
				</div>
			
			</div>
		
		</div>
		
	</div>
				
</div>

<?php get_footer(); ?>