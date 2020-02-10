<?php
/*
Widget Name: E: Text
Description: Display text blocks in various sizes.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoText extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-text',
			__('E: Text', 'echelon-so'),
			array(
				'description' => __('Display text blocks in various sizes.', 'echelon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template File Variables
	*/

	function get_template_variables( $instance, $args ) {
		// global $echelon_so_modifiers;
		$return['text'] = !empty($instance['text']['text']) ? $instance['text']['text'] : '';

		$return['text_modifiers'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['text_modifiers'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['weight'])) ?: $return['text_modifiers'][] = $instance['modifiers']['weight'];
		(empty($instance['modifiers']['transform'])) ?: $return['text_modifiers'][] = $instance['modifiers']['transform'];
		(empty($instance['modifiers']['alignment'])) ?: $return['text_modifiers'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['inverse'])) ?: $return['text_modifiers'][] = $instance['modifiers']['inverse'];

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['text'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'text' => array(
					'type' => 'textarea',
					'label' => __('Text', 'echelon-so'),
					'default' => ''
				),
				'font' => array(
					'type' => 'font',
					'default' => 'default',
					'label' => __('Font', 'echelon-so'),
				),
				'span_color' => array(
					'type' => 'color',
					'default' => '',
					'label' => __('Span Color', 'echelon-so'),
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'transform' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Transform', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_transform()
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
					'options' => $echelon_so_modifiers->inverse()
				),
			)
		);

		return $return;
	}

	/*
	* Google Font
	*/

	function get_style_name($instance) {
		return 'style';
	}

	function get_google_font_fields($instance) {
		if (!empty($instance['text']['font'])) {
			return array(
				$instance['text']['font'],
			);
		} else {
			return false;
		}
	}

	function get_less_variables($instance) {
		$return = array();
		if ( ! empty( $instance['text']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['text']['font'] );
			$return['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$return['font_weight'] = $font['weight'];
			}
		}
		$return['span_color'] = !empty($instance['text']['span_color']) ? $instance['text']['span_color'] : false;
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

siteorigin_widget_register('echelonso-eso-text', __FILE__, 'EchelonSOEsoText');
