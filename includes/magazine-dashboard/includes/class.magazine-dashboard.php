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
	
		        <?php //var_dump($list_table->example_data);
		        // $ef_meta = '_ef_editorial_metadata';

		        // // foreach ( $results as $result ) {

		        // // }
		        // // echo '<br />';
		        // $data = get_posts( array(
		        // 	'posts_per_page' => 20,
		        // 	'post_type' => array( 'projects', 'magazine', 'review', 'errata', 'volume' ),
		        // 	'post_status' => 'any',
		   //      	'meta_key' => $ef_meta . '_number_pc',
					// 'meta_key' => $ef_meta . '_paragraph_assignment',
					// 'meta_key' => $ef_meta . '_date_1st-deadline',
					// 'meta_key' => $ef_meta . '_user_ed',
					// 'meta_key' => $ef_meta . '_date_ed-deadline',
					// 'meta_key' => $ef_meta . '_user_ce',
					// 'meta_key' => $ef_meta . '_date_ce-deadline',
					// 'meta_key' => $ef_meta . '_checkbox_tr',
					// 'meta_key' => $ef_meta . '_checkbox_needs-video',
					// 'meta_key' => $ef_meta . '_checkbox_needs-photo',
					// 'meta_key' => $ef_meta . '_number_manuscript-estimate',
					// 'meta_key' => $ef_meta . '_checkbox_invoice-received',
					// 'meta_key' => $ef_meta . '_number_wc',
		        // ) );
		        // var_dump( $data ); ?>
		        
		    </div>
		    <?php
		}
	}