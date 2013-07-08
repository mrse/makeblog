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

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">;</script>
        <script src="<?php echo esc_url( get_template_directory_uri() . '/js/bootstrap.js' ); ?>"></script>
        <script src="<?php echo esc_url( get_template_directory_uri() . '/js/header.js' ); ?>"></script>

	</head>

	<body <?php body_class(); ?>>

		<header class="top-navigation-wrapper">
			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="logo span2">
							<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/make-logo.png" /></a>
						</div>
						<nav role="navigation" class="span10 site-navigation primary-navigation">
							<?php
								wp_nav_menu( array(
									'theme_location'  => 'make-primary', 
									'container'       => false, 
									'menu_class'      => 'nav menu-primary-nav clearfix',
								) );
							?>
						</nav>
						<div class="additional-content">
							<div class="subscribe dropdown clearfix">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Subscribe</a>
								<ul class="dropdown-menu">
									<li><a href="<?php home_url(); ?>/subscribe">Magazine</a></li>
									<li><a href="<?php home_url(); ?>/newsletter">Newsletter</a></li>
									<li><a href="<?php home_url(); ?>/feeds">RSS</a></li>
								</ul>
							</div>
							<form action="<?php echo home_url(); ?>/search/" class="search-make">
								<input type="text" class="search-field" name="q" placeholder="" />
								<input type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/search-btn.png" alt="Search" class="disabled" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="secondary-header">
				<div class="container">
					<div class="row">
						<nav class="span12 site-navigation secondary-navigation">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'make-secondary',
									'container'		 => false,
									'menu_class' 	 => 'nav menu-secondary-nav clearfix',
								) );
							?>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span12">

						<div class="content" id="content">
						
							<!-- Content will go here -->
						