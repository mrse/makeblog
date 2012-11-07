<?php

/*
/* Template Name: Make: Live
*/

?>


		
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				
	<?php the_content('Read the Full Story'); ?>

	<?php endwhile; ?>

<?php  else: ?>

	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>