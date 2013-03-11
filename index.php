<?php get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<?php if (!is_home()) { ?>

							<ul class="breadcrumb">
			
								<?php if(class_exists('bcn_breadcrumb_trail')) {
									$breadcrumb_trail = new bcn_breadcrumb_trail;
									$breadcrumb_trail->opt['home_title'] = "Home";
									$breadcrumb_trail->opt['current_item_prefix'] = '<li class="current">';
									$breadcrumb_trail->opt['current_item_suffix'] = '</li>';
									$breadcrumb_trail->opt['separator'] = '<span class="divider">&nbsp;/&nbsp;</span>';
									$breadcrumb_trail->opt['home_prefix'] = '<li>';
									$breadcrumb_trail->opt['home_suffix'] = '</li>';
									$breadcrumb_trail->opt['max_title_length'] = 70;
									$breadcrumb_trail->fill();
									$breadcrumb_trail->display();
								} ?>
										
							</ul>

						<?php } ?>

						<div class="content" id="content">

						<?php
							if ( have_posts() ) :
								while ( have_posts() ) :
									the_post();
									get_template_part( 'content' );
								endwhile; ?>

								<ul class="pager">
							
									<li class="previous"><?php previous_posts_link('&larr; Previous Page'); ?></li>
									<li class="next"><?php next_posts_link('Next Page &rarr;'); ?></li>
								
								</ul>
							
							<?php else: ?>
							
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
							<?php endif; ?>

						</div>

						<div class="content">

							<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>

						</div>

					</div>

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>