<!DOCTYPE html>
<html lang="en" xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta charset="utf-8">
		<title><?php echo make_generate_title_tag(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="http://1.gravatar.com/blavatar/dab43acfe30c0e28a023bb3b7a700440?s=14">

		<?php wp_head(); ?>

		<?php get_template_part('dfp'); ?>

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
							<h1><a href="http://makezine.com/hardware-innovation-workshop/2013-new-york-event/tickets/"><img style="margin:0 auto" src="<?php echo get_stylesheet_directory_uri(); ?>/images/HIW_EventBrite_WebHeader_NY13_GE.jpg" alt="Hardware Innovation Workshop - New York Hall of Science - Queens, New York -September 18, 2013" title="Hardware Innovation Workshop - New York Hall of Science - Queens, New York -September 18, 2013" /></a></h1>
						</div> <!-- END span12 -->
					</div> <!-- END row -->	
				</div> <!-- END container -->		
				</div> <!-- END header -->
				<div class="clear"></div>
		</div> <!-- END fix -->
