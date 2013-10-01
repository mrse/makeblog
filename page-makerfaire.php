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

									<?php echo do_shortcode('[custom-feed tag="maker-faire" design="simple" layout="2-col"]'); ?>
								</div>
							</div>
							<div class="span4 sidebar-content">
								
							</div>
						</div>
					</article>
					
				<div>
				
			</div>

		</div>

	</div>

<?php get_footer(); ?>