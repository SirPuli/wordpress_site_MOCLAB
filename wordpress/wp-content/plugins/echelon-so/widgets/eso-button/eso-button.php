<?php

/*
Widget Name: E: Button
Description: Globally styled square, round and pill buttons.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoButton extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-button',
			__('E: Button', 'echelon-so'),
			array(
				'description' => __('Globally styled square, round and pill buttons.', 'echelon-so' ),
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
	* Template File Variables
	*/

	function get_template_variables( $instance, $args ) {

		$return['text'] = !empty($instance['button']['text']) ? $instance['button']['text'] : '';

		if ( $instance['button']['target_type'] == 'direct') {
			$return['target'] = !empty($instance['button']['target']) ? sow_esc_url($instance['button']['target']) : '';
		} else {
			$return['target'] = get_permalink();
		}

		$return['label'] = !empty($instance['button']['label']) ? $instance['button']['label'] : '';

		$return['button_class'] = array();
		(empty($instance['modifiers']['style'])) ?: $return['button_class'][] = $instance['modifiers']['style'];
		(empty($instance['modifiers']['size'])) ?: $return['button_class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['transform'])) ?: $return['button_class'][] = $instance['modifiers']['transform'];
		(empty($instance['modifiers']['width'])) ?: $return['button_class'][] = $instance['modifiers']['width'];
		(empty($instance['modifiers']['radius'])) ?: $return['button_class'][] = $instance['modifiers']['radius'];
		(empty($instance['modifiers']['weight'])) ?: $return['button_class'][] = $instance['modifiers']['weight'];

		$return['wrap_class'] = array();
		(empty($instance['modifiers']['align'])) ?: $return['wrap_class'][] = $instance['modifiers']['align'];
		(empty($instance['modifiers']['width'])) ?: $return['wrap_class'][] = $instance['modifiers']['width'];
		(empty($instance['modifiers']['inverse'])) ?: $return['wrap_class'][] = $instance['modifiers']['inverse'];

		$return['label_class'] = array();
		(empty($instance['modifiers']['label'])) ?: $return['label_class'][] = $instance['modifiers']['label'];
		(empty($instance['modifiers']['label_weight'])) ?: $return['label_class'][] = $instance['modifiers']['label_weight'];

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$option_template_label = 'Label' . $echelon_so->prime_tag();
		$label_label_text = 'Label Text' . $echelon_so->prime_tag();
		$label_label_color = 'Label Background Color' . $echelon_so->prime_tag();
		$label_label_weight = 'Label Font Weight' . $echelon_so->prime_tag();

		$return['button'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'template' => array(
					'type' => 'select',
					'default' => 'default',
					'label' => __('Template', 'echelon-so'),
					'options' => array(
						'default' => __('-', 'echelon-so'),
						'label' => __($option_template_label, 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'text' => array(
					'type' => 'text',
					'label' => __('Button Text', 'echelon-so'),
					'description' => __('The text to use for the button.', 'echelon-so'),
					'default' => ''
				),
				'label' => array(
					'type' => 'text',
					'label' => __($label_label_text, 'echelon-so'),
					'description' => __('The text to use for the buttons label.', 'echelon-so'),
					'default' => '',
					'state_handler' => array(
						'template[label]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'target_type' => array(
					'type' => 'select',
					'label' => __('Destination Type', 'echelon-so'),
					'description' => __('Loop will automatically generate the Destination URL based on the global post object. Mostly used inside the Custom Loop widget.', 'echelon-so'),
					'default' => 'direct',
					'options' => array(
						'direct' => __('-', 'echelon-so'),
						'loop' => __('Loop', 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'target_type' )
					)
				),
				'target' => array(
					'type' => 'link',
					'label' => __('Destination URL', 'echelon-so'),
					'description' => __('The destination URL to use for the button.', 'echelon-so'),
					'default' => '',
					'state_handler' => array(
						'target_type[direct]' => array('show'),
						'_else[target_type]' => array('hide'),
					),
				),
				'font' => array(
					'type' => 'font',
					'default' => 'default',
					'label' => __('Button Font', 'echelon-so'),
					'description' => __('Use a Google Font for the buttons text.', 'echelon-so'),
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'style' => array(
					'type' => 'select',
					'default' => 'uk-button-default',
					'label' => __('Button Style', 'echelon-so'),
					'description' => __('Primary, Secondary and Danger buttons use your global Background settings.', 'echelon-so'),
					'options' => $echelon_so_modifiers->button_style()
				),
				'size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Size', 'echelon-so'),
					'description' => __('Button sizing uses your global Gutter (default), Gutter Small (small button) and Gutter Medium (large button) settings.', 'echelon-so'),
					'options' => $echelon_so_modifiers->button_size()
				),
				'transform' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Text Transform', 'echelon-so'),
					'description' => $echelon_so_modifiers->text_transform('description'),
					'options' => $echelon_so_modifiers->text_transform(),
				),
				'weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Font Weight', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_weight('description'),
					'options' => $echelon_so_modifiers->font_weight(),
				),
				'width' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Width', 'echelon-so'),
					'description' => $echelon_so_modifiers->width('description'),
					'options' => $echelon_so_modifiers->width()
				),
				'radius' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Border Radius', 'echelon-so'),
					'description' => $echelon_so_modifiers->border_radius('description'),
					'options' => $echelon_so_modifiers->border_radius()
				),
				'align' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Align', 'echelon-so'),
					'description' => __('How to align the button relative to its parent.', 'echelon-so'),
					'options' => $echelon_so_modifiers->align()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'description' => __('Creates a solid light button using your global Inverse color.', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse()
				),
				'label' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __($label_label_color, 'echelon-so'),
					'description' => __('Label colors use your global Background settings.', 'echelon-so'),
					'options' => $echelon_so_modifiers->label(),
					'state_handler' => array(
						'template[label]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'label_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __($label_label_weight, 'echelon-so'),
					'description' => $echelon_so_modifiers->font_weight('description'),
					'options' => $echelon_so_modifiers->font_weight(),
					'state_handler' => array(
						'template[label]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				)
			)
		);

		return $return;
	}

	/*
	* Google Font
	*/

	function get_style_name($instance) {
		if ( $instance['button']['font'] != 'default') {
			return 'style';
		}
		return false;
	}

	function get_google_font_fields($instance) {
		if ( $instance['button']['font'] != 'default') {
			return array(
				$instance['button']['font'],
			);
		}
		return false;
	}

	function get_less_variables($instance) {
		if ( $instance['button']['font'] != 'default') {
			$font = siteorigin_widget_get_font( $instance['button']['font'] );
			$return['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$return['font_weight'] = $font['weight'];
			}
			return $return;
		}
		return false;
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so_teasers;
		return $echelon_so_teasers->teaser('eso-button');
	}

}

siteorigin_widget_register('echelonso-eso-button', __FILE__, 'EchelonSOEsoButton');
