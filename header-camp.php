<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php get_template_part('dfp'); ?>

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="http://1.gravatar.com/blavatar/dab43acfe30c0e28a023bb3b7a700440?s=14">
		<script type="text/javascript" src="http://use.typekit.com/fzm8sgx.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-51157-1']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

		</script>

		<?php wp_head(); ?>

	</head>
	<body <?php body_class('camp'); ?>>
		<div class="fix">
			<div id="header">
                     <div id="slideshow-wrapper">
							<div class="container">
								<div class="row">
									<div class="span">
										<div id="myCarousel" class="carousel slide">
											<div class="carousel-inner">	
												<div class="item active">
													<img src="" alt="" />
													<!-- <div class="carousel-caption">
														<h4>First Thumbnail label</h4>
														<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
													</div> -->
												</div><!-- END item active -->
											</div><!--END carousel-inner -->
											<!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a> -->
											<!-- <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> -->
										</div> <!-- END myCarousel carousel slide; -->
									</div> <!-- END span -->
								</div> <!-- END row -->
							</div>	<!-- END container -->
						</div> <!-- END slideshow-wrapper -->			
				
				<div class="container">	
							<div class="clear"></div>
							<h1><a href="http://blog.makezine.com/make-training-camp/"><img style="margin:0 auto" src="http://makezineblog.files.wordpress.com/2013/04/make-training-camp-hdr-01.jpg" alt="MAKE Training Camp" title="MAKE Training Camp" /></a></h1>			
				</div> <!-- END container -->
			</div> <!-- END header -->

			<div class="header-bottom">
				<div class="container camp-main-nav">

						<ul class="nav">
							<li class="active"><a href="http://blog.makezine.com/trainingcamp/">Home</a></li>
							<!-- <li><a href="/trainingcamp/descriptions">About</a></li>
							<li><a href="/trainingcamp/schedule">Schedule</a></li>
							<li><a href="/trainingcamp/pricing">Pricing</a></li>-->
							<li><a href="/trainingcamp/suggest-a-course">Suggest Course</a></li>
							<!--<li><a href="/trainingcamp/sign-up">Sign Up</a></li>-->
						</ul>

				</div> <!-- END container -->
			</div> <!-- END header-bottom -->
		</div> <!-- END fix -->
