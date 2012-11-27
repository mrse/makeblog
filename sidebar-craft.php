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

							<form class="form-inline" action="http://makermedia.createsend.com/t/r/s/jjurhj/" method="post" id="subForm">
								<input type="text" name="cm-jjurhj-jjurhj" id="jjurhj-jjurhj" class="input" placeholder="Enter your email">
								<button type="submit" class="btn btn-danger">GO!</button>
							</form>


							<p><strong>Join the <span class="red">Craft:</span> newsletter and receive exclusive discounts and news!</strong></p>

						</div>

						<div class="categories">

							<div class="row">

								<div class="span2">

									<ul class="">
										<li><a href="http://blog.makezine.com/category/craft/crochet-craft/?parent=Craft">Crochet</a></li>
										<li><a href="http://blog.makezine.com/category/craft/cross-stitch/?parent=Craft">Cross-stitch</a></li>
										<li><a href="http://blog.makezine.com/category/craft/embroidery-craft/?parent=Craft">Embroidery</a></li>
										<li><a href="http://blog.makezine.com/category/craft/fashion-craft/?parent=Craft">Fashion</a></li>
										<li><a href="http://blog.makezine.com/category/craft/felting/?parent=Craft">Felting</a></li>
										<li><a href="http://blog.makezine.com/category/craft/jewelry-craft/?parent=Craft">Jewelry</a></li>
										<li><a href="http://blog.makezine.com/category/craft/knitting-craft/?parent=Craft">Knitting</a></li>
									</ul>

								</div>

								<div class="span2">

									<ul>										
										<li><a href="http://blog.makezine.com/category/craft/materials-supplies/?parent=Craft">Materials &amp; Supplies</a></li>
										<li><a href="http://blog.makezine.com/category/craft/paper-crafts/?parent=Craft">Paper Crafts</a></li>
										<li><a href="http://blog.makezine.com/category/craft/quilting-craft/?parent=Craft">Quilting</a></li>
										<li><a href="http://blog.makezine.com/category/craft/refashion/?parent=Craft">Refashion</a></li>
										<li><a href="http://blog.makezine.com/category/craft/sewing-craft/?parent=Craft">Sewing</a></li>
										<li><a href="http://blog.makezine.com/category/craft/weaving-craft/?parent=Craft">Weaving</a></li>
									</ul>

								</div>

							</div>

						</div>	

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
						
						<div class="sidebar-ad">

							<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
							<div id='div-gpt-ad-664089004995786621-3'>
								<script type='text/javascript'>
									googletag.display('div-gpt-ad-664089004995786621-3');
								</script>
							</div>
							<!-- End AdSlot 2 -->

						</div>

				</div>
