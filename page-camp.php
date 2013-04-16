<?php
/**
 * Template Name: Camp Home Page Template
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Bill Olson <bolson@makermedia.com>
 * 
 */
?>

<?php get_header('camp'); ?>
		
	<div class="single">
	
		<div class="container">

			<div class="row">
				<div class="span12">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
				</div> <!-- END span12 -->		
			</div> <!-- END row -->

			<div class="row">		
				<div class="span12">
					<div class="home-intro">
					    <h3>Have you ever wanted to: Learn about Arduino? Build a weather monitoring site? Build a marshmallow blaster to wow your neighbors? Learn what this making thing is all about?
But don’t know where to start? Come learn with other makers like yourself.</h3>
				    </div> <!-- END home-intro -->

				</div> <!-- END span12 -->
			   </div> <!-- END row -->

			</div> <!-- END container -->

			<div class="camp-newsletter-wrap">

				<div class="container">   	

					<div class="row">
					
						<div class="span4">

							<h2>SIGN UP TODAY!</h2>
							<h3>Some other text here looks really nice</h3>

							</h2>

						</div> <!-- END span4 -->	

						<div class="span8">

							<div class="input-append">
								<input class="span4" id="appendedInput" type="text" value="Enter your email" onfocus="value=''">
								<span class="add-on">JOIN</span>
							</div>	<!-- END input-append -->	

						</div> <!-- END span8 -->	
 
					</div> <!-- END row -->	

				</div> <!-- container -->	

			</div> <!-- END camp-newsletter-wrap -->	
				
		<div class="container">

			<div class="row">
			
				<div class="span12">
				
					<article <?php post_class(); ?>>

						<?php the_content(); ?>
					
					</article>
					
					<?php endwhile; ?>
					
					<?php else: ?>
					
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					
					<?php endif; ?>
				</div> <!-- END span12 -->				
					
			</div> <!-- END row -->	

		</div> <!-- END container -->	

	</div> <!-- END single -->	

<?php get_footer('camp'); ?>