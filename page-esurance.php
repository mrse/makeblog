<?php
/**
 * Template Name: Esurance
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * 
 */
make_get_header() ?>
		
	<div class="single">
	
		<div class="container">

			<div class="row">

				<div class="span12">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				</div>
			
			</div>
			
			<div class="row">
				
				<div class="span8">
					
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/RASPBERRYPI_AD.jpg" alt="Raspberry Pi Design Contest">
					
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
			
			<div class="tabbable">
				
				<ul class="nav nav-tabs">
					<li class="active"><a href="#about" data-toggle="tab">About</a></li>
					<li class=""><a href="#prizes" data-toggle="tab">Prizes</a></li>
					<li class=""><a href="#gallery" data-toggle="tab">Gallery of Pi</a></li>
					<li class=""><a href="#rules" data-toggle="tab">Rules</a></li>
				</ul>
				
				<div class="tab-content">
					<div class="tab-pane active" id="about">
						
						<?php if ( function_exists( 'sharing_display') ) echo sharing_display(); ?> 
					
					</div>
					
					<div class="tab-pane" id="prizes">
						
						
						
					</div>
					
					<div class="tab-pane" id="rules">
					
						
						
					</div>
					
					<div class="tab-pane" id="gallery">
						
						
						
					</div>
				</div>
			</div>
									
			<div class="row">
			
				<div class="span12">
					
					<?php endwhile; ?>

					<?php else: ?>
					
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					
					<?php endif; ?>
				
				</div>
					
			</div>

		</div>

	</div>
	
<script>

	jQuery('a[data-toggle="tab"]').on('shown', function (e) {
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
	});

</script>

<?php get_footer(); ?>