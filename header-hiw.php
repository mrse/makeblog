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
	<body <?php body_class('hiw'); ?>>

		<header>
			<div class="navbar navbar-blue navbar-fixed-top">
					<div class="navbar-inner">
						<nav class="container">
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<a class="brand" href="http://makezine.com/">MAKE</a>
							<div class="nav-collapse in collapse">
								<?php wp_nav_menu( array(
									'theme_location'  => 'topbar',
									'menu'            => 'topbar', 
									'container'       => false, 
									'menu_class'      => 'nav clearfix',
									'depth'           => 1 ) );
								?>
								<form action="http://makezine.com/search/" class="form pull-right navbar-search">
									<input type="text" class="span2 search-query" name="q" placeholder="" />
									<input type="submit" class="btn btn-primary" style="margin-top:0px;" value="Search" />
								</form>
							</div><!--/.nav-collapse -->
						</nav>
					</div>
				</div>
			</div>
		</header>

		<div class="fix">
			<div id="header">      
				<div class="container">	
					<div class="row">
						<div class="span12">
							<div class="clear"></div>
							<h1><img style="margin:0 auto" src="http://makezineblog.files.wordpress.com/2013/06/hiw_eventbrite_webheader_ny13.jpg?w=940" alt="Hardware Innovation Workshop - New York Hall of Science - Queens, New York -September 18, 2013" title="Hardware Innovation Workshop - New York Hall of Science - Queens, New York -September 18, 2013" /></a></h1>
						</div> <!-- END span12 -->
					</div> <!-- END row -->	
				</div> <!-- END container -->		
				</div> <!-- END header -->
					<div class="container">	
							<div class="header-wrap">
								<h2>Thanks to all our great sponsors, presenters, and attendees for making the 2013 Hardware Innovation Workshop a success!</h2> 
								<a href="http://www.foliomag.com/2013/make-magazine-s-hardware-innovation-workshop" target="_blank"><img style="pull-right" src="http://makezineblog.files.wordpress.com/2013/03/pastedgraphic-1.jpg" alt="2012 Event received FAME award for Best First Time Event"></a>
						</div> <!-- END header-wrap -->
				</div> <!-- END container -->
				<div class="clear"></div>
		</div> <!-- END fix -->
