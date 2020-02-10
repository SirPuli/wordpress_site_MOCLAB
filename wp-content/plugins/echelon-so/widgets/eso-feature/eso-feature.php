<?php
/*
Widget Name: E: Feature
Description: Icon based small and large feature boxes.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoFeature extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-feature',
			__('E: Feature', 'echelon-so'),
			array(
				'description' => __('Icon based small and large feature boxes.', 'echelon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/**
	* Template
	*/

	function get_template_name($instance) {
		return $instance['feature']['template'];
	}

	/**
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		$return = array();

		// content
		$return['title'] = !empty($instance['feature']['title']) ? $instance['feature']['title'] : '';
		$return['body'] = !empty($instance['feature']['body']) ? $instance['feature']['body'] : '';
		$return['label'] = !empty($instance['feature']['label']) ? $instance['feature']['label'] : '';

		// link
		$return['link_target'] = !empty($instance['feature']['link_target']) ? sow_esc_url($instance['feature']['link_target']) : '';
		$return['link_text'] = !empty($instance['feature']['link_text']) ? $instance['feature']['link_text'] : '';

		// icon
		$return['icon_styles']['color'] = 'color: ' . (!empty($instance['feature']['icon_color']) ? $instance['feature']['icon_color'] : 'inherit');
		$return['icon_styles']['size'] = 'font-size: ' . (!empty($instance['feature']['icon_size']) ? $instance['feature']['icon_size'] : '40px');
		$return['icon'] = !empty($instance['feature']['icon']) ? $instance['feature']['icon'] : '';

		// modifiers
		$return['feature_class'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['feature_class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['alignment'])) ?: $return['feature_class'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['padding'])) ?: $return['feature_class'][] = $instance['modifiers']['padding'];
		(empty($instance['modifiers']['inverse'])) ?: $return['feature_class'][] = $instance['modifiers']['inverse'];

		$return['icon_class_default'] = array();
		(empty($instance['modifiers']['icon_margin_right'])) ?: $return['icon_class_default'][] = $instance['modifiers']['icon_margin_right'];

		$return['icon_class_large'] = array();
		(empty($instance['modifiers']['icon_margin_bottom'])) ?: $return['icon_class_large'][] = $instance['modifiers']['icon_margin_bottom'];

		$return['title_class'] = array();
		(empty($instance['modifiers']['title_weight'])) ?: $return['title_class'][] = $instance['modifiers']['title_weight'];
		(empty($instance['modifiers']['title_size'])) ?: $return['title_class'][] = $instance['modifiers']['title_size'];
		(empty($instance['modifiers']['title_margin'])) ?: $return['title_class'][] = $instance['modifiers']['title_margin'];

		$return['body_class'] = array();
		(empty($instance['modifiers']['body_weight'])) ?: $return['body_class'][] = $instance['modifiers']['body_weight'];
		(empty($instance['modifiers']['body_size'])) ?: $return['body_class'][] = $instance['modifiers']['body_size'];
		(empty($instance['modifiers']['body_margin'])) ?: $return['body_class'][] = $instance['modifiers']['body_margin'];

		return $return;
	}

	/**
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['feature'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'template' => array(
					'type' => 'select',
					'default' => 'default',
					'label' => __('Template', 'echelon-so'),
					'options' => array(
						'default' => __('Default', 'echelon-so'),
						'large' => __('Large', 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'title' => array(
					'type' => 'text',
					'default' => '',
					'label' => __('Title', 'echelon-so'),
				),
				'body' => array(
					'type' => 'text',
					'default' => '',
					'label' => __('Body', 'echelon-so'),
				),
				'link_text' => array(
					'type' => 'text',
					'default' => '',
					'label' => __('Link Text', 'echelon-so'),
				),
				'link_target' => array(
					'type' => 'link',
					'label' => __('Link Target', 'widget-form-fields-text-domain'),
					'default' => ''
				),
				'icon' => array(
					'type' => 'icon',
					'label' => __( 'Icon', 'echelon-so' )
				),
				'icon_color' => array(
					'type' => 'color',
					'label' => __( 'Icon Color', 'echelon-so' ),
					'default' => '#252525'
				),
				'icon_size' => array(
					'type' => 'multi-measurement',
					'autofill' => true,
					'default' => '50px',
					'label' => __( 'Icon Size', 'echelon-so' ),
					'description' => __( 'The size of the font.', 'echelon-so' ),
					'measurements' => array(
						'width' => array(
							'units' => array( 'px' ),
						)
					)
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'padding' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Padding', 'echelon-so'),
					'options' => $echelon_so_modifiers->padding(),
					'state_handler' => array(
						'template[default]' => array( 'show' ),
						'template[large]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'icon_margin_right' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Icon Margin', 'echelon-so'),
					'options' => $echelon_so_modifiers->margin_right(),
					'state_handler' => array(
						'template[default]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'icon_margin_bottom' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Icon Margin', 'echelon-so'),
					'options' => $echelon_so_modifiers->margin_bottom(),
					'state_handler' => array(
						'template[large]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'title_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Title Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'title_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Title Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'title_margin' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Title Margin', 'echelon-so'),
					'options' => $echelon_so_modifiers->margin_bottom(),
				),
				'body_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Body Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'body_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Body Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_size()
				),
				'body_margin' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Body Margin', 'echelon-so'),
					'options' => $echelon_so_modifiers->margin_bottom(),
				),
				'alignment' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Alignment', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_align()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse(),
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

siteorigin_widget_register('echelonso-eso-feature', __FILE__, 'EchelonSOEsoFeature');
