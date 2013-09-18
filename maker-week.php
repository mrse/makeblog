<div class="maker-week-takeover">

	<div class="container">

		<div class="row">

			<div class="span12">

				<div class="maker-week">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/maker-week.png" alt="Maker Week">

				</div>

			</div>

			<div class="span8">

				<div class="slider">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/makey.png" class="makey" alt="Mr. Makey">
					<h3>Come See The Greatest Show and Tell on Earth &raquo;</h3>
					<div class="clearfix"></div>

					<?php

					$args = array(
						'post_type' => array( 'post', 'craft', 'magazine', 'video', 'projects' ),
						'post_status' => 'publish',
						'posts_per_page' => 7,
						'ignore_sticky_posts' => 1,
						'tag' => 'mf-featured'
					);
					
					$query = new WP_Query($args);
				
					if( $query->have_posts() ) : $i = 1; ?>

						<div class="carousel slide maker-week-carousel" id="myCarousel" data-interval="2000">

							<div class="carousel-inner">

							<?php while ( $query->have_posts() ) : $query->the_post(); ?>

								<div class="item<?php echo ( $i == 1 ) ? ' active' : ''; ?>">

									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'maker-week-home' ); ?>
									</a>

									<?php the_title( '<h4><a href="' . get_permalink() . '">', '</a></h4>' ); ?>

								</div>

							<?php $i++; endwhile; ?>

							</div>
							<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  							<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>

						</div>

					<?php endif; ?>

					<script type="text/javascript" charset="utf-8">
						jQuery('#myCarousel').carousel( {
							 interval: 5000
							}
						);
					</script>

				</div>
				
			</div>

			<?php 
				$featuredposts = make_get_cap_option( 'make_week_takeover_posts' );
				$posts = array_map( 'get_post', explode( ',', $featuredposts ) );
				$output = '<div class="span4">';
				foreach ( $posts as $post ) {
					$output .= '<div class="thumb slider">';
					$output .= '<a href="' . get_permalink() . '">';
					$output .= get_the_image( array( 'image_scan' => true, 'size' => 'featured-thumb', 'image_class' => 'hide-thumbnail pull-left', 'echo' => false ) );
					$output .= '</a>';
					$output .= '<div class="">';
					$output .= '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
					$output .= Markdown( wp_trim_words( get_the_excerpt(), 7, '...' ) );
					$output .= '<div class="clearfix"></div></div></div>';
				}
				$output .= '</div>';
				echo $output;
			?>

		</div>
		
		

	</div>

</div>

