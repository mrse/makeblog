<?php
/**
 * @package MakeZine
 * Template Name: Make Projects include
 */
?>
<?php
$args=array(
  'category'=>'MAKE Projects',
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'ignore_sticky_posts'=> 1
);
$temp = $wp_query;  // assign orginal query to temp variable for later use   
$wp_query = null;
$wp_query = new WP_Query($args); 
?>

<?php
  if( have_posts() ) : 
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<p>
<div class="instlist">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
<?php the_post_thumbnail(); ?>

<b><?php the_title(); ?></b></a>
<?php the_excerpt(); ?>
</div>
<?php endwhile; endif; ?>