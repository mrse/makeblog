<?php

	/**
	 * A nifty plugin for Makezine.com to better manage the volumes and content for each magazine. This combines all post types into in interface.
	 *
	 * This is a replacement to FileMaker Pro.
	 *
	 * Eventually, we could extract this into an actual plugin? Let's build it out so it is independent of the theme.
	 *
	 * @package makeblog
	 * @author Cole Geissinger <cgeissinger@makermedia.com>
	 *
	 * @version 0.1
	 * @since   0.1
	 */
	

	// // Load our list table class
	// if ( ! class_exists( 'Make_List_Table' ) )
	// 	require_once( 'includes/class.list-table.php' );

	// if ( ! class_exists( 'Make_Magazine_Dashboard' ) ) {
	// 	require_once( 'includes/class.magazine-dashboard.php' );

	// 	// Instantiate our content manager class
	// 	$make_magazine_dashboard = new Make_Magazine_Dashboard();

	// }

	/**
 * Function to count the statuses of Maker Faire applications
 */
function make_count_post_status() {
	$types = array( 
		'All' 				=> 'any', 
		'Projects'			=> 'projects', 
		'Articles'			=> 'magazine', 
		'Reviews'			=> 'review', 
		'Errata'			=> 'errata', 
		'Volume'			=> 'volume'
	);
	$output = '';
	foreach ($types as $k => $type) {
		$args = array( 
			'post_type'			=> 'mf_form',
			'post_status'		=> 'any',
			'posts_per_page' 	=> 1500,
			//'faire'				=> $GLOBALS['current_faire'],
			'post_status'		=> $type,
			'return_fields'		=> 'ids',
			);
		$query = new WP_Query( $args );
		$output .= '| <li><a href="edit.php?post_type=mf_form&page=current_faire&post_status=' . $type . '">' . $k . '</a> <span class="count">(' . $query->post_count . ' )</span></li>';
	}
	return substr($output, 2);
}

/**
 * Function to generate the pagination links. Just a wrapper for paginate links
 */
function mf_get_pagination_links( $total, $paged ) {
	$links = paginate_links( array(
		'base' 		=> get_pagenum_link() . '%_%',
		'format' 	=> '&paged=%#%',
		'current' 	=> max( 1, $paged ),
		'total' 	=> $total
		) 
	);
	return $links;
}

/**
 * Post Status Drop Down
 */
function mf_post_status_dropdown() {
	$stati = get_post_stati();
	$output = '<select name="post_status" id="post_Status">';
	$output .= '<option value="">Application Status</option>';
	foreach ($stati as $status) {
		$output .= '<option value="' . $status . '">' . $status . '</option>';
	}
	$output .= '</select>';
	return $output;
}

/**
 * Current Faire Page
 */
