<?php
/**
 * Template Name: Comment Contest
 */

get_header(); ?>

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
		
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<div class="entry-content">
		
		
			<?php if (!$_POST) { ?>
		
				<form action="" method="post">
				
				<div class="clearfix">
					<label for="xlInput">Post ID</label>
					<div class="input">
						<input class="xlarge" id="xlInput" name="post" size="30" type="text">
					</div>
				  </div>
				<input type="submit" style="margin-left:150px;" class="btn primary" name="submit" value="Submit me!" />
				</form>

			<?php }  ?>
			
			
			<?php if ($_POST) {

			   $post_id = intval($_POST['post']);
			   	if ( ! $post_id )
				$post_id = '';
			   $comments = get_comments("post_id=$post_id&status=approve");
			   if ($comments) {
				 $ndx = mt_rand(1,sizeof($comments)) - 1;
				 $comment = $comments[$ndx];
				 ?>
				 <div class='comment_wrapper'>
				   <div class='comment_author'>
					 <?php echo "Comment By: ".esc_html($comment->comment_author); ?>
				   </div>
				   <div class='comment_content'>
					 <?php echo esc_html($comment->comment_content); ?>
				   </div>
				   <div class='comment_email'>
					 <?php echo esc_html($comment->comment_author_email); ?>
				   </div>

				   <div class='comment_url'>
					 <?php echo esc_html($comment->comment_author_url); ?>
				   </div>


				   <div class='comment_ip'>
					 <?php echo esc_html($comment->comment_author_IP); ?>
				   </div>


				   <div class='comment_date'>
					 <?php echo esc_html($comment->comment_date); ?>
				   </div>

				 </div>
			   <?php } ?>
			   
			<?php } ?>
		
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
			
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('', '', '', '', 6, false);} ?> 
	
	</div>
	
		<?php get_sidebar(); ?>

	<?php get_footer(); ?>