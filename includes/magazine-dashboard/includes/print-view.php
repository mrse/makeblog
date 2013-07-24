<?php
/**
 * Admin page for generating post/projects for the magazine.
 */

/**
 * Add admin page to Volume post type
 */
function make_add_production_editor_menu_page() {
	add_submenu_page( 'edit.php?post_type=volume', 'Production Editor', 'Production Editor', 'edit_posts', 'production_editor', 'make_print_production' );
}

add_action( 'admin_menu', 'make_add_production_editor_menu_page' );

/**
 * Content of the admin page
 */
function make_print_production() {
	global $post;
	$p = ( !empty( $_GET['p'] ) ) ? $_GET['p'] : '1';
	$post = get_post( $p );
	setup_postdata( $post );
	$meta = get_post_meta( $post->ID );
	$parts = get_post_meta( $post->ID, 'parts' );
	$tools = get_post_meta( $post->ID, 'Tools' );
	$steps = get_post_custom_values('Steps', $post->ID );
?>
	
	<script>

		jQuery(document).ready(function(){
			jQuery('.toggle').click(function() {
				if (jQuery('#the-list img').is(':visible')) { //Basic function here checks for the form and then brings it in if it isn't showing.
					jQuery('#the-list img').fadeOut();
				}
				
				else {
					jQuery('#the-list img').fadeIn('fast');
				}
			});
			jQuery('.the-hider').click(function() {
				if (jQuery('.hider').is(':visible')) { //Basic function here checks for the form and then brings it in if it isn't showing.
					jQuery('.hider').hide();
				}
				else {
					jQuery('.hider').show();
				}
			});
		});

	</script>
	
	<style>
		table {
			border-collapse: collapse;
		}
		button {
			float: right;
		}
		.hider {
			width:150px;
		}
		h1 a {
			text-decoration: none;
		}
	</style>

	<div class="wrap">
	
		<h1>Production Editor - <a target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		
		<?php 
			$desc = get_post_custom_values('Description');
			echo ( !empty( $desc[0] ) ) ? Markdown( wp_kses_post( $desc[0] ) ) : '';
		?>
			
		<table class="wp-list-table widefat fixed pages" cellspacing="0">
			
			<thead>
				
				<tr>
					<th class="hider">Field</th>
					<th class="clear">Value <button class="the-hider button">Hide Column</button><button class="toggle button">Toggle Images</button></th>
				</tr>
				
			</thead>
			<tfoot>
				
				<tr>
					<th class="hider"><h3>Field</h3></th>
					<th><h3>Value</h3></th>
				</tr>
				
			</tfoot>
			<tbody id="the-list">
				<tr class="alternate">
					<td class="hider">Title</td>
					<td><?php the_title(); ?></td>
				</tr>
				<tr>
					<td class="hider">Hed</td>
					<td><?php echo ( !empty( $meta['Hed'][0] ) ) ?  esc_html( $meta['Hed'][0] ) : ''; ?></td>
				</tr>
				<tr class="alternate">
					<td class="hider">Dek</td>
					<td><?php echo ( !empty( $meta['Hed'][0] ) ) ?  esc_html( $meta['Dek'][0] ) : ''; ?></td>
				</tr>
				<tr>
					<td class="hider">Byline</td>
					<td><?php echo ( !empty( $meta['Byline'][0] ) ) ?  esc_html( $meta['Byline'][0] ) : ''; ?></td>
				</tr>
				<tr class="alternate">
					<td class="hider">Author</td>
					<td><?php coauthors( $post->ID ); ?></td>
				</tr>
				<tr>
					<?php $terms = get_the_terms( $post->ID, 'difficulty' ); ?>
					<td class="hider">Difficulty</td>
					<td><?php if ($terms) : foreach ($terms as $term) : echo esc_html( $term->name ); endforeach; endif;?></td>
				</tr>
				<tr class="alternate">
					<td class="hider">Time Required</td>
					<td><?php echo ( !empty( $meta['TimeRequired'][0] ) ) ?  esc_html( $meta['TimeRequired'][0] ) : ''; ?></td>
				</tr>
				<tr>
					<td class="hider">Cost</td>
					<td><?php echo ( !empty( $meta['Cost'][0] ) ) ?  esc_html( $meta['Cost'][0] ) : ''; ?></td>
				</tr>
				<tr>
					<td class="hider">Body</td>
					<td><?php the_content(); ?></td>
				</tr>
				<tr class="alternate">
					<td class="hider">Parts</td>
					<td><?php echo make_projects_parts( $parts ); ?></td>
				</tr>
				<tr>
					<td class="hider">Tools</td>
					<td><?php echo make_projects_tools( $tools ); ?></td>
				</tr>
				<tr class="alternate">
					<td class="hider">Steps</td>
					<td><?php make_projects_steps( $steps, true ); ?></td>
				</tr>
				<tr>
					<td class="hider">Conclusion</td>
					<td><?php echo $meta['Conclusion'][0]; ?></td>
				</tr>
			</tbody>
			
		</table>
<?php }