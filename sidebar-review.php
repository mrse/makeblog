					<div class="span4 sidebar">

						<div class="sidebar-ad">

							<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
							<div id='div-gpt-ad-664089004995786621-2'>
								<script type='text/javascript'>
									googletag.display('div-gpt-ad-664089004995786621-2');
								</script>
							</div>
							<!-- End AdSlot 2 -->

						</div>

						<div class="blue-box">

							<h3>Get Free Exclusive Content!</h3>

							<form class="form-inline" action="http://makermedia.createsend.com/t/r/s/jjuylk/" method="post" id="subForm">
								<input type="text" name="cm-jjuylk-jjuylk" id="jjuylk-jjuylk" class="input" placeholder="Enter your email">
								<button type="submit" class="btn btn-danger">GO!</button>
							</form>


							<p><strong>Join the <span class="red">Make:</span> newsletter and receive exclusive discounts and news!</strong></p>

						</div>
						
						<?php 
							global $post;
							$meta = get_post_meta( get_the_ID(), 'hide' );
							if ('review' == get_post_type() && (empty($meta[0]) == 'on') ) { ?>

								<div class="drill side">

									<div class="inner">
								
										<h3>Narrow Your Search</h3>
										
										<ul id="sidebar">
										
											<?php if ( !function_exists('dynamic_sidebar')
													|| !dynamic_sidebar() ) : ?>
											<?php endif; ?>
										
										</ul>
										
									</div>

								</div>
								
						<?php } else { ?>
						
						<div class="categories">

							<div class="row">

								<div class="span2">

									<ul>
										<li><a href="http://blog.makezine.com/category/art-design/">Art &amp; Design</a></li>
										<li><a href="http://blog.makezine.com/category/computers-mobile/">Computers &amp; Mobile</a></li>
										<li><a href="http://blog.makezine.com/category/craft/">Craft</a></li>
										<li><a href="http://blog.makezine.com/category/desktop-manufacturing-2/">Desktop Manufacturing</a></li>
										<li><a href="http://blog.makezine.com/category/electronics/">Electronics</a></li>
										<li><a href="http://blog.makezine.com/category/energy/">Energy</a></li>
										<li><a href="http://blog.makezine.com/category/events-holidays/">Events &amp; Holidays</a></li>
										<li><a href="http://blog.makezine.com/category/flight-projectiles/">Flight &amp; Projectiles</a></li>
										<li><a href="http://blog.makezine.com/category/green/">Green</a></li>
										<li><a href="http://blog.makezine.com/category/home-and-garden/">Home &amp; Garden</a></li>
										
									</ul>

								</div>

								<div class="span2">

									<ul>
										<li><a href="http://blog.makezine.com/category/imaging/">Imaging</a></li>
										<li><a href="http://blog.makezine.com/category/kids-family/">Kids</a></li>
										<li><a href="http://blog.makezine.com/category/makers/">Makers</a></li>
										<li><a href="http://blog.makezine.com/category/microcontrollers-2/">Microcontrollers</a></li>
										<li><a href="http://blog.makezine.com/category/recreation-entertainment/">Recreation &amp; Entertainment</a></li>
										<li><a href="http://blog.makezine.com/category/robotics/">Robots</a></li>
										<li><a href="http://blog.makezine.com/category/science/">Science</a></li>
										<li><a href="http://blog.makezine.com/category/shop-craft/">Shop Craft</a></li>
										<li><a href="http://blog.makezine.com/category/toys_and_games/">Toys &amp; Games</a></li>
										<li><a href="http://blog.makezine.com/category/workshop-tools/">Workshops &amp; Tools</a></li>
										<li><a href="http://blog.makezine.com/category/vehicles-2/">Vehicles</a></li>
									</ul>

								</div>

							</div>

						</div>
						
						<?php } ?>

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

						<div class="tabbable content">
							<ul class="nav nav-pills">
								<li class="active"><a href="#1" data-toggle="tab">Trending</a></li>
								<li><a href="#2" data-toggle="tab">Shared</a></li>
								<li class=""><a href="#3" data-toggle="tab">Commented</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="1">
									<h3>// What's Trending</h3>
									<?php echo make_the_dash_shares_widget('realtime', 'Hits:', 8, 70); ?>
								</div>
								<div class="tab-pane" id="2">
									<h3>// What's Shared</h3>
									<?php echo make_the_dash_shares_widget('shares', 'Shares:', 8, 70); ?>
								</div>
								<div class="tab-pane" id="3">
									<h3>// Most Commented</h3>
									<?php echo make_most_commented_query(); ?>
								</div>
							</div>
						</div>

					</div>