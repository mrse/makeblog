<?php
/**
 * Template Name: NYC Toy Fair 2009
 */
get_header(); ?>

<h1>MAKE @ The NYC Toy Fair 2009</h1>

<img alt="MAKE @ The NYC Toy Fair 2008." src="http://cdn.makezine.com/make/blogs/blog.makezine.com/toyfair2008.jpg" width="485" height="159" border="0" /><br>MAKE is @ The <a href="http://www.toyassociation.org/AM/Template.cfm?Section=Toy_Fair">NYC Toy Fair 2009</a> - thousands of toy makers come here each year to show off their latest - our lens on this show is a lot different than any coverage you'll see anywhere else - stay tuned for posts, images and videos of unique MAKE-style products. DIY kits, science kits, engineering, weird and bizarre -- things you'll see no where else! We'll be reporting live over the next few days, come back early and come back often!<br><hr>

	<?php query_posts( 'tag=@toyfair2009&posts_per_page=10' );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
		
		<p class="nfo">Posted by <?php the_author_posts_link(); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php the_time('l F jS, Y g:i A') ?> </p>
		<p class="nfo">Categories: <?php the_category(', ') ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>">Permalink</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="javascript:sendEntry();">Email</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>#comments">Comments (<?php comments_number('0', '1', '%'); ?>)</a> </p>

		<hr />

	 <?php endwhile; endif; ?>

<?php get_footer(); ?>