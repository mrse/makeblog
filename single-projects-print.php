<?php
/**
 * Single page template for printed projects.
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
								
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								
								<?php 
									$desc = get_post_custom_values('Description');
									if ( isset( $desc[0] ) ) {
										echo Markdown( wp_kses_post( $desc[0] ) );
									}
								?>
								
							</div>
							
							<ul class="projects-meta">
								<li>
									By <?php 
									if( function_exists( 'coauthors_posts_links' ) ) {	
										coauthors(); 
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
							
							<?php 
								$meta = get_post_meta( get_the_ID() );
								$parts = get_post_meta( get_the_ID(), 'parts' );
								$tools = get_post_meta( get_the_ID(), 'Tools' );
							?>
							
							<div class="row">
							
								<div class="span12">
								
									<table class="table table-striped table-bordered">
										
										<thead>
											
											<tr>
												<td><h3>Field</h3></td>
												<td><h3>Value</h3></td>
												
											</tr>
											
										</thead>
										<tfoot>
											
											<tr>
												<td><h3>Field</h3></td>
												<td><h3>Value</h3></td>
												
											</tr>
											
										</tfoot>
										<tbody>
											<tr>
												<td>Title</td>
												<td><?php the_title(); ?></td>
											</tr>
											<tr>
												<td>Hed</td>
												<td><?php echo $meta['Hed'][0]; ?></td>
											</tr>
											<tr>
												<td>Dek</td>
												<td><?php echo $meta['Dek'][0]; ?></td>
											</tr>
											<tr>
												<td>Byline</td>
												<td><?php echo $meta['Byline'][0]; ?></td>
											</tr>
											<tr>
												<td>Author</td>
												<td><?php coauthors(); ?></td>
											</tr>
											<tr>
												<td>Difficulty</td>
												<td><?php if ($terms) : foreach ($terms as $term) : echo esc_html( $term->name ); endforeach; endif;?></td>
											</tr>
											<tr>
												<td>Time Required</td>
												<td><?php echo $meta['TimeRequired'][0]; ?></td>
											</tr>
											<tr>
												<td>Body</td>
												<td><?php the_content(); ?></td>
											</tr>
											<tr>
												<td>Parts</td>
												<td><?php echo make_projects_parts( $parts ); ?></td>
											</tr>
											<tr>
												<td>Tools</td>
												<td><?php echo make_projects_tools( $tools ); ?></td>
											</tr>
											<tr>
												<td>Steps</td>
												<td><?php make_projects_steps( $steps, true ); ?></td>
											</tr>
											<tr>
												<td>Conclusion</td>
												<td><?php echo $meta['Conclusion'][0]; ?></td>
											</tr>
										</tbody>
										
									</table>
									
								</div>
										
							</div>
							
							<?php endwhile; wp_reset_postdata(); ?>
								
						</article>
							
									
						<?php else: ?>
						
							<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						
						<?php endif; ?>	
						
					</div>

			<?php get_footer(); ?>