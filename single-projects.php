<?php
/**
 * Single page template for projects custom post type.
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Jake Spurlock <jspurlock@makermedia.com>
 * 
 */
$steps = get_post_custom_values('Steps');
get_header(); ?>
		
	<div class="category-top">
	
		<div class="container">

			<div class="row">

				<div class="span12">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
						<article <?php post_class(); ?>>
						
							<div class="projects-masthead">
								
								<h3><a href="http://blog.makezine.com/projects/"></a>Make: Projects</h3>
							
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								
							</div>
							
							<ul class="projects-meta">
								<li>
									By <?php 
									if( function_exists( 'coauthors_posts_links' ) ) {	
										coauthors_posts_links(); 
									} else { 
										the_author_posts_link(); 
									} ?>
								</li>
								<li>
									Category: <?php the_category(', '); ?>
								</li>
								
									<?php
									$time = get_post_custom_values('TimeRequired');
									if ($time[0]) {
										echo '<li>Time Required: <span>' . esc_html( $time[0] ) . '</span></li>';
									}
									$terms = get_the_terms( $post->ID, 'difficulty' );
									if ($terms) {
										foreach ($terms as $term) {
											echo '<li>Difficulty: <span>' . esc_html( $term->name ) . '</span></li>';
										}
									}
									
									?>
							</ul>
									
							<div class="row">
							
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
										
								<div class="span4 sidebar">
								
									<div class="projects-ad">

										<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
										<div id='div-gpt-ad-664089004995786621-2'>
											<script type='text/javascript'>
												googletag.display('div-gpt-ad-664089004995786621-2');
											</script>
										</div>
										<!-- End AdSlot 2 -->

									</div>
								
									<div class="parts-tools">
										<ul class="top">
											<li class="active"><a href="#1" data-toggle="tab">Tools</a></li>
											<li class="divider"> / </li>
											<li><a href="#2" data-toggle="tab">Parts</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="1">
												<?php
													$terms = get_the_terms( $post->ID, 'tools' );
													if ($terms) {
														echo '<ul class="lists">';
														foreach ($terms as $term) {
															echo '<li><a href="'. esc_url( get_term_link( $term->slug, 'tools' ) ).'">'. esc_html( $term->name ) .'</a></li>';
														}
														echo '</ul>';
													}
												?>
											</div>
											<div class="tab-pane" id="2">
												<?php 
													$terms = get_the_terms( $post->ID, 'parts' );
													if ($terms) {
														echo '<ul class="lists">';
														foreach ($terms as $term) {
															echo '<li><a href="'.esc_url( get_term_link( $term->slug, 'parts' ) ).'">'. esc_html( $term->name ) .'</a></li>';
														}
														echo '</ul>';
													}
												?>
											</div>
										</div>
									</div>
								
								</div>
									
							</div>
							
							<div class="row">
							
								<div class="span12">
								
									<div class="top-steps">
										
										<div class="row">
											
											<div class="span11">
												
												<h3>Step by Step</h3>
												
											</div>
											
											<div class="span1">
												
												<span class="all"><a href="#target" class="scroll">View All</a></span>
												
											</div>
											
										</div>
									
										<?php make_projects_steps_nav( $steps ); ?>

									</div>
									
									<div class="bottom-steps" id="target">
									
										<div class="row">
										
											<div class="span8">
											
												<div class="tab-content">
										
													<?php make_projects_steps( $steps ); ?>
												
												</div>
												
											</div>
											
											<div class="span4">
											
												<!-- Beginning Sync AdSlot 3 for Ad unit sidebar ### size: [[300,250]]  -->
												<div id='div-gpt-ad-664089004995786621-3'>
													<script type='text/javascript'>
														googletag.display('div-gpt-ad-664089004995786621-3');
													</script>
												</div>
												<!-- End AdSlot 2 -->
												
												<div class="related-projects">
												
														<h3>Related Projects</h3>
												
														<?php
															$cat = wp_get_post_categories($post->ID);
															$args = array(
																'post_type'				=> 'projects', 
																'cat'			 		=> $cat[0],
																'posts_per_page' 		=> 8, 
																'orderby' 				=> 'rand', 
																'order' 				=> 'asc',
																);
															$the_query = new WP_Query( $args );
															
															while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
															
														<div <?php post_class( 'related' ); ?>>
															
															<div class="image">
																
																<?php
																	$args = array(
																		'image_scan' => true, 
																		'size' => 'related-thumb', 
																		'image_class' => 'hide-thumbnail', 
																		'default_image' => 'http://placekitten.com/98/55'
																		);
																	get_the_image( $args );
																?>
																
															</div>
															
															<div class="blurb">
																<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
																<p>By: <?php 
																		if( function_exists( 'coauthors_posts_links' ) ) {	
																			coauthors_posts_links(); 
																		} else { 
																			the_author_posts_link(); 
																		} 
																	?>
																</p>
															</div>
															
														</div>
														
														<div class="clearfix"></div>
															
														<?php endwhile; wp_reset_postdata(); ?>

													<div class="clearfix"></div>
													
													<div class="grad"></div>
													
												</div>
											
											</div>
											
										</div>
										
										<div class="row">
											
											<div class="span8">
												
												<?php 
													$conclusion = get_post_custom_values('Conclusion');
													if ( !empty( $conclusion[0] ) ) {
														echo '<div class="conclusion">';
														echo '<hr>';
														echo '<h4 class="heading conclusion">Conclusion</h4>';
														echo wp_kses_post( $conclusion[0] ) ;
														echo '</div>';
													}
													
												?>
												
											</div>
											
										</div>
										
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

			<?php get_footer(); ?>