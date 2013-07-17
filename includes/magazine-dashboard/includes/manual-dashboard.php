<?php


/**
 * Centeralize all of our query variables into an easy to use array
 * @return array
 */
function make_get_query_vars() {
	$query_vars = array(
		'paged' => ( isset( $_GET['paged'] ) ) ? absint( $_GET['paged'] ) : 1,
		'search' => ( isset( $_GET['s'] ) ) ? sanitize_text_field( $_GET['s'] ) : '',
		'filter' => ( isset( $_GET['filter'] ) ) ? sanitize_text_field( $_GET['filter'] ) : '',
		'volume' => ( isset( $_GET['volume'] ) && $_GET['volume'] != 'all' ) ? sanitize_text_field( $_GET['volume'] ) : '',
		'post_status' => ( isset( $_GET['post_status'] ) && $_GET['post_status'] != '' && $_GET['post_status'] != 'all' ) ? sanitize_text_field( $_GET['post_status'] ) : make_post_statuses(),
		'section' => ( isset( $_GET['section'] ) && $_GET['section'] != 'all' ) ? sanitize_text_field( $_GET['section'] ) : '',
		'posts_per_page' => ( isset( $_GET['posts_per_page'] ) ) ? absint( $_GET['posts_per_page'] ) : 20,
	);

	return $query_vars;
}


/**
 * Function to count the statuses of Maker Faire applications
 */
function make_count_post_status() {
	$query_vars = make_get_query_vars();
	$results = array();
	$output = '';

	$post_type = array(
		'All'	   => 'all',
		'Projects' => 'projects', 
		'Articles' => 'magazine', 
		'Reviews'  => 'review', 
		'Errata'   => 'errata', 
		'Volume'   => 'volume',
	);
	foreach ( $post_type as $k => $type ) {
		$args = array( 
			'post_type'		 => ( $type == 'all' ) ? array( 'projects', 'magazine', 'review', 'errata', 'volume' ) : $type,
			'post_status'	 => $query_vars['post_status'],
			'post_parent'	 => $query_vars['volume'],
			'section'		 => $query_vars['section'],
			'posts_per_page' => 0,
			'return_fields'	 => 'ids',
			's'				 => $query_vars['serach'],	
		);
		$query = new WP_Query( $args );

		$query_results = array(
			'post_type'  => $k,
			'type_uri'   => $type,
			'post_count' => $query->found_posts,
		);

		array_push( $results, $query_results );
		
	}

	foreach ( $results as $result ) {

		// Check the current results and apply our current class if we are currently filtering by that post type.
		$class = ( ( $result['type_uri'] == $query_vars['filter'] ) || $result['type_uri'] == 'all' && empty( $query_vars['filter'] ) ) ? ' class="current"' : '';

		$additionals = '';

		// Append other query variables in our filters if they are present
		if ( ! empty( $query_vars['search'] ) )
			$additionals .= '&s=' . $query_vars['search'];

		if ( ! empty( $query_vars['post_status'] ) && ! is_array( $query_vars['post_status'] ) )
			$additionals .= '&post_status=' . $query_vars['post_status'];

		if ( ! empty( $query_vars['volume'] ) )
			$additionals .= '&volume=' . $query_vars['volume'];

		if ( ! empty( $query_vars['section'] ) )
			$additionals .= '&section=' . $query_vars['section'];

		if ( ! empty( $query_vars['posts_per_page'] ) )
			$additionals .= '&posts_per_page=' . $query_vars['posts_per_page'];


		$output .= ' | <li><a href="' . esc_url( 'edit.php?post_type=volume&page=manager&filter=' . sanitize_text_field( $result['type_uri'] ) ) . sanitize_text_field( $additionals ) . '"' . $class . '>' . esc_html( $result['post_type'] ) . '</a><span class="count">(' . absint( $result['post_count'] ) . ')</span> </li>';
	}

	return substr( $output, 2 );
}

/**
 * Function to generate the pagination links. Just a wrapper for paginate links
 */
