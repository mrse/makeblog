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

			<div class="row" style="position:relative;">

				<?php if( has_term( 'Weekend Project', 'flags' ) ) : ?>
					<div style="position:absolute; right:0; top:-20px;">
						<a href="http://pubads.g.doubleclick.net/gampad/clk?id=42844138&amp;iu=/11548178/Makezine"><img src="<?php echo get_template_directory_uri(); ?>/images/weekend-projects-btn.png" title="Weekend Projects Powered by Radio Shack" /></a>
					</div>
				<?php endif; ?>

				<div class="span12">
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
						<article <?php post_class(); ?>>
						
							<div class="projects-masthead">
								
								<h3><a href="http://blog.makezine.com/projects/">Make: Projects</a></h3>
							
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								
								<?php 
									$desc = get_post_custom_values('Description');
									if (isset($desc[0])) {
										echo Markdown( wp_kses_post( $desc[0] ) );
									}
								?>
								
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
								<li>
							Comments <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0', '1', '%' ); ?></a>
						</li>
							</ul>
									
							<div class="row">
							
								<div class="span8">

									<?php 
							 			$image = get_post_custom_values('Image');
										if ( !empty( $image[0] ) ) {
											echo '<img src="' . wpcom_vip_get_resized_remote_image_url( make_projects_to_s3( $image[0] ), 620, 465 ) . '" alt="' . esc_attr( the_title('', '', false ) ) . '" />';
										}
									?>
									<?php the_content(); ?>
									
								</div>
										
								<div class="span4 sidebar">
								
									<div class="projects-ad">

										<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
										<div id='div-gpt-ad-664089004995786621-2'>
											<script type='text/javascript'>
												googletag.cmd.push(function(){googletag.display('div-gpt-ad-664089004995786621-2')});
											</script>
										</div>
										<!-- End AdSlot 2 -->

									</div>
								
									<?php 
										$old_parts = get_the_terms( $post->ID, 'parts' );
										$parts = get_post_meta( $post->ID , 'parts' );
										$old_tools = get_the_terms( $post->ID, 'tools' );
										$tools = get_post_meta( $post->ID, 'Tools' );

										if ( ! empty( $old_parts ) || ! empty( $parts ) || ! empty( $old_tools ) || ! empty( $tools ) ) {
									?>
								
									<div class="parts-tools">
										
										<ul class="top">
											<?php 
												if ( $parts || $old_parts ) {
													echo '<li class="active"><a href="#1" data-toggle="tab">Parts</a></li>';
												} 
												if ( ( $parts || $old_parts ) && ( $tools || $old_tools ) ) {
													echo '<li class="divider"> / </li>';
												}
												if ( $tools || $old_tools && ( ! empty( $old_parts ) || ! empty( $parts ) ) ) {
													echo '<li><a href="#2" data-toggle="tab">Tools</a></li>';
												} else {
													echo '<li class="active"><a href="#2" data-toggle="tab">Tools</a></li>';
												}
											?>
											
										</ul>
										<div class="tab-content">
											<?php
												if ( $parts ) {
													echo '<div class="tab-pane active" id="1">';
													echo make_projects_parts( $parts );
													echo '</div>';
												}

												// If our parts are empty, we want to default to tools
												if ( empty( $parts ) ) {
													echo '<div class="tab-pane active" id="2">';
												} else {
													echo '<div class="tab-pane" id="2">';
												}
												if ( $tools ) {
													echo make_projects_tools( $tools );
												}
												?>
											</div>
										</div>
									</div>
									
									<?php } ?>
								
								</div>
									
							</div>
							
							<?php 
								$stepscount = unserialize($steps[0]);
								if (!empty($stepscount)) {
							?>
							
							<div class="row">
							
								<div class="span12">
								
									<div class="row">
										
										<div class="span12">
											
											<h2 class="new-heading">Steps</h2>
											
										</div>
										
									</div>
									
									<div class="bottom-steps" id="target">
									
										<div class="row">
										
											<div class="span4">
											
												<?php make_projects_steps_list( $steps ); ?>
												
												
												<!-- Beginning Sync AdSlot 3 for Ad unit header ### size: [[300,250]]  -->
												<div id='div-gpt-ad-664089004995786621-3'>
													<script type='text/javascript'>
														googletag.display('div-gpt-ad-664089004995786621-3');
													</script>
												</div>
												<!-- End AdSlot 3 -->
											
											</div>
										
											<div class="span8">
											
												<div class="tab-content" id="steppers">
										
													<?php make_projects_steps( $steps ); ?>
												
												</div>
												
											</div>
											
										</div>
										
										
										<?php 
											$conclusion = get_post_custom_values('Conclusion');
											if ( !empty( $conclusion[0] ) ) {
										?>
										
										<div class="row">
											
											<div class="span8">
												
												<?php
													echo '<div class="conclusion">';
													echo '<h2 class="new-heading">Conclusion</h2>';
													echo wp_kses_post( $conclusion[0] ) ;
													echo '</div>';
												?>
												
											</div>
											
											<div class="span4">
												
												<div class="related-projects">
												
													<h3>Related Projects</h3>
											
													<?php
														$cat = get_the_category($post->ID);
														$objid = $cat[0]->term_id;
														$args = array(
															'post_type'				=> 'projects', 
															'cat'			 		=> $objid,
															'posts_per_page' 		=> 8,
															'order' 				=> 'asc',
															);
														$the_query = new WP_Query( $args );
														
														while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
														
													<div <?php post_class( 'related' ); ?>>
														
														<div class="image">
															
															<?php
																if (has_post_thumbnail()) {
																	echo '<div class="post-image">';
																		the_post_thumbnail('review-large');
																	echo '</div>';
																} elseif ( $image = get_post_custom_values('Image') ) {
																	$imageurl = $image[0] . '.medium';
																	echo '<img src="' . esc_url( $imageurl ) . '" alt="' . esc_attr( the_title('', '', false ) ) . '" style="margin-bottom:20px;" />';
																} else {
																	$args = array(
																		'image_scan' => true, 
																		'size' => 'related-thumb', 
																		'image_class' => 'hide-thumbnail', 
																		);
																	get_the_image( $args );
																}
															?>
															
														</div>
														
														<div class="blurb">
															<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
															<p>By: <?php 
																	if( function_exists( 'coauthors_posts_links' ) ) {	
																		coauthors(); 
																	} else { 
																		the_author_posts_link(); 
																	} 
																?>
															</p>
														</div>
														
													</div>
													
													<div class="clearfix"></div>
													
													<?php endwhile; wp_reset_postdata(); ?>
												
												</div>
 												
											</div>
											
										</div>
										
										<?php } ?>
										
									</div>
								
								</div>
							
							</div>
								
						</article>
							
					<?php } ?>

					<?php endwhile; ?>
					
							<div class="row">
								
								<div class="span8">

									<?php echo make_author_bio(); ?>
										
									<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>

									<div class="comments">
										<?php comments_template(); ?>
									</div>
									
									<?php else: ?>
									
										<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
									
									<?php endif; ?>	
									
								</div>
								
								<?php if (empty($stepscount)) { ?>
								
									<div class="span4" style="margin-top:20px;">
											
										<!-- Beginning Sync AdSlot 3 for Ad unit sidebar ### size: [[300,250]]  -->
										<div id='div-gpt-ad-664089004995786621-3'>
											<script type='text/javascript'>
												googletag.display('div-gpt-ad-664089004995786621-3');
											</script>
										</div>
										<!-- End AdSlot 3 -->
									
										<div class="related-projects">
									
											<h3>Related Projects</h3>
									
											<?php
												$cat = get_the_category($post->ID);
												$objid = $cat[0]->term_id;
												$args = array(
													'post_type'				=> 'projects', 
													'cat'			 		=> $objid,
													'posts_per_page' 		=> 8,
													'order' 				=> 'asc',
													);
												$the_query = new WP_Query( $args );
												
												while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
												
											<div <?php post_class( 'related' ); ?>>
												
												<div class="image">
													
													<?php
														if (has_post_thumbnail()) {
															echo '<div class="post-image">';
																the_post_thumbnail('review-large');
															echo '</div>';
														} elseif ( $image = get_post_custom_values('Image') ) {
															$imageurl = $image[0] . '.medium';
															echo '<img src="' . esc_url( $imageurl ) . '" alt="' . esc_attr( the_title('', '', false ) ) . '" style="margin-bottom:20px;" />';
														} else {
															$args = array(
																'image_scan' => true, 
																'size' => 'related-thumb', 
																'image_class' => 'hide-thumbnail', 
																);
															get_the_image( $args );
														}
													?>
													
												</div>
												
												<div class="blurb">
													
													<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
													<p>By: <?php 
															if( function_exists( 'coauthors_posts_links' ) ) {	
																coauthors(); 
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
										
									</div>
								
								</div>
								
								<?php } else {
									get_sidebar('projects');
								} ?>
								
							</div>

						</div>

					</div>

			<?php get_footer(); ?>