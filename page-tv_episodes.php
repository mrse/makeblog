<?php
/**
 * Template Name: TV Episodes
 */
get_header(); ?>


<h1>TV Episodes</h1>

	<?php query_posts( 'posts_per_page=10&category_name=make_television' );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<b><a href="<?php the_permalink(); ?>#more">Read full story</a></b>
		
		<p class="nfo">Posted by <?php the_author_posts_link(); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php the_time('l F jS, Y g:i A') ?> </p>
		<p class="nfo">Categories: <?php the_category(', ') ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>">Permalink</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="javascript:sendEntry();">Email</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>#comments">Comments (<?php comments_number('0', '1', '%'); ?>)</a> </p>

		<hr />

	 <?php endwhile; endif; ?>

<?php get_footer(); ?>