function make_get_pagination_link( $total, $paged ) {
	$links = paginate_links( array(
		'base' 		=> get_pagenum_link() . '%_%',
		'format' 	=> '&paged=%#%',
		'current' 	=> max( 1, sanitize_text_field( $paged ) ),
		'total' 	=> absint( $total )
		) 
	);

	return $links;
}

/**
 * Post Status Drop Down
 */
function make_post_status_dropdown() {
	global $wp_post_statuses;

	$query_vars = make_get_query_vars();

	$output = '<select name="post_status" id="post_status">';
	$output .= '<option value="all">All Statuses</option>';

	foreach ( $wp_post_statuses as $status => $obj) {
		if ( $status != 'trash' && $status != 'inherit' && $status != 'private' && $status != 'auto-draft' )
			$output .= '<option value="' . esc_attr( $obj->name ) . '"' . selected( sanitize_text_field( $query_vars['post_status'] ), esc_attr( $obj->name ), false ) . '>' . esc_html( $obj->label ) . '</option>';
	}

	$output .= '</select>';

	return $output;
}


/**
 * Generates a dropdown of our volumes we can filter by
 * @return html
 */
function make_volumes_dropdown() {

	$query_vars = make_get_query_vars();

	$pages = wp_dropdown_pages( array(
		'post_type' => 'volume',
		'selected'  => $query_vars['volume'],
		'name'      => 'volume',
		'show_option_none' => 'All Volumes',
		'option_none_value' => 'all',
		'sort_column' => 'menu_order, post_title',
		'echo' => false,
	) );

	if ( ! empty( $pages ) )
		echo $pages;
}


/**
 * Generates a dropdown of how many pages we want to display on each page
 * @param  array $posts_per_page an array of integers to be outputted as options
 * @return html
 */
function make_posts_per_page_dropdown( $posts_per_page ) {
	$query_vars = make_get_query_vars();

	$output = 'Posts Per Page <select name="posts_per_page" id="posts-per-page">';
	$output .= '<option value="20">20</option>';

	foreach ( $posts_per_page as $post_count ) {
		$output .= '<option value="' . absint( $post_count ) . '"' . selected( absint( $query_vars['posts_per_page'] ), absint( $post_count ), false ) . '>' . absint( $post_count ) . '</option>';
	}

	$output .= '</select>';

	echo $output;
}


/**
 * Generate a dropdown to filter the sections. Duh.
 * @return html
 */
function make_section_dropdown() {

	$query_vars = make_get_query_vars();
	$terms = get_terms( 'section' );

	$output = '<select name="section" id="section-dropdown">';
	$output .= '<option value="all">All Sections</option>';

	foreach ( $terms as $term ) {
		$output .= '<option value="' . sanitize_text_field( $term->slug ) . '"' . selected( sanitize_text_field( $query_vars['section'] ), sanitize_text_field( $term->slug ), false ) . '>' . esc_html( $term->name ) . '</option>';
	}

	$output .= '</select>';

	return $output;
}


/**
 * Return a list of all the post statuses
 * @return array
 */
function make_post_statuses() {
	global $wp_post_statuses;

	foreach ( $wp_post_statuses as $status => $name ) {
		if ( $status != 'trash' && $status != 'inherit' && $status != 'private' && $status != 'auto-draft' )
			$statuses[] = $status;
	}

	return $statuses;
}


/**
 * Initialize our screen options
 */
function make_init_screen_options() {
	$screen = get_current_screen();

	if ( $screen->id == 'volume_page_manager' ) {
		add_filter( 'screen_layout_columns', 'make_display_screen_options' );
		$screen->add_option('make_screen_options', '');
	}
}
add_action( 'admin_head', 'make_init_screen_options' );


/**
 * Display a list of columns to drop (TODO: find a way to output these easily via WP_Screen classs)
 */
