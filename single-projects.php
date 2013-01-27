<?php
/*
 * Template name: Project
 */

get_header(); ?>
		
		<div class="clear"></div>

		<div class="">

			<div class="container">

				<div class="row">

					<div class="span12">

						<div class="content">


							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
								<article <?php post_class(); ?>>

									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									
									<ul class="meta top unstyled">
										<li>
											By <?php 
											if( function_exists( 'coauthors_posts_links' ) ) {	
												coauthors_posts_links(); 
											} else { 
												the_author_posts_link(); 
											}
											?>
											| Category: <?php the_category(', '); ?>
										</li>
										<li>
											<?php
											$time = get_post_custom_values('TimeRequired');
											if ($time[0]) {
												echo 'Time Required: <strong>' . esc_html( $time[0] ) . '</strong>';
											}
											$terms = get_the_terms( $post->ID, 'difficulty' );
											if ($terms) {
												foreach ($terms as $term) {
													echo ' | Difficulty: <strong>' . esc_html( $term->name ) . '</strong>';
												}
											}
											$terms = get_the_terms( $post->ID, 'flags' );
											if ($terms) {
												foreach ($terms as $term) {
													echo ' | Flagged: <strong>' . esc_html( $term->name ) . '</strong>';
												}
											}
											
											?>
										</li>
									</ul>
									
									<div class="row-fluid">
									
										<div class="span8">

											<?php
												if (has_post_thumbnail()) {
													echo '<div class="post-image">';
														the_post_thumbnail('review-large');
													echo '</div>';
												} elseif ( $image = get_post_custom_values('Image') ) {
													echo '<img src="' . wpcom_vip_get_resized_remote_image_url( $image[0] , 598, 1000 ) . '" alt="' . esc_attr( the_title('', '', false ) ) . '" style="margin-bottom:20px;" />';
												}
											?>
											
											<?php the_content(); ?>
											
										</div>
										
										<div class="span4">
										
											<div class="projects-ad">

												<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
												<div id='div-gpt-ad-664089004995786621-2'>
													<script type='text/javascript'>
														googletag.display('div-gpt-ad-664089004995786621-2');
													</script>
												</div>
												<!-- End AdSlot 2 -->

											</div>
										
											<div class="well" style="max-width: 340px; padding: 8px 0;">
										
												<ul class="nav nav-list">
													<?php 
														$terms = get_the_terms( $post->ID, 'tools' );
														if ($terms) {
															echo '<li class="nav-header">Tools</li>';
															foreach ($terms as $term) {
																echo '<li><a href="'. esc_url( get_term_link( $term->slug, 'tools' ) ).'">'. esc_html( $term->name ) .'</a></li>';
															}
														}
														
														$terms = get_the_terms( $post->ID, 'parts' );
														if ($terms) {
															echo '<li class="nav-header">Parts</li>';
															foreach ($terms as $term) {
																echo '<li><a href="'.esc_url( get_term_link( $term->slug, 'parts' ) ).'">'. esc_html( $term->name ) .'</a></li>';
															}
														}
													?>
												</ul>
												
											</div>
											
										</div>
									
									</div>
									
									<div class="steps">
									
										<?php 
											$i = 0;
											$steps = get_post_custom_values('Steps');
											$steps = unserialize($steps[0]);

											foreach ($steps as $step) {
												echo '<div class="row-fluid project" id="' . esc_attr( $step->number ) . '">';
												echo '<div class="span6 big_images">';
													$images = $step->images;
													foreach ($images as $image) {
														echo '<img src="' . wpcom_vip_get_resized_remote_image_url( $image->text, 460, 1000 ) . '" alt="' . esc_attr( the_title('', '', false ) ) . '" class="thumbnail item' . esc_attr( $image->imageid ) . ' ' . esc_attr( $image->orderby ) .'" style="width:450px; margin-bottom:10px;" />';
													}
												echo '</div><!--.big_images-->';
												echo '<div class="span6 right_column">';
												$images = $step->images;
												echo '<div class="row-fluid">';
												$number = count($images);
												if ($number > 1) {
													$images = $step->images;
													foreach ($images as $image) {
														echo '<div class="span3" style="margin-right:20px;">';
														echo '<img src="' . wpcom_vip_get_resized_remote_image_url( $image->text, 80, 1000 ) . '" alt="' . esc_attr( the_title('', '', false ) ) . '" class="thumbnail item' . esc_attr( $image->imageid ) . ' ' . esc_attr( $image->orderby ) .'" />';
														echo '</div>';
													}
												}
												echo '</div>';

												$lines = $step->lines;
												echo '<h4 class="clear">Step #' . esc_html( $step->number ) . ' ' . esc_html( $step->title ) . '</h4>';
												echo '<ol>';
												foreach ($lines as $line) {
													echo '<li>';
													echo wp_kses_post( $line->text );
													echo '</li>';
													}
												echo '</ol>';
												echo '</div><!--.right_column-->';
												echo '<div class="clear"></div><!--.clear-->';
												echo '</div><!--.project - Step #' . esc_html( $step->number ) .'-->';
												if (++$i == 999) break;

											}
											echo '<div class="conclusion">';
											$conclusion = get_post_custom_values('Conclusion');
											echo wp_kses_post( $conclusion[0] ) ;
											echo '</div>';

											?>
										</div>
									
								
								</article>

							<?php endwhile; ?>

							<ul class="pager">
							
								<li class="previous"><?php previous_posts_link('&larr; Previous Page'); ?></li>
								<li class="next"><?php next_posts_link('Next Page &rarr;'); ?></li>
							
							</ul>

							<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>

							<div class="comments">
								<?php comments_template(); ?>
							</div>
							
							<?php else: ?>
							
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
							<?php endif; ?>

						</div>

					</div>

					<?php // get_sidebar('projects'); ?>

			<?php get_footer(); ?>