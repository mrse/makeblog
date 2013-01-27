<?php get_header(); ?>
		
		<div class="clear"></div>

		<div class="sand">

			<div class="container">

				<div class="row">

					<div class="span8">

						<?php if (!is_home()) { ?>

							<ul class="breadcrumb">
			
								<?php if(class_exists('bcn_breadcrumb_trail')) {
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

						<?php } ?>

						<div class="content">


							 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
								<article <?php post_class(); ?>>

									<!--<p class="categories"><?php the_category(', '); ?></p>-->

									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

									<p class="meta top">By <?php the_author_posts_link(); ?>, <?php the_time('Y/m/d \@ g:i a') ?></p>
									
										<?php if (!$_POST) { ?>
										
											<form action="" method="post" class="form-horizontal">
												<fieldset>
													<legend>Comment Contest</legend>
													<div class="control-group">
														<label class="control-label" for="xlInput">Post ID</label>
														<div class="controls">
															<input class="xlarge" id="xlInput" name="post" size="30" type="text">
														</div>
													</div>
													<div class="form-actions">
														<input type="submit" style="margin-left:150px;" class="btn primary" name="submit" value="Submit me!" />
													</div>
												</fieldset>
											</form>
									
											<form action="" method="post">

										<?php }  ?>
										
										
										<?php if ($_POST) {

											$post_id = intval(!empty($_REQUEST['post']) ? $_REQUEST['post'] : null);
										   		if ( ! $post_id ) {}
													$post_id = '';
										   			$comments = get_comments("post_id=$post_id&status=approve");
										   		if ($comments) {
													$ndx = mt_rand(1,sizeof($comments)) - 1;
											 		$comment = $comments[$ndx];
											 		//print_r($comment);
											 ?>
											<table class='table table-striped table-bordered'>
												
												<tr class='comment_author'>
													<td width="200">Comment Author</td>
													<td><?php echo esc_html($comment->comment_author); ?></td>
												</tr>
												
												<tr class='comment_content'>
													<td>Comment Content</td>
													<td><?php echo esc_html($comment->comment_content); ?></td>
												</tr>
												
												<tr class='comment_email'>
													<td>Email</td>
													<td><?php echo esc_html($comment->comment_author_email); ?></td>
												</div>

												<tr class='comment_url'>
													<td>Author URL</td>
													<td><?php echo esc_html($comment->comment_author_url); ?></td>
												</tr>
												
												<tr class='comment_ip'>
													<td>IP</td>
													<td><?php echo esc_html($comment->comment_author_IP); ?></td>
												</tr>

												<tr class='comment_date'>
													<td>Date</td>
													<td><?php echo esc_html($comment->comment_date); ?></td>
												</tr>

											</table>
										   <?php } ?>
										   
										<?php } ?>
									<div class="clear"></div>

									<div class="row">

										<div class="postmeta">
		
											<div class="span-thumb thumbnail">
											
												<?php echo get_avatar( get_the_author_meta('user_email'), 72); ?>
											
											</div>
											
											<div class="span-well well">
											
												<p>Posted by <?php the_author_posts_link(); ?> | <a href="<?php the_permalink(); ?>"><?php the_time('l F jS, Y g:i A'); ?></a></p>
												<p>Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?> <?php edit_post_link('Fix me...', ' | '); ?></p>

											</div>

										</div>
										
									</div>
								
								</article>

							<?php endwhile; ?>

							<ul class="pager">
							
								<li class="previous"><?php previous_posts_link('&larr; Previous Page'); ?></li>
								<li class="next"><?php next_posts_link('Next Page &rarr;'); ?></li>
							
							</ul>

							<?php if (function_exists('make_featured_products')) { make_featured_products(); } ?>

							<div class="comments">
								<?php comments_template(); ?>
							</div>
							
							<?php else: ?>
							
								<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							
							<?php endif; ?>

						</div>

					</div>

					<?php get_sidebar(); ?>

			<?php get_footer(); ?>