function make_display_screen_options() { ?>
	<div id="screen-options-wrap" class="hidden" tabindex="-1" aria-label="Screen Options Tab">
		<form name="make_dashboard_options" method="get">
			<h5>Show on screen</h5>
			<div class="metabox-prefs">
				<label for="post_parent-hide">
					<input type="checkbox" class="hide-column-tog" id="post_parent-hide" name="post_parent-hide" value="post_parent" checked="checked"> Volume
				</label>
				<label for="post_type-hide">
					<input type="checkbox" class="hide-column-tog" id="post_type-hide" name="post_type-hide" value="post_type" checked="checked"> Content Type
				</label>
				<label for="post_status-hide">
					<input type="checkbox" class="hide-column-tog" id="post_status-hide" name="post_status-hide" value="post_status" checked="checked"> Status
				</label>
				<label for="section-hide">
					<input type="checkbox" class="hide-column-tog" id="section-hide" name="section-hide" value="section" checked="checked"> Section
				</label>
				<label for="post_title-hide">
					<input type="checkbox" class="hide-column-tog" id="post_title-hide" name="post_title-hide" value="post_title" checked="checked"> Title
				</label>
				<label for="post_author-hide">
					<input type="checkbox" class="hide-column-tog" id="post_author-hide" name="post_author-hide" value="post_author" checked="checked"> Author
				</label>
				<label for="post_date-hide"> 
					<input type="checkbox" class="hide-column-tog" id="post_date-hide" name="post_date-hide" value="post_date" checked="checked"> Date
				</label>
				<label for="ef_pc-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_pc-hide" name="ef_pc-hide" value="ef_pc" checked="checked"> PC
				</label>
				<label for="ef_assignment-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_assignment-hide" name="ef_assignment-hide" value="ef_assignment"> Assignment
				</label>
				<label for="ef_first_deadline-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_first_deadline-hide" name="ef_first_deadline-hide" value="ef_first_deadline"> 1st Deadline
				</label>
				<label for="ef_ed-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_ed-hide" name="ef_ed-hide" value="ef_ed" checked="checked"> ED
				</label>
				<label for="ef_ed_deadline-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_ed_deadline-hide" name="ef_ed_deadline-hide" value="ef_ed_deadline" checked="checked"> ED Deadline
				</label>
				<label for="ef_ce-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_ce-hide" name="ef_ce-hide" value="ef_ce" checked="checked"> CE
				</label>
				<label for="ef_ce_deadline-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_ce_deadline-hide" name="ef_ce_deadline-hide" value="ef_ce_deadline" checked="checked"> CE Deadline
				</label>
				<label for="ef_tr-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_tr-hide" name="ef_tr-hide" value="ef_tr"> TR
				</label>
				<label for="ef_needs_video-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_needs_video-hide" name="ef_needs_video-hide" value="ef_needs_video"> Needs Video
				</label>
				<label for="ef_needs_photo-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_needs_photo-hide" name="ef_needs_photo-hide" value="ef_needs_photo"> Needs Photo
				</label>
				<label for="ef_manuscript_estimate-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_manuscript_estimate-hide" name="ef_manuscript_estimate-hide" value="ef_manuscript_estimate" checked="checked"> Fee
				</label>
				<label for="ef_invoice_received-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_invoice_received-hide" name="ef_invoice_received-hide" value="ef_invoice_received"> Invoice Received
				</label>
				<label for="ef_wc-hide">
					<input type="checkbox" class="hide-column-tog" id="ef_wc-hide" name="ef_wc-hide" value="ef_wc"> WC
				</label>
			</div>
			<div class="screen-options"></div>
		</form>
	</div>
<?php }


/**
 * The function to save anything happening in Screen Options. Might not need this? At the moment it does nothing yet.
 */
function make_save_screen_options() {
	if ( isset( $_POST['make_dashboard_options'] ) && $_POST['make_dashboard_options'] == 1 ) {

	}
}
add_action( 'admin_init', 'make_save_screen_options' );


/**
 * Helper functino to easily convert Unix time to a perfered date settings
 * @param  string  $time      The time to conver
 * @param  boolean $is_string Allows us to convert a string to time
 * @return string
 */
function make_convert_to_pretty_time( $time, $is_string = false ) {

	if ( empty( $time ) )
		return;

	if ( $is_string )
		$time = strtotime( $time );

	return date( 'm/d/y', absint( $time ) );
}


/**
 * Helper function to convert integer equivilent boolean values to text
 * @param  integer $boolean An integer value (0 or 1) that will be converted to text on output
 * @return string
 */
