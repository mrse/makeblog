<?php
/**
 * Template Name: Esurance
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * 
 */
make_get_header() ?>
		
	<div class="single">
	
		<div class="container">

			<div class="row">
				
				<div class="span8">
					
					<img src="http://placekitten.com/620/250" alt="Road to Maker Faire Challenge">
					
				</div>
				
				<div class="span4">
					
					<div class="sidebar-ad">
					
						<!-- Beginning Sync AdSlot 2 for Ad unit header ### size: [[300,250]]  -->
						<div id='div-gpt-ad-664089004995786621-2'>
							<script type='text/javascript'>
								googletag.display('div-gpt-ad-664089004995786621-2');
							</script>
						</div>
						<!-- End AdSlot 2 -->

					</div>
					
				</div>
				
			</div>
			
			<div class="tabbable">
				
				<ul class="nav nav-tabs">
					<li class="active"><a href="#about" data-toggle="tab">About</a></li>
					<li class=""><a href="#enter" data-toggle="tab">Enter Now</a></li>
					<li class=""><a href="#entries" data-toggle="tab">View Entries</a></li>
					<li class=""><a href="#winners" data-toggle="tab">Previous Winners</a></li>
					<li class=""><a href="#rules" data-toggle="tab">Rules</a></li>
				</ul>
				
				<div class="tab-content">
					<div class="tab-pane active" id="about">
						
						<?php 
							if ( have_posts() ) : 
								while ( have_posts() ) : 
									the_post();
									the_content();
								endwhile;
							endif;
						?>
					
					</div>
					
					<div class="tab-pane" id="enter">
						
						<iframe src = "http://app.wizehive.com/webform/makermedia2013" scrolling="auto" frameborder="0" width="940px" height="2000px"></iframe>
						<p><a href="http://www.wizehive.com/photo-contest-software">Photo Contest Software</a> provided by WizeHive</p>
						
					</div>
					
					<div class="tab-pane" id="entries">
					
						<script src="http://app.wizehive.com/js/portaliframe.js" type="text/javascript"></script><script type="text/javascript">displayPortal('makermedia2013');</script>
						<p><a href="http://www.wizehive.com/photo-contest-software">Photo Contest Software</a> provided by WizeHive</p>
						
					</div>
					
					<div class="tab-pane" id="winners">
						
						
						
					</div>
					
					<div class="tab-pane" id="rules">
						
						
						
					</div>
					
				</div>
			</div>

		</div>

	</div>
	
<script>

	jQuery('a[data-toggle="tab"]').on('shown', function (e) {
		googletag.pubads().refresh();
		_gaq.push(['_trackPageview']);
	});

</script>

<?php get_footer(); ?>