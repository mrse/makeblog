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

		// Set the name of the Editflow metakey prefix
        public $ef_meta = '_ef_editorial_meta';
        public 

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
				'ajax'	   => false,
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
			global $ef_meta;

			switch ( $column_name ) {
				case 'post_parent':
				case 'post_type':
				case 'post_status':
				// case 'section':
				case 'post_title':
				case 'post_author':
				case 'post_date':
				case '_ef_editorial_metadata_number_pc':
				case '_ef_editorial_metadata_paragraph_assignment':
				case '_ef_editorial_metadata_date_1st-deadline':
				case '_ef_editorial_metadata_user_ed':
				case '_ef_editorial_metadata_date_ed-deadline':
				case '_ef_editorial_metadata_user_ce':
				case '_ef_editorial_metadata_date_ce-deadline':
				case '_ef_editorial_metadata_checkbox_tr':
				case '_ef_editorial_metadata_checkbox_needs-video':
				case '_ef_editorial_metadata_checkbox_needs-photo':
				case '_ef_editorial_metadata_number_manuscript-estimate':
				case '_ef_editorial_metadata_checkbox_invoice-received':
				case '_ef_editorial_metadata_number_wc':
					return $item->$column_name;
				//default:
					//return print_r( $item, true );
			}
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
	            'edit'      => sprintf( '<a href="%1$spost.php?post=%2$s&action=edit" title="%3$s">%4$s</a>', admin_url(), $item->ID, __( 'Edit this item', 'make' ), __( 'Edit', 'make' ) ),
	            'delete'    => sprintf( '<a href="%1$spost.php?post=%2$s&action=trash&_wpnonce=111111" class="submitdelete" title="%3$s">%4$s</a>', admin_url(), $item->ID, __( 'Move this item to the Trash', 'make' ), __( 'Trash', 'make' ) ),
	        );
	        
	        //Return the title contents
	        return sprintf( '<a href="%1$s" title="%2$s" class="row-title">%3$s</a>%4$s', admin_url() . 'post.php?post=' . $item->ID . '&action=edit', __( 'Edit this item', 'make' ), $item->post_title, $this->row_actions( $actions ) );
	    }


	    /**
	     * Get the post date and format it into something better.
	     * @param  array  $item A singular item (one full row's worth of data)
		 * @return string       Text to be placed inside the column <td> (post title only)
	     */
	    function column_post_date( $item ) {

	    	$date = strtotime( $item->post_date );

	    	return date( 'M d, Y', $date );
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
		    	$title = get_the_title( $item->post_parent );

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
		function column_post_author( $item ) {

			$user = get_userdata( $item->post_author );

			return '<a href="' . get_author_posts_url( $item->post_author ) . '">' . $user->display_name . '</a>';
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
	        return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $item->ID );
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
	    	global $ef_meta;

	        $columns = array(
	            'cb'          => '<input type="checkbox" />', //Render a checkbox instead of text
	            'post_parent' => __( 'Volume', 'make' ),
	            'post_type'   => __( 'Content Type', 'make' ),
	            'post_status' => __( 'Status', 'make' ),
	            'section'	  => __( 'Section', 'make' ),
	            'post_title'  => __( 'Title', 'make' ),
	            'post_author' => __( 'Author', 'make' ),
	            'post_date'	  => __( 'Date', 'make' ),
	            $ef_meta . '_number_pc' => __( 'PC', 'make' ), 
				$ef_meta . '_paragraph_assignment' => __( 'Assignment', 'make' ),
				$ef_meta . '_date_1st-deadline' => __( '1st Deadline', 'make' ),
				$ef_meta . '_user_ed' => __( 'ED', 'make' ),
				$ef_meta . '_date_ed-deadline' => __( 'ED Deadline', 'make' ),
				$ef_meta . '_user_ce' => __( 'CE', 'make' ),
				$ef_meta . '_date_ce-deadline' => __( 'CE Deadline', 'make' ),
				$ef_meta . '_checkbox_tr' => __( 'TR', 'make' ),
				$ef_meta . '_checkbox_needs-video' => __( 'Needs Video', 'make' ),
				$ef_meta . '_checkbox_needs-photo' => __( 'Needs Photo', 'make' ),
				$ef_meta . '_number_manuscript-estimate' => __( 'Manuscript Estimate', 'make' ),
				$ef_meta . '_checkbox_invoice-received' => __( 'Invoice Recived', 'make' ),
				$ef_meta . '_number_wc' => __( 'WC', 'make' ),
	        );

	        return $columns;
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
	            'trash'    => __( 'Trash', 'make' ),
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
	        if ( 'trash' === $this->current_action() ) {
	            wp_die( 'Items deleted (or they would be if we had items to delete)!' );
	        }
	        
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
	        global $wpdb, $post, $_wp_column_headers, $ef_meta;

	        // The current screen object
	        $screen = get_current_screen();

	        // Ordering parameters
	        $orderby = ! empty( $_GET['orderby'] ) ? urlencode( $_GET['orderby'] ) : 'post_date';
	        if ( isset( $_GET['order'] ) && ( $_GET['order'] == 'ASC' ) ) {
	        	$order = 'ASC';
	        } else {
	        	$order = 'DESC';
	        }

	        // Display only 20 results per page.
	        $per_page = 20;

	        // Define our column headers. This includes a complete array of columns to be displayed (slugs & titles), a list of columns to keep hidden, and a list of columns that are sortable.
	        $columns = $this->get_columns();
	        $hidden = array();
	        $sortable = $this->get_sortable_columns();
	        $_wp_column_headers[ $screen->id ] = $columns;
	        
	        // Build an array to be used by the class for column header. Send in the three arrays we defined eariler in this function
	        $this->_column_headers = array( $columns, $hidden, $sortable );
	        
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

	        if ( is_array( $data_posts ) ) {
	        	$editflow_meta_names = array(
	        		$ef_meta . '_number_pc', 
					$ef_meta . '_paragraph_assignment',
					$ef_meta . '_date_1st-deadline',
					$ef_meta . '_user_ed',
					$ef_meta . '_date_ed-deadline',
					$ef_meta . '_user_ce',
					$ef_meta . '_date_ce-deadline',
					$ef_meta . '_checkbox_tr',
					$ef_meta . '_checkbox_needs-video',
					$ef_meta . '_checkbox_needs-photo',
					$ef_meta . '_number_manuscript-estimate',
					$ef_meta . '_checkbox_invoice-received',
					$ef_meta . '_number_wc',
	        	);

	        	foreach ( $data_posts as $data_post ) {

	        		foreach ( $editflow_meta_names as $meta_name ) {
		        		$meta = get_post_meta( $data_post->ID, $meta_name, true );

		        		if ( ! empty( $meta ) )
			        		$data_meta->$meta_name .= $meta;
		        	}
	        	}

	        	$data_done = array_merge( $data, $data_meta );
	        	var_dump( $data_done );
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

	        // Now we can add our sorted data to the items property, where it can be used by the rest of the class.
	        $this->items = $data;
	    }
	}