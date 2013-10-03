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
						
						<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>

					</article>
					
				<div>
				
			</div>

		</div>

	</div>

<?php get_footer(); ?>