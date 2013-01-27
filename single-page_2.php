<?php 
	$bio = get_post_custom_values('author_bio');
	$name = get_post_custom_values('author');
	$url = get_post_custom_values('author_website');
	$email = get_post_meta($post->ID, 'author_email', true);
	$size = 72;
	$link = get_post_custom_values('link');
?>

<?php get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<div class="content">


							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
								<article <?php post_class(); ?>>

									<!--<p class="categories"><?php the_category(', '); ?></p>-->

									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

									<p class="meta top">By <a href="<?php echo esc_url( $url[0] ); ?>"><?php echo esc_html( $name[0] ); ?></a>, <?php the_time('Y/m/d \@ g:i a') ?></p>

									<?php the_content(); ?>

									<?php make_makers(); ?>

									<div class="row">

										<div class="postmeta">

											<div class="span-thumb thumbnail">
											
												<?php echo get_avatar( $email, $size ); ?>
											
											</div>
											
											<div class="span-well well">
											
												<p>Posted by: <a href="<?php echo esc_url( $url[0] ); ?>"><?php echo esc_html( $name[0] ); ?></a> | <a href="<?php the_permalink(); ?>"><?php the_time('l F jS, Y g:i A'); ?></a></p>
												<?php 
													if (isset($bio[0])) {
														echo '<p>Bio: ';
														echo wp_kses_post( $bio[0] );
														echo '</p>';
													}
												?>
												<p>Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?> <?php edit_post_link('Fix me...', ' | '); ?></p>

											</div>

										</div>
										
									</div>
								
								</article>

							<?php endwhile; ?>
		
							<div class="breadcrumb">
								<div class="pull-left"><?php previous_post_link('&larr;&nbsp;%link'); ?></div>
								
								<div class="pull-right"><?php next_post_link('%link&nbsp;&rarr;'); ?> </div>
								
								<div class="clear"></div>
							</div>

							<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>
						
							<div class="comments">
								<?php comments_template(); ?>
							</div>
							
							<?php else: ?>
							
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
							<?php endif; ?>

						</div>

					</div>

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>