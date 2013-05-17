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
					    <h3>Have you ever wanted to:<br />Learn about Arduino? <br />Build a  weather monitoring site? <br />Build a marshmallow blaster to wow your neighbors?<br /> Learn what this making thing is all about? <br />But don’t know where to start? <br />Come learn with other makers like yourself.</h3>
				    </div> <!-- END home-intro -->

				</div> <!-- END span12 -->
			   </div> <!-- END row -->

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