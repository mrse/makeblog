<?php
/**
 * Template Name: Maker Faire Landing Page
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Cole Geissinger <cgeissinger@makermedia.com>
 * 
 */
make_get_header() ?>
		
	<div class="makerfaire-lp flags">
	
		<div class="container">
									
			<div class="row">
			
				<div class="span12 mf-top">
				
					<article <?php post_class(); ?>>
						
						<div class="row-fluid">
							<div class="span4">
								<a href="http://makerfaire.com" target="_blank"><img src="http://makezineblog.files.wordpress.com/2013/09/maker-faire-logo.png" ></a>
							</div>
							<div class="span8 top-header">
								<div class="pull-right"><img src="http://s2.wp.com/wp-content/themes/vip/makerfaire/images/mr-makey.png" style="height:69px;"></div>
								<h3>A family-friendly festival of invention,<br />crativity, resourcefulness, and the maker movement</h3>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span8 main-content">
								<div class="slideshow-wrapper">
									<h3>Top 5 Attractions of World Maker Faire New York</h3>
									<?php echo do_shortcode('[new_gallery size="full" ids="328235,328234"]'); ?>

									<?php echo do_shortcode('[custom-feed count="8" tag="maker-faire" design="simple" layout="col-2"]'); ?>
								</div>
							</div>
							<div class="span4 sidebar-content">
							<a class="button big block" href="http://makefaire.com" target="_blank">Learn More</a>
								<div class="boxer">
									<h3>Innovation Stage</h3>
									<p>Ideas and Voices from the Maker Movement</p>
									<div class="preview-box">
										<a href="http://fora.tv/2013/09/22/the_maker_movement_manifesto" target="_blank">
											<img src="http://makezineblog.files.wordpress.com/2013/10/makerfaire-innovation-01.jpg" alt="Makerfaire New York 2013 Innovation Stage">
										</a>
										<h4><a href="http://fora.tv/2013/09/22/the_maker_movement_manifesto" target="_blank">The Maker Movement Manifesto</a></h4>
									</div>
									<div class="preview-box">
										<a href="http://fora.tv/2013/09/22/when_makers_apply_for_college" target="_blank">
											<img src="http://makezineblog.files.wordpress.com/2013/10/makerfaire-innovation-02.jpg" alt="Makerfaire New York 2013 Innovation Stage">
										</a>
										<h4><a href="http://fora.tv/2013/09/22/when_makers_apply_for_college" target="_blank">When Makers Apply for College</a></h4>
									</div>
									<div class="preview-box">
										<a href="http://fora.tv/2013/09/22/makernurse_the_stealth_ingenuity_of_inventive_nurses_in_america" target="_blank">
											<img src="http://makezineblog.files.wordpress.com/2013/10/makerfaire-innovation-03.jpg" alt="Makerfaire New York 2013 Innovation Stage">
										</a>
										<h4><a href="http://fora.tv/2013/09/22/makernurse_the_stealth_ingenuity_of_inventive_nurses_in_america" target="_blank">MakerNurse: The Stealth Ingenuity of Nurses</a></h4>
									</div>
									<p class="more-link"><a href="#" target="_blank">More Videos</a></p>
								</div>
								<div class="boxer">
									<h3>Live Stage</h3>
									<p>Conversations about Emerging Tech, New Practices &amp; Community</p>
									<div class="preview-box">
										<a href="http://www.youtube.com/watch?v=mXlmQ1ilpbs&feature=share" target="_blank">
											<img src="http://makezineblog.files.wordpress.com/2013/10/makerfaire-live-01.jpg" alt="Makerfaire New York 2013 Live Stage">
										</a>
										<h4><a href="http://www.youtube.com/watch?v=mXlmQ1ilpbs&feature=share" target="_blank">21st Century Robot: Meet Jimmy, the robot you can make at home</a></h4>
									</div>
									<div class="preview-box">
										<a href="http://www.youtube.com/watch?v=oTfHtaHDBtE&feature=share" target="_blank">
											<img src="http://makezineblog.files.wordpress.com/2013/10/makerfaire-live-02.jpg" alt="Makerfaire New York 2013 Live Stage">
										</a>
										<h4><a href="http://www.youtube.com/watch?v=oTfHtaHDBtE&feature=share" target="_blank">Maker Collaboration: The Air Rocket Glider</a></h4>
									</div>
									<div class="preview-box">
										<a href="http://www.youtube.com/watch?v=2YRdOHdMVCo&feature=share" target="_blank">
											<img src="http://makezineblog.files.wordpress.com/2013/10/makerfaire-live-03.jpg" alt="Makerfaire New York 2013 Live Stage">
										</a>
										<h4><a href="http://www.youtube.com/watch?v=2YRdOHdMVCo&feature=share" target="_blank">Make: Live 3D Design Practice</a></h4>
									</div>
									<p class="more-link"><a href="#" target="_blank">More Videos</a></p>	
							</div>
						</div>
					</article>
					
				<div>
				
			</div>

		</div>

	</div>

<?php get_footer(); ?>