function makerfaire_current_faire_page() {

	//must check that the user has the required capability 
	if (!current_user_can('manage_options')) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	// Start the WordPress Page

	$paged = ( isset( $_GET['paged'] ) ) ? intval( $_GET['paged'] ) : 1;
	$post_status = ( isset( $_GET['post_status'] ) ) ? sanitize_title( $_GET['post_status'] ) : '';
	$s = ( isset( $_GET['s'] ) ) ? sanitize_text_field( $_GET['s'] ) : '';

	$args = array( 
		'post_type'			=> array( 'projects', 'magazine', 'review', 'errata', 'volume' ),
		'post_status'		=> 'any',
		'posts_per_page' 	=> 20,
		'paged'				=> $paged,
		'post_status'		=> $post_status,
		's'					=> $s
		);
	$query = new WP_Query( $args );

	?>
	
	<div class="wrap">
	
		<h1>Current Faire - <?php echo get_term_by( 'slug', $GLOBALS['current_faire'], 'faire')->name; ?></h1>
		
		<ul class="subsubsub">
			<?php echo make_count_post_status(); ?>
		</ul>
		
		<div class="tablenav top">

			<div class="tablenav-pages one-page">
				<span class="displaying-num"><?php echo $query->found_posts; ?></span>
				<?php echo mf_get_pagination_links( $query->max_num_pages, $paged ); ?>
			</div>
			
			<form class="" type="get">
				<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
				<input type="hidden" name="post_type" value="mf_form" />
				<?php //echo mf_restrict_listings_by_type( $type ); ?>
				<?php //echo mf_generate_dropdown( 'category', $cat ); ?>
				<?php echo mf_post_status_dropdown(); ?>
				<label class="screen-reader-text" for="post-search-input">Search Applications:</label>
				<input type="search" id="post-search-input" name="s" placeholder="<?php echo ! empty( $s ) ? esc_html( $s ) : ''; ?>" value="">
				<input type="submit" name="" id="search-submit" class="button" value="Search Dashboard"></p>
			</form>
			
		</div>
		
		<table class="wp-list-table widefat fixed pages">
			<thead>
				<tr>
					<th scope="col" id="post_parent" class="manage-column column-post_parent">Volume</th>
					<th scope="col" id="post_type" class="manage-column column-post_type sortable desc">Content Type</th>
					<th scope="col" id="post_status" class="manage-column column-post_status sortable desc">Status</th>
					<th scope="col" id="section" class="manage-column column-section sortable desc">Section</th>
					<th scope="col" id="post_title" class="manage-column column-post_title">Title</th>
					<th scope="col" id="post_author" class="manage-column column-post_author">Author</th>
					<th scope="col" id="post_date" class="manage-column column-post_date sortabel desc">Date</th>
					<th scope="col" id="ef_pc" class="manage-column column-ef_pc">PC</th>
					<th scope="col" id="ef_assignment" class="manage-column column-ef_assignment">Assignment</th>
					<th scope="col" id="ef_first_deadline" class="manage-column column-ef_first_deadline">1st Deadline</th>
					<th scope="col" id="" class="manage-column">ED</th>
					<th scope="col" id="" class="manage-column">ED Deadline</th>
					<th scope="col" id="" class="manage-column">CE</th>
					<th scope="col" id="" class="manage-column">CE Deadline</th>
					<th scope="col" id="" class="manage-column">TR</th>
					<th scope="col" id="" class="manage-column">Needs Video</th>
					<th scope="col" id="" class="manage-column">Needs Photo</th>
					<th scope="col" id="" class="manage-column">Manuscript Estimate</th>
					<th scope="col" id="" class="manage-column">Invoice Received</th>
					<th scope="col" id="" class="manage-column">WC</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th scope="col" id="post_parent" class="manage-column column-post_parent">Volume</th>
					<th scope="col" id="post_type" class="manage-column column-post_type sortable desc">Content Type</th>
					<th scope="col" id="post_status" class="manage-column column-post_status sortable desc">Status</th>
					<th scope="col" id="section" class="manage-column column-section sortable desc">Section</th>
					<th scope="col" id="post_title" class="manage-column column-post_title">Title</th>
					<th scope="col" id="post_author" class="manage-column column-post_author">Author</th>
					<th scope="col" id="post_date" class="manage-column column-post_date sortabel desc">Date</th>
					<th scope="col" id="ef_pc" class="manage-column column-ef_pc">PC</th>
					<th scope="col" id="ef_assignment" class="manage-column column-ef_assignment">Assignment</th>
					<th scope="col" id="ef_first_deadline" class="manage-column column-ef_first_deadline">1st Deadline</th>
					<th scope="col" id="" class="manage-column">ED</th>
					<th scope="col" id="" class="manage-column">ED Deadline</th>
					<th scope="col" id="" class="manage-column">CE</th>
					<th scope="col" id="" class="manage-column">CE Deadline</th>
					<th scope="col" id="" class="manage-column">TR</th>
					<th scope="col" id="" class="manage-column">Needs Video</th>
					<th scope="col" id="" class="manage-column">Needs Photo</th>
					<th scope="col" id="" class="manage-column">Manuscript Estimate</th>
					<th scope="col" id="" class="manage-column">Invoice Received</th>
					<th scope="col" id="" class="manage-column">WC</th>
				</tr>
			</tfoot>
			<tbody id="the-list">
				<?php
					if( $query ) {
						$i = 0;
						foreach ( $query->posts as $the_post ) {

							// Set some variables....
							$volume = ( $the_post->post_parent != 0 ) ? get_the_title( absint( $the_post->post_parent ) ) : '';

							if ( $i % 2 != 0 ) {
								echo '<tr class="alternate">';
							} else {
								echo '<tr>';
							}
							echo '<td>' . $volume . '</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>' . $the_post->post_status . '</td>';
							echo '<td>STATUS</td>';
							echo '<td><strong><a href="' . get_edit_post_link( $the_post->ID ) . '">' . $the_post->post_title . '</a></strong>
									<div class="row-actions">
										<span class="inline hide-if-no-js"><a href="' . get_permalink( $the_post->ID ) . '">View</a></span>
										<span class="trash"><a class="submitdelete" href="' . get_delete_post_link( $the_post->ID ) . '">Trash</a></span>
									</div>
								 </td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '<td>CONTENT TYPE</td>';
							echo '</tr>';
							$i++;
						}
					}?>
			</tbody>
			
		</table>
		
	</div>

<?php

}

/**
 * Hook the page in
 */
function mf_add_menu_page() {
	add_submenu_page( 'edit.php?post_type=volume', 'Dashboard', 'Dashboard', 'delete_others_pages', 'manager', 'makerfaire_current_faire_page' );
}

add_action( 'admin_menu', 'mf_add_menu_page' );