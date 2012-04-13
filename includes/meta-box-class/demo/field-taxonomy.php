<?php
/**
 * In this example file, you can see how the meta box class library
 * can be extended with a custom field class.
 */

if ( ! class_exists( 'RWMB_Taxonomy_Field' ) )
{
	/**
	 * @author Tran Ngoc Tuan Anh
	 * @package RW Meta Box Class Library
	 * @subpackage Taxonomy Field
	 * @license GNU GPL2
	 */
	class RWMB_Taxonomy_Field
	{
		/**
		 * Enqueue scripts and styles
		 *
		 * @return void
		 */
		static function admin_print_styles()
		{
			wp_enqueue_style(
				'rwmb-taxonomy',
				RWMB_CSS_URL . 'taxonomy.css',
				RWMB_VER
			);
			wp_enqueue_script(
				'rwmb-taxonomy',
				RWMB_JS_URL . 'taxonomy.js',
				array( 'jquery', 'wp-ajax-response' ),
				RWMB_VER,
				true
			);
		}


		/**
		 * Add default value for 'taxonomy' field
		 *
		 * @param $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			// Default query arguments for get_terms() function
			$default_args = array(
				'hide_empty' => false
			);

			if ( ! isset( $field['options']['args'] ) )
				$field['options']['args'] = $default_args;
			else
				$field['options']['args'] = wp_parse_args( $field['options']['args'], $default_args );

			// Show field as checkbox list by default
			if ( ! isset( $field['options']['type'] ) )
				$field['options']['type'] = 'checkbox_list';

			// If field is shown as checkbox list, add multiple value
			if (
				'checkbox_list' == $field['options']['type']
				|| 'checkbox_tree' == $field['options']['type']
			)
			{
				$field['multiple'] = true;
				$field['field_name'] = "{$field['field_name']}[]";
			}

			if (
				'checkbox_tree' === $field['options']['type']
				&& !isset( $field['options']['args']['parent'] )
			)
				$field['options']['args']['parent'] = 0;

			return $field;
		}

		/**
		 * Get field HTML
		 *
		 * @param $html
		 * @param $field
		 * @param $meta
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field )
		{
			global $post;

			$options = $field['options'];
			$terms   = get_terms( $options['taxonomy'], $options['args'] );

			$html = '';
			// Checkbox LIST
			if ( 'checkbox_list' === $options['type'] )
			{
				$html = array();
				foreach ( $terms as $term )
				{
					$checked = checked( in_array( $term->slug, $meta ), true, false );
					$html[]  = "<label><input type='checkbox' name='{$field['field_name']}' value='{$term->slug}'{$checked} /> {$term->name}</label>";
				}
				$html = implode( '<br />', $html );
			}
			// Checkbox TREE
			elseif ( 'checkbox_tree' === $options['type'] )
			{
				$html .= self::walk_checkbox_tree( $meta, $field, true );
			}
			// Select
			else
			{
				$multiple = $field['multiple'] ? " multiple='multiple' style='height: auto;'" : "'";
				$html .= "<select name='{$field['field_name']}'{$multiple}>";
				foreach ( $terms as $term )
				{
					$selected = selected( in_array( $term->slug, $meta ), true, false );
					$html    .= "<option value='{$term->slug}'{$selected}>{$term->name}</option>";
				}
				$html .= "</select>";
			}

			return $html;
		}

		/**
		 * Walker for displaying checkboxes in treeformat
		 *
		 * @param $meta
		 * @param $field
		 * @param bool $active
		 *
		 * @return string
		 */
		static function walk_checkbox_tree( $meta, $field, $active = false )
		{
			$options = $field['options'];
			$terms   = get_terms( $options['taxonomy'], $options['args'] );
			$html    = '';
			$hidden	 = ! $active ? ' hidden' : '';

			if ( ! empty( $terms ) )
			{
				$html = "<ul class='rw-taxonomy-tree{$hidden}'>";
				foreach ( $terms as $term )
				{
					$field['options']['args']['parent'] = $term->term_id;

					$checked = checked( in_array( $term->slug, $meta ), true, false );
					$html   .= "<li><label><input type='checkbox' name='{$field['field_name']}' value='{$term->slug}'{$checked} /> {$term->name}</label>";
					$html   .= self::walk_checkbox_tree( $meta, $field, ( in_array( $term->slug, $meta ) ) );
					$html   .= "</li>";
				}
				$html .= "</ul>";
			}

			return $html;
		}


		/**
		 * Save post taxonomy
		 *
		 * @param $post_id
		 * @param $field
		 * @param $old
		 *
		 * @param $new
		 */
		static function save( $new, $old, $post_id, $field )
		{
			wp_set_object_terms( $post_id, $new, $field['options']['taxonomy'] );
		}


		/**
		 * Standard meta retrieval
		 *
		 * @param mixed 	$meta
		 * @param int		$post_id
		 * @param array  	$field
		 * @param bool  	$saved
		 *
		 * @return mixed
		 */
		static function meta( $meta, $post_id, $saved, $field )
		{
			$options	= $field['options'];

			$meta		= wp_get_post_terms( $post_id, $options['taxonomy'] );
			$meta		= is_array( $meta ) ? $meta : (array) $meta;
			$meta		= wp_list_pluck( $meta, 'slug' );

			return $meta;
		}
	} // END Class RWMB_Taxonomy_Field
} // endif;

/**
 * Register meta boxes
 *
 * @return void
 */
function PREFIX_register_meta_boxes()
{
	if ( ! class_exists( 'RW_Meta_Box' ) )
		return;

	$prefix = 'YOUR_PREFIX_';
	$tax_box = array(
		'id' => 'taxonomy-test',
		'title' => 'Taxonomy Test',
		'fields' => array(
			// Taxonomy
			array(
				'name'    => 'Categories',
				'id'      => "{$prefix}cats",
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy'	=> 'category',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tre' or 'select'. Optional
					'type'		=> 'checkbox_tree',
					// Additional arguments for get_terms() function
					'args'		=> array()
				),
				'desc'		=> 'Choose One Category'
			)
		)
	);

	new RW_Meta_Box( $tax_box );
}

add_action( 'admin_init', 'PREFIX_register_meta_boxes' );