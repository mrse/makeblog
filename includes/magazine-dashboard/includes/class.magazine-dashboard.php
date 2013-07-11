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
			add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );

			// Load screen options stuff ONLY on the page we need it
			add_action( 'load-volume_page_manager', array( $this, 'add_options' ) );

			add_filter( 'set-screen-option', 'table_set_option' );

		}


		public function register_admin_menu() {
			add_submenu_page( 'edit.php?post_type=volume', $this->plugin_name, 'Dashboard', 'delete_others_pages', 'manager', array( $this, 'admin_menu_callback' ) );
		}


		public function admin_menu_callback() {
    
		    // Create an instance of our package class...
		    $list_table = new Make_List_Table();

		    //Fetch, prepare, sort, and filter our data...
		    $list_table->prepare_items(); ?>
		    <div class="wrap">
		        
		        <div id="icon-users" class="icon32"><br/></div>
		        <h2><?php echo $this->plugin_name; ?></h2>
		        <?php $list_table->get_data(); ?>
		        <form id="movies-filter" method="get">
		        	<?php $list_table->views(); ?>
		            <input type="hidden" name="page" value="<?php echo admin_url() . 'edit.php?post_type=' . $_GET['post_type'] . '&page=' .$_REQUEST['page']; ?>" />
					<?php $list_table->search_box('search', 'search_id'); ?>
		            <?php $list_table->display(); ?>
		            
		        </form>
	
		    </div>
		    <?php
		}


		public function add_options() {
			global $list_table;

			$option = 'per_page';
			$args   = array(
				'label' => 'Results',
				'default' => 20,
				'option' => 'results_per_page',
			);
			//add_screen_option( $option, $args );

			$list_table = new Make_List_Table();
		}


		public function table_set_option( $status, $option, $value ) {
			return $value;
		}
	}