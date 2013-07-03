<?php
	
	/**
	 * Extends the WP_List_Table class so we can create awesome tables like WordPress but for oursevles. 'Cause we're selfish ^_^
	 *
	 * @package makeblog
	 * @author Cole Geissinger <cgeissinger@makermedia.com>
	 *
	 * @version 0.1
	 * @since   0.1
	 */
	class Make_List_Table extends WP_List_Table {

		function __construct() {
			global $status, $page;

			// Set parent defaults
			parent::__construct( array(
				'singular' => 'Content',
				'plural'   => 'Contents',
				'ajax'	   => true,
			) );
		}


		function column_default( $item, $column_name ) {
			switch ( $column_name ) {
				case 'rating':
				case 'director':
					return $item[ $column_name ];
				default:
					return print_r( $item, true );
			}
		}
	}