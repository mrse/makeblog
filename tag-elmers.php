<?php get_header(); ?>

	<div class="row">
	
	<div class="span10">
	
		<ul class="breadcrumb">
	
			<?php if(class_exists('bcn_breadcrumb_trail'))
				{
					$breadcrumb_trail = new bcn_breadcrumb_trail;
					$breadcrumb_trail->opt['home_title'] = "Home";
					$breadcrumb_trail->opt['current_item_prefix'] = '<li class="current">';
					$breadcrumb_trail->opt['current_item_suffix'] = '</li>';
					$breadcrumb_trail->opt['separator'] = '<span class="divider">&nbsp;/&nbsp;</span>';
					$breadcrumb_trail->opt['home_prefix'] = '<li>';
					$breadcrumb_trail->opt['home_suffix'] = '</li>';
					$breadcrumb_trail->opt['max_title_length'] = 70;
					$breadcrumb_trail->fill();
					$breadcrumb_trail->display();
				} ?>
				
		</ul>
				
		<a href="http://www.elmers.com/glueguide"><img src="http://cdn.makezine.com/make/ads/glue_guide.jpg" style="height:auto; max-width:580px;" border="0" alt="Elmers Glue Guide" /></a>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article <?php post_class(); ?>>
		
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<div class="entry-content">
		
			<?php if (!is_single()) { ?>
		
			<?php
				$postid = $post->ID;
				$big_video = get_post_custom_values('Big_Video');
					if (isset($big_video[0])) {
						make_youtube_embed('580', '325');
					}}				
			?>
				
			<?php the_content('Read the Full Story'); ?>
		
		</div>
		
		<div class="postmeta row clear">
		
			<div class="span1 userpic" >
			
				<?php echo get_avatar( get_the_author_meta('user_email'), 40); ?>
			
			</div>
			
			<div class="span9">
			
				<p>Posted by <?php the_author_posts_link(); ?> | <a href="<?php the_permalink(); ?>"><?php the_time('l F jS, Y g:i A'); ?></a></p>
				<p>Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?> <?php edit_post_link('Fix me...', ' | '); ?></p>

			</div>
			
		</div>
		
		</article>
		

		<?php endwhile; ?>
		
		<div class="comments">
		<?php comments_template(); ?>
		</div>
		<?php  else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
			
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('', '', '', '', 8, false);} ?> 
	
	</div>
	
		<?php get_sidebar(); ?>

	<?php get_footer(); ?>