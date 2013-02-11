<?php
/**
 * WordPress Chosen Taxonomy Metabox
 * Author: Helen Hou-Sandi
 *
 * Use Chosen for a replacement taxonomy metabox in WordPress
 * Useful for taxonomies that aren't changed much on the fly and are
 * non-hierarchical in nature, as Chosen is for flat selection only.
 * You can always use the taxonomy admin screen to add/edit taxonomy terms.
 * Categories need slightly different treatment from the rest in order to
 * leverage the correct form field name for saving without interference.
 *
 * Includes two filters:
 *     * ctm_taxes_and_types for filtering the array of post types and taxonomies.
 *       Post types and taxonomies should both be the slug versions.
 *       This filter is more of an example for the moment,
 *       as you would likely edit the member variable directly.
 *     * ctm_tax_label for filtering the label used in the meta box display.
 *       Receives the $tax (slug name of the taxonomy) and the $post_type slug.
 *
 * Example screenshot: http://cl.ly/2T2D232x172G353i2V2C
 *
 * Chosen: http://harvesthq.github.com/chosen/
 */

class ChosenTaxMetabox {

	public $types_and_taxes = array (
		'post' => array (
			'post_tag',
			'category',
			'customtax',
		),
		'custom_post_type' => array (
			'category',
			'customtax',
		),
	);

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

		$this->types_and_taxes = apply_filters( 'ctm_taxes_and_types', $this->types_and_taxes );
	}

	/**
	 * Remove the default meta boxes for each taxonomy and add the replacement
	 * Note that the naming is different based on whether or not the taxonomy is hierarchical
	 */
	public function add_meta_boxes() {
		foreach ( $this->types_and_taxes as $post_type => $taxes ) {
			foreach ( $taxes as $tax ) {
				if ( is_taxonomy_hierarchical( $tax ) )
					remove_meta_box( $tax . 'div', $post_type, 'side' );
				else
					remove_meta_box( 'tagsdiv-' . $tax, $post_type, 'side' );
			}

			add_meta_box( 'chosen-tax', 'Choose Terms', array( $this, 'meta_box_display' ), $post_type, 'side', 'default' );
		}
	}

	/**
	 * Display the replacement meta box itself
	 */
	public function meta_box_display() {
		$post_type = get_post_type();

		// double check to make sure there are taxonomies to show
		if ( empty( $this->types_and_taxes[$post_type] ) )
			return;

		$taxes = $this->types_and_taxes[$post_type];

		wp_nonce_field( 'chosen-save-tax-terms', 'chosen_taxonomy_meta_box_nonce' );
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$( '.chzn-select' ).chosen();
		});
		</script>
		<?php
		foreach ( $taxes as $tax ) {
			/**
			 * You may want to check if the current user can assign terms to
			 * the taxonomy in question before going any further.
			 * It will not save their assignments anyway, but it's a bit of a
			 * funny user experience.
			 */
			$taxonomy = get_taxonomy( $tax );
			$label = apply_filters( "ctm_tax_label" , $taxonomy->labels->name, $tax, $post_type );

			// add more args if you want (e.g. orderby)
			$terms = get_terms( $tax, array( 'hide_empty' => 0 ) );
			$current_terms = wp_get_post_terms ( get_the_ID(), $tax, array('fields' => 'ids') );

			// category needs a special treatment for the input name
			if ( 'category' == $tax )
				$name = 'post_category';
			else
				$name = "tax_input[$tax]";
			?>
			<p><label for="<?php echo $tax; ?>"><?php echo $label; ?></label>:</p>
			<p><select name="<?php echo $name; ?>[]" class="chzn-select widefat" data-placeholder="Select one or more" multiple="multiple">
			<?php
				foreach ( $terms as $term ) {
					// hierarchical taxonomies save by IDs, whereas non save by slugs
					if ( is_taxonomy_hierarchical( $tax ) )
						$value = $term->term_id;
					else
						$value = $term->slug;
			?>
				<option value="<?php echo $value; ?>"<?php selected( in_array( $term->term_id, $current_terms ) ); ?>><?php echo $term->name; ?></option>
			<?php } ?>
			</select>
			</p>
			<?php
		}
	}

	/**
	 * When saving the post, check to see if the taxonomy has been emptied out.
	 * If so, it will not exist in the tax_input array and thus WP won't be aware of it,
	 * so we have to take of emptying the terms for the object.
	 */
	public function save_post( $post_id ) {
		// verify nonce
		if ( ! isset($_POST['chosen_taxonomy_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['chosen_taxonomy_meta_box_nonce'], 'chosen-save-tax-terms' ) )
			return;

		// check autosave
		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
			return;

		$post_type = get_post_type( $post_id );

		// double check to make sure there are taxonomies to process
		if ( empty( $this->types_and_taxes[$post_type] ) )
			return;

		$taxes = $this->types_and_taxes[$post_type];

		// if nothing is posted for a relevant taxonomy, remove the object terms!
		// otherwise, WP will take care of assigning the terms
		foreach ( $taxes as $tax ) {
			// once again, category gets special treatment
			if ( 'category' === $tax )
				$input = isset( $_POST['post_category'] ) ? $_POST['post_category'] : '';
			else
				$input = isset( $_POST['tax_input'][$tax] ) ? $_POST['tax_input'][$tax] : '';

			if ( empty( $input ) ) {
				$taxonomy = get_taxonomy( $tax );
				if ( $taxonomy && current_user_can( $taxonomy->cap->assign_terms ) ) {
					wp_set_object_terms( $post_id, '', $tax );
				}
			}
		}
	}

	/**
	 * Chosen JS and CSS enqueue - assumes you are doing this in a theme
	 * with the JS, CSS, and sprite files in themefolder/js/chosen/
	 * You'd want to use plugins_url() instead if using this in a plugin
	 */
	function admin_enqueue_scripts() {
		$screen = get_current_screen();
		$post_types = array_keys( $this->types_and_taxes );

		if ( 'post' !== $screen->base || ! in_array( $screen->post_type, $post_types ) )
			return;

		wp_enqueue_script(  'chosen', get_template_directory_uri().'/js/chosen/chosen.jquery.min.js', array( 'jquery' ), '1.0' );
		wp_enqueue_style( 'chosen', get_template_directory_uri().'/js/chosen/chosen.css' );
	}
}

new ChosenTaxMetabox;