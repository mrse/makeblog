<?php
/**
 * Template Name: Holiday Gift Guide 2009
 */
get_header(); ?>

<h1>Make: Holiday Gift Guide 2009</h1>

	 <!-- begin content area -->

<a href="/holiday_guide/2009/"><img src="http://cdn.makezine.com/make/blogs/blog.makezine.com/MZ_WebBanner_HolidayGiftGuide.gif" alt="Make: Holiday Gift Guide 2009" border="0" /></a>

<!-- project page include -->
	<?php 

	query_posts( 'year=2009&category=Gift Guides' );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
		
		<p class="nfo">Posted by <?php the_author_posts_link(); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php the_time('l F jS, Y g:i A') ?> </p>
		<p class="nfo">Categories: <?php the_category(', ') ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>">Permalink</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="javascript:sendEntry();">Email</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>#comments">Comments (<?php comments_number('0', '1', '%'); ?>)</a> </p>

		<hr />

	 <?php endwhile; endif; ?>

<?php get_footer(); ?>