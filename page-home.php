<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

		<div class="waist">

			<div class="container">

				<div class="row">

					<div class="span8">
					
						<style>	

							.drudge a:hover {
								text-decoration: underline !important;
							}

						</style>	

						<div class="checkers drudge" style="background-color:#fff; background-image:none;">

							<div class="row">

								<div class="span8" style="font-family:serif;">
									
									<h1 style="font-family:sans-serif;color:#cc2229;text-align:center;margin-bottom:10px;margin-top:10px;">+++ Breaking News +++</h1>
											
									<a href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">
										<img src="<? echo get_stylesheet_directory_uri(); ?>/img/AprilFools.jpg" alt="Mars Rover Finds Arrowhead" class="alignleft">
									</a>
											
									<h2 style="font-family:serif"><a href="<?php echo esc_url( get_permalink( 297352 ) ); ?>" style="color:#000;">Curiousity Rover scoops up Martian arrowhead</a></h2>
									<h3 style="font-family:serif"><a href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">Developing Story</a></h3>
									
									<div class="clearfix"></div>
									
									<hr>
									
									<ul class="unstyled" style="font-size:20px;font-weight:bold;marign-left:10px;">
										
										<li style="line-height:24px; margin-left:10px;"><a style="color:#000;" href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">> 8th Grader Recreates "Temple of Doom" in Family Basement</a></li>
										<li style="line-height:24px; margin-left:10px;"><a style="color:#000;" href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">> TechShop Competitor Offers Gym Equipment</a></li>
										<li style="line-height:24px; margin-left:10px;"><a style="color:#000;" href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">> Why Self-Replicating Machines Aren't Getting any Better</a></li>
										<li style="line-height:24px; margin-left:10px;"><a style="color:#000;" href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">> Two Crafters in Decade-long dispute Over Skull Pattern</a></li>
										<li style="line-height:24px; margin-left:10px;"><a style="color:#000;" href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">> New on Kickstarter: Spinnaret Device Shoots Webs Like Spiderman</a></li>
										
									</ul>
									
									<hr>
									
									<a href="<?php echo esc_url( get_permalink( 297352 ) ); ?>">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/orange.jpg" alt="Tang 2.0" class="alignleft" style="margin-left:10px;border:0px;">
									</a>
									
									<h3 style="color:#000;">Plus:</h3>
									<h3><a href="<?php echo esc_url( get_permalink( 297352 ) ); ?>" style="color:#0094ce"><span style="color:orange">Tang 2.0:</span> New Powder Creates Oranges In 3D Printers</a></h3>
									
									<div class="clearfix"></div>
									
								</div>
								
							</div>

						</div>
						
					</div>

					<div class="span4">

						<div class="home-ads">

							<!-- Beginning Sync AdSlot 1 for Ad unit header ### size: [[300,250]]  -->
							<div id='div-gpt-ad-664089004995786621-2'>
								<script type='text/javascript'>
									googletag.display('div-gpt-ad-664089004995786621-2');
								</script>
							</div>
							<!-- End AdSlot 1 -->

						</div>

						<div class="home-ads bottom">

							<!-- Beginning Sync AdSlot 1 for Ad unit header ### size: [[300,250]]  -->
							<div id='div-gpt-ad-664089004995786621-3'>
								<script type='text/javascript'>
									googletag.display('div-gpt-ad-664089004995786621-3');
								</script>
							</div>
							<!-- End AdSlot 1 -->

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="sand new-sand">

			<div class="container">

				<div class="row sub-banner">

					<div class="span12">

						<a href="https://www.pubservice.com/mk/subscribe.aspx?PC=MK&PK=M2A3DP4">
							<img src="<?php bloginfo('stylesheet_directory'); ?>/img/Make_3D-SIP_1112_940x39.png" alt="Subscribe to MAKE magazine" />
						</a>

					</div>

				</div>

				<div class="row">

					<div class="span12">

						<?php
							$cap_livestream = make_get_cap_option( 'livestream' );
							if ( $cap_livestream ) {
								echo '<div class="big-livestream">';
								echo do_shortcode('[gigya src="'.wp_kses_post( $cap_livestream ).'" width="940" height="529" quality="high" wmode="transparent" allowFullScreen="true" ]');
								echo '</div>';
							}; ?>

						</div>

					</div>

				<div class="row">

					<div class="span4 posts">

						<h3><a href="http://blog.makezine.com">Blog Feed</a></h3>	

						<?php 
							$args = array(
								'posts_per_page'  => 7,
								'no_found_rows' => true,
							);

							$the_query = new WP_Query( $args );
						?>

						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	
						<article <?php post_class(); ?>>
							
							<div class="entry-content">

								<a href="<?php the_permalink(); ?>">
									<?php get_the_image( array( 'image_scan' => true, 'size' => 'left-rail-home-thumb' ) ); ?>
								</a>

								<h4>
									<a href="<?php the_permalink(); ?>">
										<span class="arrows">&raquo;</span> <?php the_title(); ?>
										<span class="blurb">
											<?php echo wp_trim_words(strip_shortcodes( get_the_excerpt() ), 20, '...') ; ?>
										</span>
									</a>
								</h4>
							
							</div>
						
						</article>

						<?php endwhile; wp_reset_postdata(); ?>

						<p><a href="http://blog.makezine.com/"><span class="pull-right light aqua seeall right">See All Posts</span></a></p>

					</div>
					<!--<div class="shadow"></div>-->

					<div class="span8">

						<h3 class="red"><?php echo esc_html( make_get_cap_option( 'feature_heading' ) ); ?></h3>

						<div class="new-grid">

							<?php
							$cap_youtube = make_get_cap_option( 'youtube' );
							if ( $cap_youtube ) {
								echo '<div class="small-youtube">';
								echo do_shortcode('[youtube='. wp_kses_post( $cap_youtube ) .'&w=590&h=332]');
								echo '</div>';
							}; 
							?>

							<div class="clear"></div>
							
						</div>

						<div class="clear"></div>

						<div class="row">

							<div class="span4">

								<h3><a class="red" href="http://blog.makezine.com/tag/diy-projects/">New Projects</a></h3>

								<div class="grid-box boxy">

									<?php

										$args = array(
											'tag__in' => 70890180,
											'posts_per_page'  => 1,
											'no_found_rows' => true,
										);
										
										$proj_query = new WP_Query( $args );

										while ( $proj_query->have_posts() ) : $proj_query->the_post();
											echo '<a href="'.get_permalink().'">';
											the_post_thumbnail('small-home-feature-boxes');
											echo '<h4>' . wp_trim_words((get_the_title()),8) . '</h4>';
											echo '<p>'.wp_trim_words( strip_shortcodes( get_the_excerpt() ), 12 ).'</p>';
											echo '</a>';
										endwhile;

										// Reset Post Data
										wp_reset_postdata();

									?>

								</div>

							</div>


							<div class="span4">

								<div class="new-dotw">

									<?php
										
										$the_query = new WP_Query( 'post_type=from-the-maker-shed&posts_per_page=1' );

										while ( $the_query->have_posts() ) : $the_query->the_post();
											$ftms_link = get_post_custom_values( 'ftms_link' );
											if( !isset($ftms_link[0]) ){
												$ftms_link[0] = 'http://www.makershed.com/';
											}
											echo '<a href="'. esc_url( $ftms_link[0] ).'">';
											the_post_thumbnail('ftms-thumb');
											echo '</a>';
										endwhile;

										// Reset Post Data
										wp_reset_postdata();

									?>

								</div>

							</div>

						</div>

						<div class="row">

							<div class="span4">

								<h3 class="red"><a href="http://blog.makezine.com/?cat=296748" class="red">Meet the Makers</a></h3>

								<div class="grid-box boxy">

									<?php
										
										$args = array(
											'tag__in' => 296748,
											'tag__not_in' => array( 92075710, 22815 ),
											'posts_per_page'  => 1,
											'no_found_rows' => true,
										);
										

										$the_query = new WP_Query( $args );

										while ( $the_query->have_posts() ) : $the_query->the_post();
											echo '<a href="'.get_permalink().'">';
											the_post_thumbnail('small-home-feature-boxes');
											echo '<h4>' . wp_trim_words((get_the_title()),8) . '</h4>';
											echo '<p>'.wp_trim_words( strip_shortcodes( get_the_excerpt() ), 12 ).'</p>';
											echo '</a>';
										endwhile;

										// Reset Post Data
										wp_reset_postdata();

									?>

								</div>

							</div>


							<div class="span4">

								<h3 class="red"><a href="http://blog.makezine.com/tag/maker-faire/" class="red">Maker Faire News</a></h3>

								<div class="grid-box boxy">

									<?php
										
										$args = array(
											'tag_id' => 785128,
											'posts_per_page'  => 1,
											'no_found_rows' => true,
											'tag__not_in' => 22815
										);
										
										$the_query = new WP_Query( $args );

										while ( $the_query->have_posts() ) : $the_query->the_post();
											echo '<a href="'.get_permalink().'">';
											the_post_thumbnail('small-home-feature-boxes');
											echo '<h4>' . wp_trim_words((get_the_title()),8) . '</h4>';
											echo '<p>'.wp_trim_words( strip_shortcodes( get_the_excerpt() ), 12 ).'</p>';
											echo '</a>';
										endwhile;

										// Reset Post Data
										wp_reset_postdata();

									?>

								</div>

							</div>

						</div>

						<div class="row">

							<div class="span4">

								<h3 class="red"><a href="http://blog.makezine.com/tag/component-of-the-month/" class="red">Skill Builder</a></h3>

								<div class="grid-box boxy">

									<?php
										
										$args = array(
											'tag_id' => 115565268,
											'posts_per_page'  => 1,
											'no_found_rows' => true,
										);

										$the_query = new WP_Query( $args );

										while ( $the_query->have_posts() ) : $the_query->the_post();
											echo '<a href="'.get_permalink().'">';
											the_post_thumbnail('small-home-feature-boxes');
											echo '<h4>' . wp_trim_words((get_the_title()),8) . '</h4>';
											echo '<p>'.wp_trim_words( strip_shortcodes( get_the_excerpt() ), 12 ).'</p>';
											echo '</a>';
										endwhile;

										// Reset Post Data
										wp_reset_postdata();

									?>

								</div>

							</div>


							<div class="span4">

								<h3 class="red"><a href="http://blog.makezine.com/page-2/" class="red">Make: Page 2</a></h3>

								<div class="grid-box boxy">

									<?php
										
										$the_query = new WP_Query( 'post_type=page_2&posts_per_page=1' );

										while ( $the_query->have_posts() ) : $the_query->the_post();
											echo '<a href="'.get_permalink().'">';
											the_post_thumbnail('small-home-feature-boxes');
											echo '<h4>' . wp_trim_words((get_the_title()),8) . '</h4>';
											echo '<p>'.wp_trim_words( strip_shortcodes( get_the_excerpt() ), 12 ).'</p>';
											echo '</a>';
										endwhile;

										// Reset Post Data
										wp_reset_postdata();

									?>

								</div>

							</div>

						</div>
						
						<div class="row" style="margin-top:20px;margin-bottom:20px;">
							
							<div class="span4">
								
								<a href="http://pubads.g.doubleclick.net/gampad/clk?id=29552218&iu=/11548178/Makezine">
									
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/300x180.jpg" alt="Raspberry Pi Design Contest">
									
								</a>
								
							</div>
							
							<div class="span4">
								
								<a href="http://pubads.g.doubleclick.net/gampad/clk?id=29549218&iu=/11548178/Makezine">
									
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Homepage Graphic_300x180.jpg" alt="Road to Maker Faire Challenge">
									
								</a>
								
							</div>
							
						</div>
						
						<div class="row">
							<div class="span8">
								<a href="https://plus.google.com/communities/105413589856236995389">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Make_Forum_join_banner.jpg" alt="Join the +MAKE Forum">
								</a>
							</div>
						</div>


					</div>

				</div>

		<?php get_footer(); ?>