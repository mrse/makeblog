<?php

$field_data = array (
	'RSS' => array (
		'fields' => array(
			'rss' => array(
				'type' => 'toggle'
				),
		),
	'title'		=> 'RSS Feed of MAKE',
	'context'	=> 'side',
	'pages'		=> array( 'craft' ),
	),
);

$easy_cf = new Easy_CF($field_data);

if ( !class_exists( "Easy_CF_Field_Toggle" ) ) {
	class Easy_CF_Field_Toggle extends Easy_CF_Field {
		public function print_form() {
			$class = ( empty( $this->_field_data['class'] ) ) ? $this->_field_data['id'] . '_class' :  $this->_field_data['class'];
			$input_class = ( empty( $this->_field_data['input_class'] ) ) ? $this->_field_data['id'] . '_input_class' :  $this->_field_data['input_class'];

			$id = ( empty( $this->_field_data['id'] ) ) ? $this->_field_data['id'] :  $this->_field_data['id'];
			$label = ( empty( $this->_field_data['label'] ) ) ? $this->_field_data['id'] :  $this->_field_data['label'];
			$value = $this->get();
			$hint = ( empty( $this->_field_data['hint'] ) ) ? '' :  '<p><em>' . $this->_field_data['hint'] . '</em></p>';

			$admin_only = ( empty( $this->_field_data['args']['admin_only'] ) ) ? false : $this->_field_data['args']['admin_only'];
			
			$admin_only_notice = $admin_only ? '(Admin Only!)' : '';

			$label_format =
				'<div class="%s">'.
				'<p><strong>Add this post to the main MAKE RSS feed?</strong>'.
				'<p><label for="%s"><input type="checkbox" name="%s" %s /><strong> Yes</strong></label></p>'.
				'</div>';
			if ( ! $admin_only || ($admin_only && current_user_can('manage_options') ) )
				printf( $label_format, $class, $label, $admin_only_notice, $hint, $id, $id, checked($value, 1));
			else
				echo '<input type="hidden" name="' . $id . '" value="' . $value . '" />';
		}
	}
}