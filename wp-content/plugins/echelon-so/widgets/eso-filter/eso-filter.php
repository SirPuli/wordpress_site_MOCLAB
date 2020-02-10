<?php

/*
Widget Name: E: Filter
Description: Masonry and grid content filters.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoFilter extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-filter',
			__('E: Filter', 'echelon-so'),
			array(
				'description' => __('Masonry and grid content filters.', 'echelon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		$return['items'] = !empty( $instance['items'] ) ? $instance['items'] : '';
		$return['all'] = !empty( $instance['modifiers']['all'] ) ? $instance['modifiers']['all'] : 'All';
		$return['masonry'] = $instance['modifiers']['masonry'];

		$return['items_class'] = array();
		(empty($instance['modifiers']['col_width'])) ?: $return['items_class'][] = $instance['modifiers']['col_width'];
		(empty($instance['modifiers']['col_width_s'])) ?: $return['items_class'][] = $instance['modifiers']['col_width_s'];
		(empty($instance['modifiers']['col_width_m'])) ?: $return['items_class'][] = $instance['modifiers']['col_width_m'];
		(empty($instance['modifiers']['col_width_l'])) ?: $return['items_class'][] = $instance['modifiers']['col_width_l'];
		(empty($instance['modifiers']['grid'])) ?: $return['items_class'][] = $instance['modifiers']['grid'];

		$return['nav_class'] = array();
		(empty($instance['modifiers']['nav_align'])) ?: $return['nav_class'][] = $instance['modifiers']['nav_align'];
		(empty($instance['modifiers']['nav_weight'])) ?: $return['nav_class'][] = $instance['modifiers']['nav_weight'];

		// lightbox
		$return['lightbox'] = '';
		(empty($instance['filter']['lightbox'])) ?: $return['lightbox'] = 'uk-lightbox';

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['items'] = array(
			'type' => 'repeater',
			'label' => __( 'Items' , 'echelon-so' ),
			'item_name'  => __( 'Filterable Item', 'siteorigin-widgets' ),
			'fields' => array(
				'content' => array(
					'type' => 'builder',
					'label' => __( 'Content', 'echelon-so' )
				),
				'tag' => array(
					'type' => 'text',
					'label' => __( 'Tag', 'echelon-so' )
				)
			)
		);

		$return['filter'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'lightbox' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Lightbox', 'echelon-so'),
					'description' => __('Setting this will allow the Filter to work with Lightbox Component widgets.', 'echelon-so'),
					'options' => array(
						'0' => __('-', 'echelon-so'),
						'slide' => __('Slide', 'echelon-so'),
					)
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'all' => array(
					'type' => 'Text',
					'default' => 'All',
					'label' => __('All Label', 'echelon-so'),
				),
				'nav_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Nav Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'col_width' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-1',
					'label' => __('Columns', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width()
				),
				'col_width_s' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-2@s',
					'label' => __('Columns Above Small', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width_s()
				),
				'col_width_m' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-3@m',
					'label' => __('Columns Above Medium', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width_m()
				),
				'col_width_l' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-3@l',
					'label' => __('Columns Above Large', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width_l()
				),
				'grid' => array(
					'type' => 'select',
					'default' => 'uk-grid-small',
					'label' => __('Grid', 'echelon-so'),
					'options' => $echelon_so_modifiers->grid()
				),
				'masonry' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Masonry', 'echelon-so'),
					'options' => array(
						'false' => __('-', 'echelon-so'),
						'true' => __('Masonry', 'echelon-so'),
					)
				),
				'nav_align' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Nav Align', 'echelon-so'),
					'options' => $echelon_so_modifiers->flex_h()
				),
			)
		);

		return $return;

	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so;
		return $echelon_so->form_teaser();
	}

}

siteorigin_widget_register('echelonso-eso-filter', __FILE__, 'EchelonSOEsoFilter');
