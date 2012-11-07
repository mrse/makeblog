<?php
/**
 * Template Name: Honda Power of Dreams
 */
get_header(); ?>


<h1>Honda Power of Dreams</h1>
<img alt="Sponsored by Honda." src="http://cdn.makezine.com/make/blogs/blog.makezine.com/sponsored_by_honda.gif" width="496" height="62" border="0" />

	<?php query_posts( 'tag=honda&posts_per_page=12' );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<b><a href="<?php the_permalink(); ?>#more">Read full story</a></b>
		
		<p class="nfo">Posted by <?php the_author_posts_link(); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php the_time('l F jS, Y g:i A') ?> </p>
		<p class="nfo">Categories: <?php the_category(', ') ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>">Permalink</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="javascript:sendEntry();">Email</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>#comments">Comments (<?php comments_number('0', '1', '%'); ?>)</a> </p>

		<hr />

	 <?php endwhile; endif; ?>

<?php get_footer(); ?>