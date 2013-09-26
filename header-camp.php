<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta charset="utf-8">
		<title><?php echo make_genenate_title_tag(); ?></title>
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
		<?php make_popdown_menu(); ?>
		<div class="fix">
			<div id="header">
                 		
				<div class="container">	
							<div class="clear"></div>
							<h1><a href="http://blog.makezine.com/trainingcamp/"><img style="margin:0 auto" src="http://makezineblog.files.wordpress.com/2013/05/maker-training-camp-hdr.gif" alt="Maker Training Camp" title="Maker Training Camp" /></a></h1>			
				</div> <!-- END container -->
			</div> <!-- END header -->

			<div class="header-bottom">
				<div class="container camp-main-nav">
					<div class="btn-group nav">
					    <a class="btn btn-large" href="http://blog.makezine.com/trainingcamp/">Home</a>
					    <!-- <a class="btn btn-large dropdown-toggle" data-toggle="dropdown" href="#">Sign Up for Camps <span class="caret"></span></a>
						    <ul class="dropdown-menu">
						    	<li><a href="http://makezine.com/trainingcamp/design-for-desktop-3d-printing/"> Design for Desktop 3D Printing</a></li>
						    </ul> -->
					    <!-- <a class="btn btn-large" href="http://makezine.com/trainingcamp/teach-camp/">Teach a Camp</a>
					    <a class="btn btn-large" href="http://makezine.com/trainingcamp/suggest-course/">Suggest Camp</a> -->
					    <a class="btn btn-large" href="http://makezine.com/trainingcamp/frequently-asked-questions/">FAQ</a>
				    </div>
				</div> <!-- END container -->
			</div> <!-- END header-bottom -->
		</div> <!-- END fix -->
