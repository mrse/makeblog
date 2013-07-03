<?php 
/*
Template name: Header
*/
?>

<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>
		<meta name="description" content="<?php if ( is_single() ) {
				echo wp_trim_words(strip_shortcodes(get_the_excerpt('...')), 20);
			} else {
				bloginfo('name'); echo " - "; bloginfo('description');
			}
			?>" />

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php get_template_part('dfp'); ?>

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="http://1.gravatar.com/blavatar/dab43acfe30c0e28a023bb3b7a700440?s=14">
		<script type="text/javascript" src="https://use.typekit.com/fzm8sgx.js"></script>
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

		<?php if ( is_page( array( 'home-page-include', 'home-page', 'home', 116357 ) ) ) : ?>

			<link rel="canonical" href="http://makezine.com/" />
			<link rel="alternate" type="application/rss+xml" title="RSS" href="http://feeds.feedburner.com/makezineonline" />

		<?php endif; ?>

		<link rel="stylesheet" href="https://s0.wp.com/wp-content/themes/vip/makeblog/css/style.css">
		

	</head>

	<body <?php body_class(); ?>>

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

					<h1><a href="http://makezine.com/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/make.png" alt="MAKE" title="MAKE" /></a></h1>

					<ul class="navi">
						
						<li><a href="http://blog.makezine.com">Blog</a></li>
						<li class="active"><a href="http://makezine.com/magazine">Magazine</a></li>
						<li><a href="http://makeprojects.com">Projects</a></li>
						<li><a href="http://kits.makezine.com">Reviews</a></li>
						<li><a href="http://makershed.com">Shop</a></li>

					</ul>

				</div>

			</div>

			<div class="header-bottom">

				<div class="container">

					<div class="topics">

						<h5 class="blue">Hot&nbsp;Topics:</h5>

						<?php echo wp_kses_post( stripslashes( make_get_cap_option( 'hot_topics' ) ) ); ?>

					</div>

					<div class="pull-right">

						<a href="http://blog.makezine.com/topics"><img src="https://s0.wp.com/wp-content/themes/vip/makeblog/img/see_all_topics.png" alt="See All Topics" class="see pull-right" /></a><!--  -->

					</div>

				</div>

			</div>

		</div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span12">

						<div class="content" id="content">
						
							<!-- Content will go here -->

						