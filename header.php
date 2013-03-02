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

		<?php if ( is_page( array( 'home-page-include', 'home-page', 'home', 116357 ) ) ) : ?>

			<link rel="canonical" href="http://makezine.com/" />
			<link rel="alternate" type="application/rss+xml" title="RSS" href="http://feeds.feedburner.com/makezineonline" />

		<?php endif; ?>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<div class="pull-left">
						<ul class="nav">
							<li class="active"><a href="http://makezine.com">MAKE</a></li>
							<li class=""><a href="http://blog.makezine.com">Blog</a></li>
							<li class=""><a href="http://makezine.com/magazine">Magazine</a></li>
							<li class=""><a href="http://makerfaire.com">Maker Faire</a></li>
							<li class=""><a href="http://makeprojects.com">Make: Projects</a></li>
							<li class=""><a href="http://makershed.com">Maker Shed</a></li>
							<li class=""><a href="http://kits.makezine.com">Kits</a></li>
						</ul>
					</div>
					<div class="pull-right">
						<form action="http://blog.makezine.com/search/" class="form navbar-search">
							<input type="text" class="span2 search-query" name="q" placeholder="" />
							<input type="submit" class="btn btn-primary" style="height:28px" value="Search" />
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="topad">

			<div id='div-gpt-ad-664089004995786621-1'>
				<script type='text/javascript'>
					googletag.display('div-gpt-ad-664089004995786621-1');
				</script>
			</div>
			
		</div>
		
		<header>

			<div class="container">
				
				<div class="logo">
				
					<h1><a href="http://makezine.com/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new-logo.png" alt="MAKE" title="MAKE"></a></h1>
					
				</div>
				
				<?php 
				$top_menu = array(
					'theme_location'  => 'main_bar',
					'container'       => 'nav',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);
				
				$cat_menu = array(
					'theme_location'  => 'category_bar',
					'container'       => 'nav',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				); ?>

				
				<?php wp_nav_menu($top_menu); ?>
				<?php wp_nav_menu($cat_menu); ?>

				<?php echo make_house_ad(); ?>
								
			</div>
			
		</header>
