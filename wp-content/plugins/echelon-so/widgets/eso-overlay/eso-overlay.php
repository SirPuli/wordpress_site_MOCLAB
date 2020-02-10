<?php
/*
Widget Name: E: Overlay
Description: Overlay two different page builder layouts.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoOverlay extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-overlay',
			__('E: Overlay', 'echelon-so'),
			array(
				'description' => __('Overlay two different page builder layouts.', 'echelon-so' ),
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
	* Get the variales we need
	*/

	function get_template_variables($instance, $args) {

		// content
		$return['content'] = $instance['overlay']['content'];
		$return['overlay_content'] = $instance['overlay']['overlay_content'];

		// modifiers
		$return['overlay_class'] = array();
		(empty($instance['modifiers']['overlay'])) ?: $return['overlay_class'][] = $instance['modifiers']['overlay'];
		(empty($instance['modifiers']['position'])) ?: $return['overlay_class'][] = $instance['modifiers']['position'];
		(empty($instance['modifiers']['position_size'])) ?: $return['overlay_class'][] = $instance['modifiers']['position_size'];
		(empty($instance['modifiers']['width'])) ?: $return['overlay_class'][] = $instance['modifiers']['width'];
		(empty($instance['modifiers']['overlay_darken'])) ?: $return['overlay_class'][] = $instance['modifiers']['overlay_darken'];
		(empty($instance['modifiers']['inverse'])) ?: $return['overlay_class'][] = $instance['modifiers']['inverse'];
		(empty($instance['modifiers']['padding'])) ?: $return['overlay_class'][] = $instance['modifiers']['padding'];

		$return['wrap_class'] = array();
		(empty($instance['modifiers']['height'])) ?: $return['wrap_class'][] = $instance['modifiers']['height'];

		if ( !empty($instance['modifiers']['horizontal']) || !empty($instance['modifiers']['vertical']) ) {
			$return['overlay_class'][] = 'uk-flex';
		}

		(empty($instance['modifiers']['horizontal'])) ?: $return['overlay_class'][] = $instance['modifiers']['horizontal'];
		(empty($instance['modifiers']['vertical'])) ?: $return['overlay_class'][] = $instance['modifiers']['vertical'];

		// transition
		(empty($instance['modifiers']['transition'])) ?: $return['overlay_class'][] = $instance['modifiers']['transition'];
		(empty($instance['modifiers']['transition_toggle'])) ?: $return['wrap_class'][] = $instance['modifiers']['transition_toggle'];
		$return['content_class'] = array();
		(empty($instance['modifiers']['content_transition'])) ?: $return['content_class'][] = $instance['modifiers']['content_transition'];

		return $return;
	}

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$option_template_transition = 'Transition' . $echelon_so->prime_tag();

		$return['overlay'] = array(
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
						'transition' => __($option_template_transition, 'echelon-so')
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'content' => array(
					'type' => 'builder',
					'label' => __( 'Content' , 'echelon-so' ),
				),
				'overlay_content' => array(
					'type' => 'builder',
					'label' => __( 'Overlay Content' , 'echelon-so' ),
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'overlay' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Overlay', 'echelon-so'),
					'options' => $echelon_so_modifiers->overlay()
				),
				'overlay_darken' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Hover Darken', 'echelon-so'),
					'options' => array(
						'0' => __('-', 'echelon-so'),
						'uk-overlay-hover-darken' => __('Darken', 'echelon-so'),
					)
				),
				'position' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Position', 'echelon-so'),
					'options' => $echelon_so_modifiers->position()
				),
				'position_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Position Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->position_size()
				),
				'padding' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Padding', 'echelon-so'),
					'options' => array(
						'0' => __('-', 'echelon-so'),
						'uk-padding-remove' => __('Remove', 'echelon-so'),
					)
				),
				'width' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Width', 'echelon-so'),
					'options' => array(
						'0' => __('-', 'echelon-so'),
						'uk-width-1-1' => __('100%', 'echelon-so'),
					)
				),
				'height' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Height', 'echelon-so'),
					'options' => $echelon_so_modifiers->height()
				),
				'horizontal' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Horizontal', 'echelon-so'),
					'description' => __('Helpful when using position cover.', 'echelon-so'),
					'options' => $echelon_so_modifiers->flex_h()
				),
				'vertical' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Vertical', 'echelon-so'),
					'description' => __('Helpful when using position cover.', 'echelon-so'),
					'options' => $echelon_so_modifiers->flex_v()
				),
				'transition' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Overlay Transition', 'echelon-so'),
					'options' => $echelon_so_modifiers->transition(),
					'state_handler' => array(
						'template[transition]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'content_transition' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Content Transition', 'echelon-so'),
					'options' => $echelon_so_modifiers->transition(),
					'state_handler' => array(
						'template[transition]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'transition_toggle' => array(
					'type' => 'select',
					'default' => 'uk-transition-toggle',
					'label' => __('Transition Toggle', 'echelon-so'),
					'options' => array(
						'uk-transition-toggle' => __('-', 'echelon-so'),
						'0' => __('Off', 'echelon-so'),
					),
					'state_handler' => array(
						'template[transition]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
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
		global $echelon_so_teasers;
		return $echelon_so_teasers->teaser('eso-overlay');
	}

}

siteorigin_widget_register('echelonso-eso-overlay', __FILE__, 'EchelonSOEsoOverlay');
