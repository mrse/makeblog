<?php
	
	/**
	 * The main class that creates all the goodness that is the Magazine Dashboard
	 *
	 * @package makeblog
	 * @author Cole Geissinger <cgeissinger@makermedia.com>
	 *
	 * @version 0.1
	 * @since   0.1
	 */
	class Make_Magazine_Dashboard {

		/**
		 * Set the version of this plugin
		 * @var string
		 */
		public $version = '0.1';


		/**
		 * Set the name of the plugin
		 * @var string
		 */
		public $plugin_name = 'Magazine Dashboard';


		/**
		 * The class constructor. Load all actions and filters and other functions that need to load.
		 *
		 * @var function
		 */
		public function __construct() {

			// Register our custom admin page
			$page_hook = add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );

			// Load screen options stuff ONLY on the page we need it
			add_action( 'load-' . $page_hook, 'add_options' );

		}


		public function register_admin_menu() {
			add_submenu_page( 'edit.php?post_type=volume', $this->plugin_name, 'Dashboard', 'delete_others_pages', 'manager', array( $this, 'admin_menu_callback' ) );
		}


		function admin_menu_callback() {
    
		    // Create an instance of our package class...
		    $list_table = new Make_List_Table();

		    //Fetch, prepare, sort, and filter our data...
		    $list_table->prepare_items(); ?>
		    <div class="wrap">
		        
		        <div id="icon-users" class="icon32"><br/></div>
		        <h2><?php echo $this->plugin_name; ?></h2>
		        
		        <form id="movies-filter" method="get">
		            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
					<?php $list_table->search_box('search', 'search_id'); ?>
		            <?php $list_table->display(); ?>
		            
		        </form>
	
		        <?php
		   //      global $wpdb;
		   // //      	// Query the database with the $wpdb class and return all the results for our class to manipulate
	    //     $data = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title, post_status, post_type, post_author, post_date, post_parent
	    //     											 FROM {$wpdb->posts}
	    //     											 WHERE post_type IN ( 'projects', 'magazine', 'review', 'errata', 'volume' ) 
	    //     											 AND post_status NOT IN ( 'publish', 'trash' ) 
	    //     											 ORDER BY post_date DESC", null ) );
	        											 
	    //     // $data = get_posts( array(
	    //     // 	'posts_per_page' => -1,
	    //     // 	'post_type' => array( 'projects', 'magazine', 'review', 'errata', 'volume' ),
	    //     // 	'post_status' => 'any',
	    //     // ) );

	    //     if ( is_array( $data ) ) {
	    //     	$ef_meta = '_ef_editorial_meta';
	    //     	$editflow_meta_names = array(
	    //     		$ef_meta . '_number_pc', 
					// $ef_meta . '_paragraph_assignment',
					// $ef_meta . '_date_1st-deadline',
					// $ef_meta . '_user_ed',
					// $ef_meta . '_date_ed-deadline',
					// $ef_meta . '_user_ce',
					// $ef_meta . '_date_ce-deadline',
					// $ef_meta . '_checkbox_tr',
					// $ef_meta . '_checkbox_needs-video',
					// $ef_meta . '_checkbox_needs-photo',
					// $ef_meta . '_number_manuscript-estimate',
					// $ef_meta . '_checkbox_invoice-received',
					// $ef_meta . '_number_wc',
	    //     	);

	        		
	    //     	// Loop through each query and append postmeta info. 
	    //     	foreach ( $data as $data_post ) {
	    //     		foreach ( $editflow_meta_names as $meta_name ) {
		   //      		$meta = get_post_meta( $data_post->ID, $meta_name, true );

		   //      		if ( ! empty( $meta ) )
			  //       		$data_post->$meta_name = $meta;
		   //      	}
	    //     	}
	        	
	    //     }
	    //     var_dump( $data );
		        ?>
		        
		    </div>
		    <?php
		}
	}