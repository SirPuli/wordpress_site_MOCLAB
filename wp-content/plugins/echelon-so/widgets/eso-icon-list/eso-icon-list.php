<?php

/*
Widget Name: E: Icon List
Description: An icon based text list.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoIconList extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-icon-list',
			__('E: Icon List', 'echelon-so'),
			array(
				'description' => __('An icon based text list.', 'echelon-so'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Tempalte Variables
	*/

	function get_template_variables($instance, $args) {
		$return = array();

		// content
		if (!empty($instance['icon_list']['items'])) {
			$return['list_items'] = $instance['icon_list']['items'];
		} else {
			$return['list_items'] = false;
		}

		// modifiers
		$return['text_class'] = array();
		(empty($instance['modifiers']['font_size'])) ?: $return['text_class'][] = $instance['modifiers']['font_size'];

		$return['wrap_class'] = array();
		(empty($instance['modifiers']['align'])) ?: $return['wrap_class'][] = $instance['modifiers']['align'];

		$return['icon_size'] = !empty($instance['modifiers']['icon_size']) ? $instance['modifiers']['icon_size'] : '20px;';

		return $return;
	}

	/*
	* Tempalte Variables
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['icon_list'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelonso-text-domain' ),
			'hide' => true,
			'fields' => array(
				'items' => array(
					'type' => 'repeater',
					'label' => __( 'Icon List' , 'echelon-so' ),
					'item_name'  => __( 'List Item', 'siteorigin-widgets' ),
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => __( 'Text', 'echelon-so' )
						),
						'text_color' => array(
							'type' => 'color',
							'label' => __( 'Text Color', 'echelon-so' ),
							'default' => '#252525'
						),
						'icon' => array(
							'type' => 'icon',
							'label' => __( 'Icon', 'echelon-so' )
						),
						'icon_color' => array(
							'type' => 'color',
							'label' => __( 'Icon Color', 'echelon-so' ),
							'default' => '#cb2027'
						),
					)
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'align' => array(
					'type' => 'select',
					'default' => 'uk-flex-left',
					'label' => __('Align', 'echelon-so'),
					'options' => $echelon_so_modifiers->flex_h()
				),
				'font_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Text Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'icon_size' => array(
					'type' => 'multi-measurement',
					'autofill' => true,
					'default' => '15px',
					'label' => __( 'Icon Size', 'echelon-so' ),
					'measurements' => array(
						'width' => array(
							'units' => array( 'px' ),
						)
					)
				)
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

siteorigin_widget_register('echelonso-eso-icon-list', __FILE__, 'EchelonSOEsoIconList');
