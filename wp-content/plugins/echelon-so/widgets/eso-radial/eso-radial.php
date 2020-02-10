<?php
/*
Widget Name: E: Radial
Description: A Radial progress bar or odometer.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoRadial extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-radial',
			__('E: Radial', 'echelon-so'),
			array(
				'description' => __('A radial progress bar or odometer.', 'echelon-so' ),
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
		return $instance['radial']['template'];
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		// content
		$return['int_id'] = 'ra_' . uniqid(rand(1,9999));
		$return['animate'] = !empty($instance['radial']['animate']) ? true : false;

		if (!$return['animate']) {
			$circumference = 2 * M_PI * 35;
			$return['strokeDashOffset'] = $circumference - ((absint($instance['radial']['percent']) * $circumference) / 100);
			$return['trigger_distance'] = 0;
		} else {
			$return['strokeDashOffset'] = 219.91148575129;
			$return['trigger_distance'] = absint($instance['radial']['trigger_distance']);
		}

		$return['percent'] = absint($instance['radial']['percent']);
		$return['line_cap'] = $instance['radial']['line_cap'];

		// icon
		$return['icon'] = $instance['radial']['icon'];
		$return['icon_styles'][] = !empty($instance['radial']['icon_color']) ? 'color: ' . $instance['radial']['icon_color'] : 'inherit';
		$return['icon_styles'][] = !empty($instance['radial']['icon_size']) ? 'font-size: ' . $instance['radial']['icon_size'] : 'inherit';

		// title
		$return['title'] = !empty($instance['radial']['title']) ? $instance['radial']['title'] : '';
		$return['title_class'] = array();
		$return['title_class'][] = !empty($instance['radial']['title_size']) ? $instance['radial']['title_size'] : '';

		return $return;

	}

	/*
	* Style Variables
	*/

	function get_less_variables($instance) {
		$return['radial_width'] = absint($instance['radial']['radial_width']) . '%';
		$return['line_width'] = absint($instance['radial']['line_width']);
		$return['rotation'] = 'rotate(' . intval($instance['radial']['rotation']) . 'deg)';
		$return['line_color'] = $instance['radial']['line_color'];
		$return['track_color'] = $instance['radial']['track_color'];
		return $return;
	}


	/*
	* Widget form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['radial'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'template' => array(
					'type' => 'select',
					'label' => __( 'Template', 'echelon-so' ),
					'default' => 'default',
					'options' => array(
						'default' => __( 'Default', 'echelon-so' ),
						'icon' => __( 'Icon', 'echelon-so' ),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'icon' => array(
					'type' => 'icon',
					'label' => __( 'Icon', 'echelon-so' ),
					'state_handler' => array(
						'template[icon]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'icon_color' => array(
					'type' => 'color',
					'default' => '#252525',
					'label' => __( 'Icon Color', 'echelon-so' ),
					'state_handler' => array(
						'template[icon]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'icon_size' => array(
					'type' => 'multi-measurement',
					'autofill' => true,
					'default' => '40px',
					'label' => __( 'Icon Size', 'echelon-so' ),
					'measurements' => array(
						'width' => array(
							'units' => array( 'px' ),
						)
					),
					'state_handler' => array(
						'template[icon]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'echelon-so' ),
					'default' => '50%',
					'state_handler' => array(
						'template[default]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'title_size' => array(
					'type' => 'select',
					'autofill' => true,
					'default' => 'uk-text-large',
					'label' => __( 'Title Size', 'echelon-so' ),
					'options' => $echelon_so_modifiers->font_size(),
					'state_handler' => array(
						'template[default]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'radial_width' => array(
					'type' => 'slider',
					'label' => __( 'Radial Width (%)', 'echelon-so' ),
					'default' => 100,
					'min' => 10,
					'max' => 100,
					'integer' => true
				),
				'percent' => array(
					'type' => 'slider',
					'label' => __( 'Percent', 'echelon-so' ),
					'default' => 50,
					'min' => 1,
					'max' => 100,
					'integer' => true
				),
				'line_width' => array(
					'type' => 'slider',
					'label' => __( 'Line Width', 'echelon-so' ),
					'default' => 3,
					'min' => 1,
					'max' => 20,
					'integer' => true
				),
				'rotation' => array(
					'type' => 'slider',
					'label' => __( 'Rotation', 'echelon-so' ),
					'default' => -90,
					'min' => -360,
					'max' => 360,
					'integer' => false
				),
				'line_color' => array(
					'type' => 'color',
					'default' => '#555555',
					'label' => __( 'Line Color', 'echelon-so' ),
				),
				'track_color' => array(
					'type' => 'esorgba',
					'default' => '#ececec',
					'label' => __( 'Track Color', 'echelon-so' ),
				),
				'line_cap' => array(
					'type' => 'select',
					'label' => __( 'Line Cap', 'echelon-so' ),
					'default' => 'round',
					'options' => array(
						'round' => __('Round', 'echelon-so'),
						'square' => __('Square', 'echelon-so'),
						'butt' => __('Butt', 'echelon-so')
					)
				),
				'animate' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( 'Animate', 'echelon-so' ),
					'options' => array(
						'0' => __('No', 'echelon-so'),
						'1' => __('Yes', 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'animate' )
					),
				),
				'trigger_distance' => array(
					'type' => 'number',
					'default' => '300',
					'label' => __( 'Trigger Distance (px)', 'echelon-so' ),
					'state_handler' => array(
						'animate[0]' => array('hide'),
						'animate[1]' => array('show'),
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

siteorigin_widget_register('echelonso-eso-radial', __FILE__, 'EchelonSOEsoRadial');
