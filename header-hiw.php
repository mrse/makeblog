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
			<?php make_popdown_menu(); ?>
		</header>

		<div class="fix">
			<div id="header-area">      
				<div class="container">	
					<div class="row">
						<div class="span12 header-image">
							<h1><a href="http://makezine.com/hardware-innovation-workshop/"><img style="margin:0 auto" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hiw-hdr-01.png" alt="Hardware Innovation Workshop" title="Hardware Innovation Workshop" /></a></h1>
						</div> <!-- END span12 -->
					</div> <!-- END row -->	
				</div> <!-- END container -->		
				</div> <!-- END header -->
				<div class="clear"></div>
		</div> <!-- END fix -->
