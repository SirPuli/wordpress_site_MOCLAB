<?php

/*
Widget Name: E: Slider
Description: Slider framework for other widgets.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoSlider extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-slider',
			__('E: Slider', 'echelon-so'),
			array(
				'description' => __('Slider framework for other widgets.', 'echelon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template
	*/

	function get_template_name($instance) {
		return 'default';
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		// content
		$return['frames'] = !empty( $instance['frames'] ) ? $instance['frames'] : '';

		// modifiers - general
		$return['show_nav'] = $instance['modifiers']['show_nav'];
		$return['show_dot'] = $instance['modifiers']['show_dot'];
		$return['autoplay'] = $instance['modifiers']['autoplay'];
		$return['autoplay_interval'] = intval($instance['modifiers']['autoplay_interval']) * 1000;

		$return['nav_wrap_class'] = array();
		(!empty($instance['modifiers']['nav_outside'])) ?: $return['nav_wrap_class'][] = 'uk-visible-toggle';

		$return['items_class'] = array();
		(empty($instance['modifiers']['col_width'])) ?: $return['items_class'][] = $instance['modifiers']['col_width'];
		(empty($instance['modifiers']['col_width_s'])) ?: $return['items_class'][] = $instance['modifiers']['col_width_s'];
		(empty($instance['modifiers']['col_width_m'])) ?: $return['items_class'][] = $instance['modifiers']['col_width_m'];
		(empty($instance['modifiers']['col_width_l'])) ?: $return['items_class'][] = $instance['modifiers']['col_width_l'];
		(empty($instance['modifiers']['grid'])) ?: $return['items_class'][] = $instance['modifiers']['grid'];

		$return['nav_class'] = array();
		(empty($instance['modifiers']['nav_inverse'])) ?: $return['nav_class'][] = $instance['modifiers']['nav_inverse'];

		$return['nav_left_class'] = array();
		$return['nav_left_class'][] = !empty($instance['modifiers']['nav_outside']) ? 'uk-position-center-left-out' : 'uk-position-center-left';

		$return['nav_right_class'] = array();
		$return['nav_right_class'][] = !empty($instance['modifiers']['nav_outside']) ? 'uk-position-center-right-out' : 'uk-position-center-right';

		$return['dot_class'] = array();
		(empty($instance['modifiers']['dot_inverse'])) ?: $return['dot_class'][] = $instance['modifiers']['dot_inverse'];

		$return['transition'] = !empty($instance['modifiers']['transition']) ? 'uk-transition-active' : 'eso';

		// lightbox
		$return['lightbox'] = '';
		(empty($instance['slider']['lightbox'])) ?: $return['lightbox'] = 'uk-lightbox';

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$return['frames'] = array(
			'type' => 'repeater',
			'label' => __( 'Frames' , 'echelon-so' ),
			'item_name'  => __( 'Frame', 'siteorigin-widgets' ),
			'fields' => array(
				'content' => array(
					'type' => 'builder',
					'label' => __( 'Content', 'echelon-so' )
				),
			)
		);

		$option_template_center = 'Center' . $echelon_so->prime_tag();

		$return['slider'] = array(
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
						'center' => __($option_template_center, 'echelon-so')
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'lightbox' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Lightbox', 'echelon-so'),
					'description' => __('Setting this will allow the Slider to work with Lightbox Component widgets.', 'echelon-so'),
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
				'col_width' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-1',
					'label' => __('Columns', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width(),
				),
				'col_width_s' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-2@s',
					'label' => __('Columns Above Small', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width_s(),
				),
				'col_width_m' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-3@m',
					'label' => __('Columns Above Medium', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width_m(),
				),
				'col_width_l' => array(
					'type' => 'select',
					'default' => 'uk-child-width-1-3@l',
					'label' => __('Columns Above Large', 'echelon-so'),
					'options' => $echelon_so_modifiers->child_width_l(),
				),
				'grid' => array(
					'type' => 'select',
					'default' => 'uk-grid-small',
					'label' => __('Grid', 'echelon-so'),
					'options' => $echelon_so_modifiers->grid(),
				),
				'autoplay' => array(
					'type' => 'select',
					'default' => 'false',
					'label' => __('Autoplay', 'echelon-so'),
					'options' => array(
						'true' => __('Yes', 'echelon-so'),
						'false' => __('No', 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'autoplay' )
					)
				),
				'autoplay_interval' => array(
					'type' => 'slider',
					'label' => __('Interval', 'echelon-so'),
					'default' => 5,
					'min' => 1,
					'max' => 10,
					'integer' => true,
					'state_handler' => array(
						'autoplay[true]' => array('show'),
						'autoplay[false]' => array('hide'),
					)
				),
				'show_nav' => array(
					'type' => 'select',
					'default' => '1',
					'label' => __('Show Nav', 'echelon-so'),
					'options' => array(
						'1' => __('Yes', 'echelon-so'),
						'0' => __('No', 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'show_nav' )
					)
				),
				'nav_inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Nav Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse(),
					'state_handler' => array(
						'show_nav[1]' => array('show'),
						'show_nav[0]' => array('hide'),
					)
				),
				'nav_outside' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Nav Outside', 'echelon-so'),
					'options' => array(
						'0' => __( '-', 'echelon-so' ),
						'1' => __( 'Outside', 'echelon-so' ),
					),
					'state_handler' => array(
						'show_nav[1]' => array('show'),
						'show_nav[0]' => array('hide'),
					)
				),
				'show_dot' => array(
					'type' => 'select',
					'default' => '1',
					'label' => __('Show Dot', 'echelon-so'),
					'options' => array(
						'1' => __('Yes', 'echelon-so'),
						'0' => __('No', 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'show_dot' )
					)
				),
				'dot_inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Dot Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse(),
					'state_handler' => array(
						'show_dot[1]' => array('show'),
						'show_dot[0]' => array('hide'),
					)
				),
				'transition' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Transition', 'echelon-so'),
					'description' => __('Trigger transitions on child widgets when the slides change.', 'echelon-so'),
					'options' => array(
						'0' => __('-', 'echelon-so'),
						'1' => __('Transition', 'echelon-so'),
					)
				),
			)
		);

		return $return;

	}

}

siteorigin_widget_register('echelonso-eso-slider', __FILE__, 'EchelonSOEsoSlider');
