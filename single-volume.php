<?php
/*
 * Template name: New Volume Page
 */

get_header(); ?>

	<div class="container" style="margin-top:24px;">
		<div class="row">
			<div class="span8 main-content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						 
					<?php 
						$video = get_post_custom_values( 'VideoURL' );
						if ( $video[0] ) { ?>
					
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

							<div class="row">
								<div class="span8">
									<div class="row">
									
										<?php 
											$video = get_post_custom_values( 'VideoURL' );
											if ( $video[0] ) {
												echo '<div class="span12">' . make_youtube_iframe( $video[0], 620, 345 ) . '</div>';
											}
										?>
										
									</div>
									<div class="row">
									
										<hr>

										<?php
											$featuredposts = get_post_custom_values( 'FeaturedPosts' );
											$posts = array_map( 'get_post', explode( ',', $featuredposts[0] ) );
											foreach ( $posts as $post ) { ?>
												<div class="span2">
													<a href="<?php echo get_permalink( $post->ID ); ?>">
														<?php echo get_the_post_thumbnail( $post->ID, 'new-thumb', array( 'class' => 'hide-thumbnail' ) ); ?>
														<?php echo get_the_title( $post->ID ); ?>
													</a>
												</div>
											
											<?php } 
											wp_reset_query();
										?>
										
									</div>
								</div>
								<div class="span4">
								
									<?php the_content(); ?>

								</div>
							</div>
							
						<?php } else { ?>
						
							<h1><span class="highlight">Magazine:</span> Volume 34</h1>
							<div class="row-fluid">
								<div class="span3">
									<a href="#"><img src="http://makezineblog.files.wordpress.com/2013/06/m35_cv1_volpage.jpg"></a>
								</div>
								<div class="span9 vol-description">
									<p><strong>Join the Robot Uprising!</strong> There’s never been a better time to delve into robotics, whether you’re a tinkerer or a more serious explorer. With the powerful tools and expertise now available, the next great leap in robot evolution is just as likely to come from your garage as a research lab. <a href="#" class="video-ico">Watch the highlights</a></p>
									<p><a href="#">Buy Volume 34</a> for complete access or <a href="#" class="button">Subscribe to MAKE and Save!</a></p>
								</div>
							</div>

						<?php }
				endwhile; endif; ?>

				<div class="row-fluid vol-content">
					<div class="span6">
						<div class="vol-columns">
							<h2>Columns</h2>
							<div class="volume-article">
								<div class="page-count">8</div>
								<div class="page-body">
									<h3><a href="#">Welcome: Join the Robot Uprising</a></h3>
									<p class="meta">By <a href="#">Gareth Branwyn</a></p>
									<p class="body-content">A maker’s persepctive of the changes in robotics.</p>
								</div>
							</div>
							<div class="volume-article">
								<div class="page-count">8</div>
								<div class="page-body">
									<h3><a href="#">Welcome: Join the Robot Uprising</a></h3>
									<p class="meta">By <a href="#">Gareth Branwyn</a></p>
									<p class="body-content">A maker’s persepctive of the changes in robotics.</p>
								</div>
							</div>
							<div class="volume-article">
								<div class="page-count">8</div>
								<div class="page-body">
									<h3><a href="#">Welcome: Join the Robot Uprising</a></h3>
									<p class="meta">By <a href="#">Gareth Branwyn</a></p>
									<p class="body-content">A maker’s persepctive of the changes in robotics.</p>
								</div>
							</div>
							<div class="volume-article">
								<div class="page-count">8</div>
								<div class="page-body">
									<h3><a href="#">Welcome: Join the Robot Uprising</a></h3>
									<p class="meta">By <a href="#">Gareth Branwyn</a></p>
									<p class="body-content">A maker’s persepctive of the changes in robotics.</p>
								</div>
							</div>
						</div>
						<div class="vol-reviews">
							<div class="toolbox">
								<div class="page-count">8</div>
								<h3 class="review-title">Toolbox</h3>
								<div class="row-fluid">
									<span class="span6">
										<a href="#"><img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt=""></a>
										<a href="#">Bosch 1575A Foam Rubber Cutter</a>
									</span>
									<span class="span6">
										<a href="#"><img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt=""></a>
										<a href="#">Bosch 1575A Foam Rubber Cutter</a>
									</span>
								</div>
								<ul>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
									<li><a href="#">Bosch 1575A Foam Rubber Cutter</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="vol-special-section">
							<h2>Special Section</h2>
							<div class="volume-article">
								<div class="feat-image">
									<div class="page-count">52</div>
									<img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt="">
								</div>
								<div class="page-body has-image">
									<h3><a href="#">The Accidental Maker</a></h3>
									<p class="meta">By <a href="#">David Lang</a></p>
									<p class="body-content">A pursuit of bandit gold leads to a differnt kind of treasure.</p>
									<p class="errata-link"><a href="#">Corrections &amp; Extras</a></p>
								</div>
							</div>
							<div class="volume-article">
								<div class="feat-image">
									<div class="page-count">52</div>
									<img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt="">
								</div>
								<div class="page-body has-image">
									<h3><a href="#">The Accidental Maker</a></h3>
									<p class="meta">By <a href="#">David Lang</a></p>
									<p class="body-content">A pursuit of bandit gold leads to a differnt kind of treasure.</p>
									<p class="errata-link"><a href="#">Corrections &amp; Extras</a></p>
								</div>
							</div>
							<div class="volume-article">
								<div class="feat-image">
									<div class="page-count">52</div>
									<img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt="">
								</div>
								<div class="page-body has-image">
									<h3><a href="#">The Accidental Maker</a></h3>
									<p class="meta">By <a href="#">David Lang</a></p>
									<p class="body-content">A pursuit of bandit gold leads to a differnt kind of treasure.</p>
									<p class="errata-link"><a href="#">Corrections &amp; Extras</a></p>
								</div>
							</div>
							<div class="volume-article">
								<div class="feat-image">
									<div class="page-count">52</div>
									<img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt="">
								</div>
								<div class="page-body has-image">
									<h3><a href="#">The Accidental Maker</a></h3>
									<p class="meta">By <a href="#">David Lang</a></p>
									<p class="body-content">A pursuit of bandit gold leads to a differnt kind of treasure.</p>
									<p class="errata-link"><a href="#">Corrections &amp; Extras</a></p>
								</div>
							</div>
							<div class="volume-article">
								<div class="feat-image">
									<div class="page-count">52</div>
									<img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt="">
								</div>
								<div class="page-body has-image">
									<h3><a href="#">The Accidental Maker</a></h3>
									<p class="meta">By <a href="#">David Lang</a></p>
									<p class="body-content">A pursuit of bandit gold leads to a differnt kind of treasure.</p>
									<p class="errata-link"><a href="#">Corrections &amp; Extras</a></p>
								</div>
							</div>
							<div class="volume-article">
								<div class="feat-image">
									<div class="page-count">52</div>
									<img src="http://localhost/wp-content/uploads/2013/07/test-image.jpg" alt="">
								</div>
								<div class="page-body has-image">
									<h3><a href="#">The Accidental Maker</a></h3>
									<p class="meta">By <a href="#">David Lang</a></p>
									<p class="body-content">A pursuit of bandit gold leads to a differnt kind of treasure.</p>
									<p class="errata-link"><a href="#">Corrections &amp; Extras</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>

<?php get_footer(); ?>