<?php

/*
Widget Name: E: Off Canvas
Description: Off page content areas.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoOffCanvas extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-off-canvas',
			__('E: Off Canvas', 'echelon-so'),
			array(
				'description' => __('Off page content areas.', 'echelon-so' ),
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
		$return['content'] = $instance['off_canvas']['content'];
		$return['canvas_id'] = !empty($instance['off_canvas']['canvas_id']) ? $instance['off_canvas']['canvas_id'] : '';
		$return['mode'] = 'slide';
		$return['flip'] = $instance['modifiers']['flip'];
		$return['overlay'] = $instance['modifiers']['overlay'];
		$return['bg_close'] = $instance['modifiers']['bg-close'];
		$return['background'] = !empty($instance['modifiers']['background']) ? $instance['modifiers']['background'] : '';
		$return['icon_class'] = !empty($instance['modifiers']['inverse']) ? $instance['modifiers']['inverse'] : '';
		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$return['off_canvas'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'canvas_id' => array(
					'type' => 'text',
					'label' => __( 'ID', 'echelon-so'),
					'description' => __( 'Buttons or links should point to this ID.', 'echelon-so'),
				),
				'content' => array(
					'type' => 'builder',
					'label' => __( 'Content', 'echelon-so'),
				)
			)
		);

		$option_mode_push = 'Push' . $echelon_so->prime_tag();
		$option_mode_reveal = 'Reveal' . $echelon_so->prime_tag();

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'mode' => array(
					'type' => 'select',
					'default' => 'slide',
					'label' => __('Mode', 'echelon-so'),
					'options' => array(
						'slide' => __('Slide', 'echelon-so'),
						'push' => __($option_mode_push, 'echelon-so'),
		                'reveal' => __($option_mode_reveal, 'echelon-so'),
					)
				),
				'flip' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Flip', 'echelon-so'),
					'options' => array(
						'false' => __('No', 'echelon-so'),
						'true' => __('Yes', 'echelon-so'),
					)
				),
				'overlay' => array(
					'type' => 'select',
					'default' => 'false',
					'label' => __('Overlay', 'echelon-so'),
					'options' => array(
						'false' => __('No', 'echelon-so'),
						'true' => __('Yes', 'echelon-so'),
					)
				),
				'bg-close' => array(
					'type' => 'select',
					'default' => 'true',
					'label' => __('Background Close', 'echelon-so'),
					'options' => array(
						'false' => __('No', 'echelon-so'),
						'true' => __('Yes', 'echelon-so'),
					)
				),
				'background' => array(
					'type' => 'select',
					'default' => 'uk-background-default',
					'label' => __('Background', 'echelon-so'),
					'options' => $echelon_so_modifiers->background()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse()
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
		return $echelon_so_teasers->teaser('eso-off-canvas');
	}

}

siteorigin_widget_register('echelonso-eso-off-canvas', __FILE__, 'EchelonSOEsoOffCanvas');
