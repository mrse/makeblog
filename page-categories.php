<?php 
/*
Template Name: Categories
*/
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

									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

									<div class="cat" id="ar">

										<div class="cat-art">

											<h2><a href="http://blog.makezine.com/category/art-design/">Art &amp; Design</a></h2>

											<div class="row">

												<div class="span2">

													<ul class="drop-down fix">
														<?php
								
															$categories = get_categories('orderby=name&order=ASC&child_of=2806');
															foreach($categories as $category) { 
																echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
															}

														?>
													</ul>

												</div>

											</div>


										</div>

									</div><!-- Art -->

									<div class="cat" id="computers">

										<div class="cat-computer" id="">

											<h2><a href="http://blog.makezine.com/category/computers-mobile/">Computers &amp; Mobile</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=91749252');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '?parent=ComputersMobile" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Computers & Mobile -->

									<div class="cat" id="crafts">

										<div class="cat-crafts" id="">

											<div class="taxonomy-image">
												<img src="http://makezineblog.files.wordpress.com/2012/09/kollabora.png" alt="kollabora" />
											</div>

											<h2><a href="http://blog.makezine.com/category/craft/">Crafts</a></h2>

											<ul class="drop-down">
												<li><a href='http://blog.makezine.com/category/craft/crochet-craft/?parent=Craft'>Crochet</a></li>
												<li><a href='http://blog.makezine.com/category/craft/cross-stitch/?parent=Craft'>Cross-stitch</a></li>
												<li><a href='http://blog.makezine.com/category/craft/embroidery-craft/?parent=Craft'>Embroidery</a></li>
												<li><a href='http://blog.makezine.com/category/craft/fashion-craft/?parent=Craft'>Fashion</a></li>
												<li><a href='http://blog.makezine.com/category/craft/felting/?parent=Craft'>Felting</a></li>
												<li><a href='http://blog.makezine.com/category/craft/jewelry-craft/?parent=Craft'>Jewelry</a></li>
												<li><a href='http://blog.makezine.com/category/craft/knitting-craft/?parent=Craft'>Knitting</a></li>
												<li><a href='http://blog.makezine.com/category/craft/materials-supplies/?parent=Craft'>Materials &amp; Supplies</a></li>
												<li><a href='http://blog.makezine.com/category/craft/paper-crafts/?parent=Craft'>Paper Crafts</a></li>
												<li><a href='http://blog.makezine.com/category/craft/quilting-craft/?parent=Craft'>Quilting</a></li>
												<li><a href='http://blog.makezine.com/category/craft/refashion/?parent=Craft'>Refashion</a></li>
												<li><a href='http://blog.makezine.com/category/craft/sewing-craft/?parent=Craft'>Sewing</a></li>
												<li><a href='http://blog.makezine.com/category/craft/weaving-craft/?parent=Craft'>Weaving</a></li>
											</ul>

										</div>

									</div><!-- Crafts -->

									<div class="cat" id="print">

										<div class="cat-print" id="">

											<h2><a href="http://blog.makezine.com/category/desktop-manufacturing-2/">Desktop Manufacturing</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=91916935');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Desktop Manufacturing -->

									<div class="cat" id="electronics">

										<div class="cat-electronics" id="">

											<div class="taxonomy-image">
												<img src="http://makezineblog.files.wordpress.com/2012/08/element141.png" alt="java" />
											</div>

											<h2><a href="http://blog.makezine.com/category/electronics/">Electronics</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=7334');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '?parent=Electronics" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Electronics -->

									<div class="cat" id="energy">

										<div class="cat-energy" id="">

											<h2><a href="http://blog.makezine.com/category/energy/">Energy</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=1212');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Energy -->

									<div class="cat" id="events">

										<div class="cat-events" id="">

											<h2><a href="http://blog.makezine.com/category/events-holidays/">Events &amp; Holidays</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=780075');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Events -->

									<div class="cat" id="flight">

										<div class="cat-flight" id="">

											<h2><a href="http://blog.makezine.com/category/flight-projectiles/">Flight &amp; Projectiles</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=92177229');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Flight -->

									<div class="cat" id="green">

										<div class="cat-green" id="">

											<h2><a href="http://blog.makezine.com/category/green/">Green</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=17997');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Green -->

									<div class="cat" id="home">

										<div class="cat-home" id="">

											<h2><a href="http://blog.makezine.com/category/home-and-garden/">Home &amp; Garden</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=23110');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Home & Garden -->

									<div class="cat" id="imaging">

										<div class="cat-imaging" id="">

											<h2><a href="http://blog.makezine.com/category/imaging/">Imaging</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=12009');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Imaging -->

									<div class="cat" id="kids">

										<div class="cat-kids" id="">

											<h2><a href="http://blog.makezine.com/category/kids-family/">Kids</a></h2>

											<ul class="drop-down">
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=129975');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '?parent=Kids" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>
											</ul>

										</div>

									</div><!-- Kids -->

									<div class="cat" id="makers">

										<div class="cat-makers">

											<h2><a href="http://blog.makezine.com/category/makers/">Makers</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=296748');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Makers -->

									<div class="cat" id="mic">

										<div class="cat-arduino">

											<h2><a href="http://blog.makezine.com/category/microcontrollers-2/">Microcontrollers</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=35834538');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Microcontrollers -->

									<div class="cat" id="recreation">

										<div class="cat-recreation">

											<h2><a href="http://blog.makezine.com/category/recreation-entertainment/">Recreation &amp; Entertainment</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=19104753');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Recreation &amp; Entertainment -->

									<div class="cat" id="robots">

										<div class="cat-robots">

											<h2><a href="http://blog.makezine.com/category/robotics/">Robots</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=13426');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Robots -->

									<div class="cat" id="science">

										<div class="cat-science">

											<h2><a href="http://blog.makezine.com/category/science/">Science</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=173');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Science -->

									<div class="cat" id="shop">

										<div class="cat-shop">

											<h2><a href="http://blog.makezine.com/category/shop-craft/">Shop Craft</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=3838002');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Shop Craft -->

									<div class="cat" id="toys">

										<div class="cat-toys">

											<h2><a href="http://blog.makezine.com/category/toys_and_games/">Toys &amp; Games</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=70890215');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Toys & Games -->

									<div class="cat" id="tools">

										<div class="cat-tools">

											<h2><a href="http://blog.makezine.com/category/workshop-tools/">Workshop &amp; Tools</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=13037183');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '?parent=WorkshopTools" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Workshop & Tools -->

									<div class="cat" id="vehicles">

										<div class="cat-vehicles">

											<h2><a href="http://blog.makezine.com/category/vehicles-2/">Vehicles</a></h2>

											<ul class="drop-down">
												
												<?php
						
													$categories = get_categories('orderby=name&order=ASC&child_of=36174050');
													foreach($categories as $category) { 
														echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li>';
													}

												?>

											</ul>


										</div>

									</div><!-- Vehicles -->
								
								</article>

							<?php endwhile; ?>

							<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>
						
							<?php else: ?>
							
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
							<?php endif; ?>

						</div>

					</div>

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>