<?php
	
	/**
	 * Extends the WP_List_Table class so we can create awesome tables like WordPress but for oursevles. 'Cause we're selfish ^_^
	 *
	 * @package makeblog
	 * @author Cole Geissinger <cgeissinger@makermedia.com>
	 *
	 * @version 1.0
	 */
	class Make_List_Table extends WP_List_Table {

		/**
		 * Reference the parent constuctor in WP_List_Table and set some default configurations.
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		function __construct() {
			global $status, $page;

			// Set parent defaults
			parent::__construct( array(
				'singular' => 'content',
				'plural'   => 'contents',
				'ajax'	   => true,
			) );
		}


		/**
		 * Called when the parent class can't find a function specifically built for a given column
		 * @param  array $item        A singular item (one full row's worth of data)
		 * @param  array $column_name The name/slug of the column to be processed
		 * @return string             Text or HTML to be placed inside the column <td>
		 * 
		 * @version  1.0
		 * @since    1.0
		 */
		function column_default( $item, $column_name ) {

			switch ( $column_name ) {
				case 'post_parent':
				case 'post_type':
				case 'post_status':
				case 'section':
				case 'post_title':
				case 'post_author':
				case 'post_date':
				case 'ef_pc':
				case 'ef_assignment':
				case 'ef_first_deadline':
				case 'ef_ed':
				case 'ef_ed_deadline':
				case 'ef_ce':
				case 'ef_ce_deadline':
				case 'ef_tr':
				case 'ef_needs_video':
				case 'ef_needs_photo':
				case 'ef_manuscript_estimate':
				case 'ef_invoice_received':
				case 'ef_wc':
					return $item->$column_name;
				//default:
					//return print_r( $item, true );
			}
		}


	    /**
	     * The 'cb' column is given special treatment when columns are processed. This function will allow us to do that.
	     * @param  array  $item A singular item (one full row's worth of data)
	     * @return string       Text to be placed inside the column <td> (post title only)
	     *
	     * @version  1.0
	     * @since    1.0
	     */
	    function column_cb( $item ) {
	        return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], absint( $item->ID ) );
	    }


	    /**
		 * Every time the class needs to render a column, it first looks for a method named column_{$column_title} - if it exists, that function is ran, or else column_default() is.
		 *
		 * This function will process the post parent ID and return the parent post title
		 * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
		 *
		 * @version  1.0
		 * @since    1.0
		 */
	    function column_post_parent( $item ) {

	    	// Check if the post_parent isn't set to zero
	    	if ( $item->post_parent != 0 )
		    	$title = get_the_title( absint( $item->post_parent ) );

	    	return $title;
	    }


	    /**
		 * Every time the class needs to render a column, it first looks for a method named column_{$column_title} - if it exists, that function is ran, or else column_default() is.
		 *
		 * This function will implment the "rollover" actions for editing and trashing a post.
		 * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		function column_post_title( $item ) {
        
	        //Build row actions
	        $actions = array(
	            'edit'      => sprintf( '<a href="%1$spost.php?post=%2$s&action=edit" title="%3$s">%4$s</a>', admin_url(), absint( $item->ID ), __( 'Edit this item', 'make' ), __( 'Edit', 'make' ) ),
	            // 'delete'    => sprintf( '<a href="%1$s" class="submitdelete" title="%2$s">%3$s</a>', wp_nonce_url( admin_url( 'post.php?post=' . absint( $item->ID ) . '&action=trash' ) ), __( 'Move this item to the Trash', 'make' ), __( 'Trash', 'make' ) ),
	        );
	        
	        //Return the title contents
	        return sprintf( '<a href="%1$s" title="%2$s" class="row-title">%3$s</a>%4$s', admin_url( '/post.php?post=' . absint( $item->ID ) . '&action=edit' ), __( 'Edit this item', 'make' ), sanitize_text_field( $item->post_title ), $this->row_actions( $actions ) );
	    }


	    /**
		 * Every time the class needs to render a column, it first looks for a method named column_{$column_title} - if it exists, that function is ran, or else column_default() is.
		 *
		 * This function will implment the "rollover" actions for editing and trashing a post.
		 * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
		 *
		 * @version  1.0
		 * @since    1.0
		 */
		function column_post_author( $item ) {
			return $this->get_author( $item->post_author );
		}


	     /**
	     * Get the post date and format it into something better.
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_post_date( $item ) {
	    	return $this->get_date( $item->post_date, true );
	    }


	    /**
	     * Return a proper date for display
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_first_deadline( $item ) {
	    	return $this->get_date( $item->ef_first_deadline );
	    }


	    /**
	     * Return a linked author URL and name
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_ed( $item ) {
	    	return $this->get_author( $item->ef_ed );
	    }


	    /**
	     * Return a proper date for display
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_ed_deadline( $item ) {
	    	return $this->get_date( $item->ef_ed_deadline );
	    }


	    /**
	     * Return a linked author URL and name
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_ce( $item ) {
	    	return $this->get_author( $item->ef_ce );
	    }

	    /**
	     * Return a proper date for display
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_ce_deadline( $item ) {
	    	return $this->get_date( $item->ef_ce_deadline );
	    }


	    /**
	     * Process the boolean value set in EditFlow into text
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_tr( $item ) {
	    	return $this->process_boolean_value( $item->ef_tr );
	    }


	    /**
	     * Process the boolean value set in EditFlow into text
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_needs_video( $item ) {
	    	return $this->process_boolean_value( $item->ef_needs_video );
	    }


	    /**
	     * Process the boolean value set in EditFlow into text
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_needs_photo( $item ) {
	    	return $this->process_boolean_value( $item->ef_needs_photo );
	    }


	    /**
	     * Process the boolean value set in EditFlow into text
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_ef_invoice_received( $item ) {
	    	return $this->process_boolean_value( $item->ef_invoice_received );
	    }


	    /**
	     * Dictates teh table's columns. This should return an array where the key is the column slug (and class) and the value is the column's title text.
	     * We'll also add a column for bulk actions by defining the 'cb' key.
	     * @return array An associative array containing column information
	     *
	     * @version 1.0
	     * @since    1.0
	     */
	    function get_columns() {

	        $columns = array(
	            'cb'          => '<input type="checkbox" />', //Render a checkbox instead of text
	            'post_parent' => __( 'Volume', 'make' ),
	            'post_type'   => __( 'Content Type', 'make' ),
	            'post_status' => __( 'Status', 'make' ),
	            'section'	  => __( 'Section', 'make' ),
	            'post_title'  => __( 'Title', 'make' ),
	            'post_author' => __( 'Author', 'make' ),
	            'post_date'	  => __( 'Date', 'make' ),
	            'ef_pc' => __( 'PC', 'make' ), 
				'ef_assignment' => __( 'Assignment', 'make' ),
				'ef_first_deadline' => __( '1st Deadline', 'make' ),
				'ef_ed' => __( 'ED', 'make' ),
				'ef_ed_deadline' => __( 'ED Deadline', 'make' ),
				'ef_ce' => __( 'CE', 'make' ),
				'ef_ce_deadline' => __( 'CE Deadline', 'make' ),
				'ef_tr' => __( 'TR', 'make' ),
				'ef_needs_video' => __( 'Needs Video', 'make' ),
				'ef_needs_photo' => __( 'Needs Photo', 'make' ),
				'ef_manuscript_estimate' => __( 'Manuscript Estimate', 'make' ),
				'ef_invoice_received' => __( 'Invoice Recived', 'make' ),
				'ef_wc' => __( 'WC', 'make' ),
	        );

	        return $columns;
	    }


	    /**
	     * Formats strings or other time formates to something prettier
	     * @param  string  $date      The date to convert
	     * @param  boolean $is_string Sometime we may need to convert a string to a time format. Setting this to true will do that.
	     * @return string
	     *
	     * @version  1.0
	     * @since    1.0
	     */
	    function get_date( $date, $is_string = false ) {

	    	// Did we pass a date of some sort?
	    	if ( empty( $date ) )
	    		return;

	    	// Convert our string to time
	    	if ( $is_string )
	    		$date = strtotime( $date );

	    	return date( 'M d, Y', $date );
	    }


	    /**
	     * An easy to use function to return an author linked based on the ID
	     * @param  integer $author_id The author ID
	     * @return string
	     *
	     * @version  1.0
	     * @since    1.0
	     */
	    function get_author( $author_id ) {

	    	// Make sure we actually passed some data..
	    	if ( empty( $author_id ) )
	    		return;

	    	$user = get_userdata( absint( $author_id ) );

			return '<a href="' . get_author_posts_url( absint( $author_id ) ) . '">' . sanitize_text_field( $user->display_name ) . '</a>';
	    }


	    /**
	     * Return a text version of a boolean
	     * @param  boolean $boolean The value of a true or false value in a numeric value
	     * @return string
	     *
	     * @version  1.0
	     * @since    1.0
	     */
	    function process_boolean_value( $boolean ) {

	    	// Make sure we are actually passing a numeric value
	    	if ( empty( $boolean ) || ! absint( $boolean ) )
	    		return;

	    	if ( $boolean ) {
	    		$bool = 'Yes';
	    	} else {
	    		$bool = 'No';
	    	}

	    	return $bool;
	    }


	    /**
	     * Enables sorting on our columns. Define which columns should be sortable.
	     * Key is the column name and the value is the Database field. False mean it is not sorted by default in the front end.
	     * @return array An associative array containing all the columns that should be sortaable.
	     *
	     * @version  1.0
	     * @since    1.0
	     */
	    function get_sortable_columns() {
	        $sortable_columns = array(
	            'volume'      => array( 'volume', false ),
	            'post_type'	  => array( 'post_type', false ),
	            'section'     => array( 'section', false ),
	            'post_status' => array( 'post_status', false ),
	            'post_date'	  => array( 'post_date', false ),
	        );
	        return $sortable_columns;
	    }


	    /**
	     * Creates our bulk action options. This is setup as an associative array .
	     * @return array An associative array containing all the bulk actions.
	     *
	     * @version  1.0
	     * @since    1.0
	     */
	    function get_bulk_actions() {
	        $actions = array(
	            'delete'    => __( 'Delete', 'make' ),
	        );
	        return $actions;
	    }


	    /**
	     * Handles the bulk actions.
	     * @return void
	     *
	     * @version  1.0
	     * @since    1.0
	     */
	    function process_bulk_action() {
        
	        //D etect when a bulk action is being triggered...
	        // if ( 'trash' === $this->current_action() ) {
	        //     wp_die( 'Items deleted (or they would be if we had items to delete)!' );
	        // }
	        // 
	        // return $this->
	        
	    }


	    function get_views() {
	    	$views = array(
	    		'all' => '<a href="#">ALL</a>',
	    	);

	    	return $views;
	    }


	    /**
	     * Prepare our data for display.
	     *
	     * This function will query the database, sort and filter the data.
	     * @return  void
	     * 
	     * @version  1.0
	     * @since    1.0
	     */
	    function prepare_items() {
	        global $wpdb, $post, $_wp_column_headers;

	        // The current screen object
	        $screen = get_current_screen();

	        // Ordering parameters
	        $orderby = ! empty( $_GET['orderby'] ) ? esc_html( $_GET['orderby'] ) : 'post_date';
	        if ( isset( $_GET['order'] ) && ( $_GET['order'] == 'ASC' ) ) {
	        	$order = 'ASC';
	        } else {
	        	$order = 'DESC';
	        }

	        // Display only 20 results per page.
	        $per_page = 20;
	        
	        // Build an array to be used by the class for column header. Send in the three arrays we defined eariler in this function
	        $this->_column_headers = $this->get_column_info();
	        
	        // Process our bulk actions function
	        $this->process_bulk_action();

	        // Query the database with the $wpdb class and return all the results for our class to manipulate
	        $data = $wpdb->get_results( $wpdb->prepare( "SELECT {$wpdb->posts}.ID, {$wpdb->posts}.post_title, {$wpdb->posts}.post_status, {$wpdb->posts}.post_type, {$wpdb->posts}.post_author, {$wpdb->posts}.post_date , {$wpdb->posts}.post_parent
	        											 FROM {$wpdb->posts}
	        											 WHERE {$wpdb->posts}.post_type IN ( 'projects', 'magazine', 'review', 'errata', 'volume' ) 
	        											 AND {$wpdb->posts}.post_status NOT IN ( 'publish', 'trash' ) 
	        											 ORDER BY $orderby $order", $orderby ) );
	        											 
	        // $data = get_posts( array(
	        // 	'posts_per_page' => -1,
	        // 	'post_type' => array( 'projects', 'magazine', 'review', 'errata', 'volume' ),
	        // 	'post_status' => 'any',
	        // ) );

	        if ( is_array( $data ) ) {
	        	$editflow_meta_names = array(
	        		'_ef_editorial_meta_number_pc' => 'ef_pc', 
					'_ef_editorial_meta_paragraph_assignment' => 'ef_assignment',
					'_ef_editorial_meta_date_1st-deadline' => 'ef_first_deadline',
					'_ef_editorial_meta_user_ed' => 'ef_ed',
					'_ef_editorial_meta_date_ed-deadline' => 'ef_ed_deadline',
					'_ef_editorial_meta_user_ce' => 'ef_ce',
					'_ef_editorial_meta_date_ce-deadline' => 'ef_ce_deadline',
					'_ef_editorial_meta_checkbox_tr' => 'ef_tr',
					'_ef_editorial_meta_checkbox_needs-video' => 'ef_needs_video',
					'_ef_editorial_meta_checkbox_needs-photo' => 'ef_needs_photo',
					'_ef_editorial_meta_number_manuscript-estimate' => 'ef_manuscript_estimate',
					'_ef_editorial_meta_checkbox_invoice-received' => 'ef_invoice_received',
					'_ef_editorial_meta_number_wc' => 'ef_wc',
	        	);

	        	// Loop through each query and append postmeta info. 
	        	foreach ( $data as $data_post ) {
	        		foreach ( $editflow_meta_names as $meta_name => $new_meta_name ) {
		        		$meta = get_post_meta( $data_post->ID, $meta_name, true );

		        		if ( ! empty( $meta ) )
			        		$data_post->$new_meta_name = $meta;
		        	}
	        	}
	        }
	                
	        // Figure out what page the user is currently looking at. We'll need this later, so this should always be included in it's own package classes.
	        $current_page = $this->get_pagenum();

	        // Check how many items are in our data array.
	        $total_items = count( $data );
	        
	        // // The WP_List_Table class does not handle pagination for us, so we need to ensure that the data is trimmed to only the current page. We can use array_slice() too 
	        $data = array_slice( $data, ( ( $current_page - 1 ) * $per_page ), $per_page );
	        
	        // Register our pagination options & calculations.
	        $this->set_pagination_args( array(
	            'total_items' => $total_items,                  	// Calculated total number of items
	            'per_page'    => $per_page,                     	// Number of items to show per page
	            'total_pages' => ceil( $total_items / $per_page )   // Calculate the total number of pages
	        ) );

	        // var_dump($data);

	        // Now we can add our sorted data to the items property, where it can be used by the rest of the class.
	        $this->items = $data;
	    }
	}