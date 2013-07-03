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
	

	if ( ! class_exsists( 'Make_Content_Manager' ) )
		require_once( 'includes/class.content-manager.php' );

	$make_content_manager = new Make_Content_Manager();