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
	

	// Load our list table class
	if ( ! class_exists( 'Make_List_Table' ) )
		require_once( 'includes/class.list-table.php' );

	if ( ! class_exists( 'Make_Magazine_Dashboard' ) ) {
		require_once( 'includes/class.magazine-dashboard.php' );

		// Instantiate our content manager class
		$make_magazine_dashboard = new Make_Magazine_Dashboard();

	}