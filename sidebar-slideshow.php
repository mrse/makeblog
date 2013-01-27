				<div class="span4">

					<div class="slide-side affix">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

							<?php the_title('<h1>', '</h1>'); ?>
						
							<?php edit_post_link($link = null, $before = '', $after = '', $id = 0); ?>

						<?php endwhile; else: endif; ?>

						<div class="sidebar-ad">

							<!-- Makezine -->
							<div id='div-gpt-ad-1346964762079-1'>
								<script type='text/javascript'>
									googletag.cmd.push(function() { googletag.display('div-gpt-ad-1346964762079-1'); });
								</script>
							</div>

						</div>
						
						<div class="sidebar-ad">

							<a href="http://makezine.com" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/more-from-make.png" alt="More from MAKE"></a>

						</div>
						

					</div>

				</div>
