<?php
/**
 * Maker Camp header template.
 *
 * @package    makeblog
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Cole Geissinger <cgeissinger@makermedia.com>
 * 
 */
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Maker Camp</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
	
		<!-- Le styles -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<?php wp_head( 'makercamp' ); ?>

		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/less/css/responsive.css">

	</head>
	<body <?php body_class( 'makercamp' ); ?>>
		<header>
			<!-- <div class="navbar navbar-blue navbar-fixed-top hidden-phone">
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
						<!-- </nav>
					</div>
				</div>
			</div> -->

			<div class="make-popdown">
				<div class="wrapper-container">
					<div class="container">
						<div class="row">
							<div class="span4 side-column">
								<span class="row-fluid">
									<img src="<?php echo get_template_directory_uri(); ?>/images/popdown-makebot.png" alt="" class="span4">
									<div class="span8 side-text">
										<p class="large-text">Where DIY professionals and hobbyists go to learn, create, and share<br /><a href="#">Subscribe to MAKE Magazine</a></p>
									</div>
								</span>
							</div>
							<nav class="span8 popdown-navigation">
								<ul class="first">
									<li><a href="#">Maker Shed</a></li>
									<li><a href="#">Maker Faire</a></li>
									<li><a href="#">Maker Camp</a></li>
									<li><a href="#">Training Camp</a></li>
									<li><a href="#">Hardware Innovation Workshop</a></li>
								</ul>
								<ul class="second">
									<li><a href="#">Projects</a></li>
									<li><a href="#">Features</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Videos</a></li>
									<li><a href="#">Reviews</a></li>
									<li><a href="#">Forums</a></li>
									<li><a href="#">Education</a></li>
								</ul>
								<ul class="last">
									<li><a href="#">Electronics</a></li>
									<li><a href="#">Workshop</a></li>
									<li><a href="#">Craft</a></li>
									<li><a href="#">Science</a></li>
									<li><a href="#">Home</a></li>
									<li><a href="#">Art &amp; Design</a></li>
									<li><a href="#">Maker Pro</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="menu-button">
					<a href="<?php echo home_url(); ?>" class="popdown-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/make-logo-popdown.png" /></a>
				</div>
			</div>

			<div class="black-bar hidden-phone">
				<div class="container">
					<?php
						// all Navigational items are controlled in Appearance > Menus : Maker Camp Nav
						wp_nav_menu( array(
							'theme_location' => 'mc-header-menu',
							'container' => '',
							'menu_class' => 'nav nav-inline pull-left',
						) );
					?>
				</div>
			</div>

			<div class="navbar black-bar visible-phone">
				<div class="navbar-inner">
					<div class="container">
						<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<a class="brand" href="http://makezine.com/maker-camp">Menu</a>
						<div class="nav-collapse in collapse">
							<?php
								// all Navigational items are controlled in Appearance > Menus : Maker Camp Nav
								wp_nav_menu( array(
									'theme_location' => 'mc-header-menu',
									'container' => '',
									'menu_class' => 'nav nav-inline pull-left',
								) );
							?>
						</div>
					</div>
				</div>
			</div>
		</header>

