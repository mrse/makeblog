<?php
/**
 * Template Name: Arduino-sin content
 */

get_header(); ?>

<script type="text/javascript">
   federated_media_section = "MZ_Adruino";
</script>

<style type="text/css">
#arduino-header { width:600px; background:#ee1c24 url('http://cdn.makezine.com/make/arduino/Make-Arduino_banner_tag_600x100.gif') no-repeat 5% 50%; color:#fff; font-weight:bold; text-align:right; height:100px; padding: 0px 10px;}
#arduino-feature-wrap { padding:10px; background-color:#dfdfdf;}
#arduino-feature-wrap h1 { text-transform:uppercase; font-size:14px;}
.arduino-feat-thumb { width:200px; float:left;padding-right:20px;}
.arduino-feat-thumb span { width:200px; overflow:hidden; display:block;}
#blog h2 a, #blog h2 a:visited  { font-size:14px; line-height:16px; color:#1797ff; text-decoration:none;}
#blog h2 a:active, #blog h2 a:hover { text-decoration:underline; color:#333;}
#blog h2.entry-title { margin-bottom: 0.5em;}
#arduino-nav-list { width:150px; float:left;}
#arduino-nav-list ul { margin:0px; padding:0px;}
#arduino-nav-list ul li { list-style-image:url('http://cdn.makezine.com/make/blogs/blog.makezine.com/images/buttons/arr_c2.gif'); list-style-position:inside; }

#more hr { margin-bottom:.5em;}

.arduino-section-head { background-color:#ee1c24; color:#fff; padding:3px 10px; margin:20px 0px;}
.arduino-section-head h1 { text-decoration:none; text-transform:uppercase; font-size:14px; padding:0px; margin:0px;}
.arduino-section-wrap { }
.arduino-section-left { margin-right:20px; }
.arduino-section-left, .arduino-section-right { width:295px; float:left; }
.arduino-section-left h4, .arduino-section-right h4 { margin-top:0px; }
.arduino-section-thumb { width:180px; float:left;padding-right:20px;}
.arduino-section-thumb img { width:180px; }
.arduino-section-thumb span { width:180px; max-height:100px; overflow:hidden; display:block; margin-bottom:20px;}


</style>

<div id="arduino-header"></div>
	
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>

<?php get_footer(); ?>