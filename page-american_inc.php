<?php
/**
 * Template Name: American Maker Winner
 */
?>


	<?php query_posts( array( 'p' => 56981 ) );
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h2 style="border-bottom: 0px;"><a href="<?php the_permalink(); ?>" style="font-size: 15px; font-weight:bold;"><?php the_title(); ?></a></h2>
		<?php the_excerpt(); ?>
		<br /><b><a href="<?php the_permalink(); ?>">Read full story</a></b><br /><br />
		
		<p class="nfo">Posted by <?php the_author_posts_link(); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?php the_time('l F jS, Y g:i A') ?> </p>
		<p class="nfo">Categories: <?php the_category(', ') ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>">Permalink</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="javascript:sendEntry();">Email</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="<?php the_permalink(); ?>#comments">Comments (<?php comments_number('0', '1', '%'); ?>)</a> </p>
		
		<div style="margin-bottom: 12px; margin-top: 12px; border-top: 1px solid #ccc;" /></div>
	 <?php endwhile; endif; ?>