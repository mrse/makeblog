<?php
	
	/**
	 * The main class that creates all the goodness that is FilePress
	 *
	 * @package makeblog
	 * @author Cole Geissinger <cgeissinger@makermedia.com>
	 *
	 * @version 0.1
	 * @since   0.1
	 */
	class Make_Manager {

		/**
		 * Set the version of this plugin
		 * @var string
		 */
		public $version = '0.1';


		/**
		 * Set the name of the plugin
		 * @var string
		 */
		public $plugin_name = 'Manager';


		/**
		 * The class constructor. Load all actions and filters and other functions that need to load.
		 *
		 * @var function
		 */
		public function __construct() {

			// Register our custom admin page
			add_action( 'admin_menu', 'register_admin_menu' );

		}


		public function register_admin_menu() {
			add_submenu_page( 'edit.php?post_type=volume', $this->plugin_name, $this->plugin_name, 'delete_others_pages', 'manager', 'admin_menu_callback' );
		}


		public function admin_menu_callback() {
			
		}
	}