function make_convert_boolean( $boolean ) {

	if ( empty( $boolean ) )
		return;

	if ( $boolean ) {
		$answer = 'Yes';
	} else {
		$answer = 'No';
	}

	return $answer;
} 


/**
 * Helper function to convert author ID into a linked author name
 * @param  integer $author_id The author ID
 * @return string
 */
function make_convert_author_id( $author_id ) {
	// Make sure we actually passed some data..
	if ( empty( $author_id ) )
		return;

	$user = get_userdata( absint( $author_id ) );

	return '<a href="' . get_author_posts_url( absint( $author_id ) ) . '">' . esc_html( $user->display_name ) . '</a>';
}


/**
 * Helper function to process integers and return numbers or an empty string. We use this function because absint will return 0 other wise.. and we don't always want that.
 * @param  string $integer The integer we want to process. If the string is empty, we return nothing rather than 0
 * @return integer/void
 */
function make_get_integer( $integer ) {

	// Check is we are actuall passing something or if the string is NOT an integer.
	if ( empty( $integer ) || ! absint( $integer ) )
		return;

	$integer = ( $integer != 0 ) ? absint( $integer ) : '';

	return $integer;
}


/**
 * Current Faire Page
 */
function make_magazine_dashboard_page() {

	//must check that the user has the required capability 
	if ( ! current_user_can( 'manage_options' ) )
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'make' ) );

	// Get any query variables if set
	$query_vars = make_get_query_vars();

	// Check if we are filtering our results by post type.
	if ( empty( $query_vars['filter'] ) || $query_vars['filter'] == 'all' ) {
		$post_types = array( 'projects', 'magazine', 'review', 'errata', 'volume' );
	} else {
		$post_types = $query_vars['filter'];
	}

	$args = array(
		'post_type'		 => $post_types,
		'post_status'	 => $query_vars['post_status'],
		'posts_per_page' => $query_vars['posts_per_page'],
		'paged'			 => $query_vars['paged'],
		'post_parent'	 => $query_vars['volume'],
		'section'		 => $query_vars['section'],
		's'				 => $query_vars['search'],
	);
	$query = new WP_Query( $args ); ?>
	<div class="wrap">
		<h1>Magazine Dashboard</h1>
		<ul class="subsubsub">
			<?php echo make_count_post_status(); ?>
		</ul>

		<form method="get" class="posts-filter">
			<input type="hidden" name="post_type" value="volume" />
			<input type="hidden" name="page" value="<?php echo esc_attr( $_REQUEST['page'] ); ?>" />
			<?php wp_nonce_field( 'dashboard-form-save', 'make-magazine-dashboard', false ); ?>
			
			<p class="search-box">
				<label for="post-search-input" class="screen-reader-text">Search Dashboard</label>
				<input type="search" id="post-search-input" name="s" value="<?php echo ( isset( $query_vars['search'] ) ) ? esc_attr( $query_vars['search'] ) : ''; ?>">
				<input type="submit" name="" id="search-submit" class="button" value="Search Dashboard">
			</p>
			<p class="search-box page-count">
				Current Page Count <span class="pc-number">0</span> | &nbsp;
			</p>

			<div class="tablenav top">
				<?php echo make_post_status_dropdown(); ?>
				<?php echo make_volumes_dropdown(); ?>
				<?php echo make_section_dropdown(); ?>
				<?php echo make_posts_per_page_dropdown( array( 30, 40, 50, 60, 70, 80, 90, 100 ) ); ?>
				<input type="submit" name="" id="filter-submit" class="button" value="Filter Dashboard">
				<button class="button"><a href="<?php echo esc_url( admin_url( 'edit.php?post_type=volume&page=manager' ) ); ?>">Reset Filters</a></button>
				<div class="tablenav-pages">
					<span class="displaying-num"><?php echo absint( $query->found_posts ); ?> Items</span>
					<?php echo make_get_pagination_link( $query->max_num_pages, $query_vars['paged'] ); ?>
				</div>
				
			</div>
			
			<table id="magazine-dashboard" class="wp-list-table widefat fixed pages">
				<thead>
					<tr>
						<th scope="col" id="post_parent" class="manage-column column-post_parent">Volume</th>
						<th scope="col" id="post_type" class="manage-column column-post_type sortable">Content Type</th>
						<th scope="col" id="post_status" class="manage-column column-post_status sortable">Status</th>
						<th scope="col" id="section" class="manage-column column-section sortable">Section</th>
						<th scope="col" id="post_title" class="manage-column column-post_title">Title</th>
						<th scope="col" id="post_author" class="manage-column column-post_author">Author</th>
						<th scope="col" id="post_date" class="manage-column column-post_date sortable">Date</th>
						<th scope="col" id="ef_pc" class="manage-column column-ef_pc">PC</th>
						<!-- <th scope="col" id="ef_assignment" class="manage-column column-ef_assignment">Assignment</th>
						<th scope="col" id="ef_first_deadline" class="manage-column column-ef_first_deadline">1st Deadline</th> -->
						<th scope="col" id="ef_ed" class="manage-column column-ef_ed">ED</th>
						<th scope="col" id="ef_ed_deadline" class="manage-column column-ef_ed_deadline">ED Deadline</th>
						<th scope="col" id="ef_ce" class="manage-column column-ef_ce">CE</th>
						<th scope="col" id="ef_ce_deadline" class="manage-column column-ef_ce_deadline">CE Deadline</th>
						<!-- <th scope="col" id="ef_tr" class="manage-column column-ef_tr">TR</th> -->
						<!-- <th scope="col" id="ef_needs_video" class="manage-column column-ef_needs_video">Needs Video</th>
						<th scope="col" id="ef_needs_photo" class="manage-column column-ef_needs_photo">Needs Photo</th> -->
						<th scope="col" id="ef_manuscript_estimate" class="manage-column column-ef_manuscript_estimate">Fee</th>
						<!-- <th scope="col" id="ef_invoice_received" class="manage-column column-ef_invoice_received">Invoice Received</th>
						<th scope="col" id="ef_wc" class="manage-column column-ef_wc">WC</th> -->
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th scope="col" id="post_parent" class="manage-column column-post_parent">Volume</th>
						<th scope="col" id="post_type" class="manage-column column-post_type sortable">Content Type</th>
						<th scope="col" id="post_status" class="manage-column column-post_status sortable">Status</th>
						<th scope="col" id="section" class="manage-column column-section sortable">Section</th>
						<th scope="col" id="post_title" class="manage-column column-post_title">Title</th>
						<th scope="col" id="post_author" class="manage-column column-post_author">Author</th>
						<th scope="col" id="post_date" class="manage-column column-post_date sortabel">Date</th>
						<th scope="col" id="ef_pc" class="manage-column column-ef_pc">PC</th>
						<!-- <th scope="col" id="ef_assignment" class="manage-column column-ef_assignment">Assignment</th>
						<th scope="col" id="ef_first_deadline" class="manage-column column-ef_first_deadline">1st Deadline</th> -->
						<th scope="col" id="ef_ed" class="manage-column column-ef_ed">ED</th>
						<th scope="col" id="ef_ed_deadline" class="manage-column column-ef_ed_deadline">ED Deadline</th>
						<th scope="col" id="ef_ce" class="manage-column column-ef_ce">CE</th>
						<th scope="col" id="ef_ce_deadline" class="manage-column column-ef_ce_deadline">CE Deadline</th>
						<!-- <th scope="col" id="ef_tr" class="manage-column column-ef_tr">TR</th> -->
						<!-- <th scope="col" id="ef_needs_video" class="manage-column column-ef_needs_video">Needs Video</th>
						<th scope="col" id="ef_needs_photo" class="manage-column column-ef_needs_photo">Needs Photo</th> -->
						<th scope="col" id="ef_manuscript_estimate" class="manage-column column-ef_manuscript_estimate">Fee</th>
						<!-- <th scope="col" id="ef_invoice_received" class="manage-column column-ef_invoice_received">Invoice Received</th>
						<th scope="col" id="ef_wc" class="manage-column column-ef_wc">WC</th> -->
					</tr>
				</tfoot>
				<tbody id="the-list">
					<?php
						global $post;
						if( $query ) {
							$i = 0;
							foreach ( $query->posts as $post ) {
								setup_postdata( $post );

								// Set some variables....
								$volume    = ( $post->post_parent != 0 ) ? get_the_title( absint( $post->post_parent ) ) : '';
								$meta      = get_post_custom( absint( $post->ID ) );
								$sections  = get_the_term_list( absint( $post->ID ), 'section' );
								$post_type = ( get_post_type() == 'magazine' ) ? 'articles' : get_post_type();

								// Add alternating stripes. Like a zebra.
								// if ( $i % 2 != 0 ) {
								// 	echo '<tr class="alternate">';
								// } else {
									echo '<tr>';
								// }
								echo '<td>' . $volume . '</td>';
								echo '<td>' . $post_type . '</td>';
								echo '<td>' . get_post_status() . '</td>';
								echo '<td>' . $sections . '</td>';
								echo '<td><strong><a href="' . get_edit_post_link( absint( $post->ID ) ) . '">' . get_the_title() . '</a></strong>
										<div class="row-actions">
											<span class="inline hide-if-no-js"><a href="' . get_edit_post_link( absint( $post->ID ) ) . '">Edit</a> | </span>
											<span class="trash"><a class="submitdelete" href="' . get_delete_post_link( absint( $post->ID ) ) . '">Trash</a></span>
										</div>
									  </td>';
								echo '<td>' . make_convert_author_id( $post->post_author ) . '</td>';
								echo '<td>' . make_convert_to_pretty_time( $post->post_date, true ) . '</td>';
								echo '<td class="ef_pc_count">' . make_get_integer( $meta['_ef_editorial_meta_number_pc'][0] ) . '</td>';
								// echo '<td>' . esc_html( $meta['_ef_editorial_meta_paragraph_assignment'][0] ) . '</td>';
								//echo '<td>' . make_convert_to_pretty_time( $meta['_ef_editorial_meta_date_1st-deadline'][0] ) . '</td>';
								echo '<td>' . make_convert_author_id( $meta['_ef_editorial_meta_user_ed'][0] ) . '</td>';
								echo '<td style="color:#ff0000;">' . make_convert_to_pretty_time( $meta['_ef_editorial_meta_date_ed-deadline'][0] ) . '</td>';
								echo '<td>' . make_convert_author_id( $meta['_ef_editorial_meta_user_ce'][0] ) . '</td>';
								echo '<td style="color:#ff0000;">' . make_convert_to_pretty_time( $meta['_ef_editorial_meta_date_ce-deadline'][0] ) . '</td>';
								// echo '<td>' . make_convert_boolean( $meta['_ef_editorial_meta_checkbox_tr'][0] ) . '</td>';
								// echo '<td>' . make_convert_boolean( $meta['_ef_editorial_meta_checkbox_needs-video'][0] ) . '</td>';
								// echo '<td>' . make_convert_boolean( $meta['_ef_editorial_meta_checkbox_needs-photo'][0] ) . '</td>';
								echo '<td>' . make_get_integer( $meta['_ef_editorial_meta_number_manuscript-estimate'][0] ) . '</td>';
								// echo '<td>' . make_convert_boolean( $meta['_ef_editorial_meta_checkbox_invoice-received'][0] ) . '</td>';
								// echo '<td>' . absint( $meta['_ef_editorial_meta_number_wc'][0] ) . '</td>';
								echo '</tr>';

								$i++;
							}
						}?>
				</tbody>
				
			</table>
			<div class="tablenav bottom">

				<div class="tablenav-pages">
					<span class="displaying-num"><?php echo absint( $query->found_posts ); ?> Items</span>
					<?php echo make_get_pagination_link( $query->max_num_pages, $query_vars['paged'] ); ?>
				</div>
				
			</div>
		</form>
	</div>

<?php

}

/**
 * Hook the page in
 */
function make_add_menu_page() {
	add_submenu_page( 'edit.php?post_type=volume', 'Dashboard', 'Dashboard', 'delete_others_pages', 'manager', 'make_magazine_dashboard_page' );
}

add_action( 'admin_menu', 'make_add_menu_page' );