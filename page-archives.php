<?php
/**
 * @package MakeZine
 * Template Name: Archives Page
 */
?>


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
				
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article <?php post_class(); ?>>
		
		<div class="entry-content">
		
			<style type="text/css">
				.entry-content a { border:0px; }
			</style>
			
			<a href="/archives"><img src="http://cdn.makezine.com/make/blogs/blog.makezine.com/images/MAKE_archive_banner.gif" border="0" height="72" width="602" alt="Complete Archives" /></a>
			<br clear="all" />
			
				<div style="float:left;width:250px;list-style-type:none;"><h3>MAKE Categories</h3><?php wp_list_categories( 'orderby=name&depth=1&title_li=' ); ?></div> 
				<div style="float:right;width:250px;list-style-type:none;"><h3>MAKE Archives</h3><?php wp_get_archives('type=monthly'); ?></div>
		
			
			<div class="clear"></div>
		
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