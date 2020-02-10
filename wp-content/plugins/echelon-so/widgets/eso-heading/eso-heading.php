<?php

/*
Widget Name: E: Heading
Description: Various section heading styles.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoHeading extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-heading',
			__('E: Heading', 'echelon-so'),
			array(
				'description' => __('Various section heading styles.', 'echelon-so' ),
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
		$return['heading'] = !empty($instance['heading']['heading']) ? $instance['heading']['heading'] : '';
		$return['heading_class'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['heading_class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['weight']) && $instance['heading']['font'] != 'default') ?: $return['heading_class'][] = $instance['modifiers']['weight'];
		(empty($instance['modifiers']['transform'])) ?: $return['heading_class'][] = $instance['modifiers']['transform'];
		(empty($instance['modifiers']['alignment'])) ?: $return['heading_class'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['inverse'])) ?: $return['heading_class'][] = $instance['modifiers']['inverse'];
		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$option_template_bullet = 'Bullet' . $echelon_so->prime_tag();
		$option_template_divider = 'Divider' . $echelon_so->prime_tag();
		$option_template_line = 'Line' . $echelon_so->prime_tag();

		$return['heading'] = array(
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
						'bullet' => __($option_template_bullet, 'echelon-so'),
						'divider' => __($option_template_divider, 'echelon-so'),
						'line' => __($option_template_line, 'echelon-so'),
					)
				),
				'heading' => array(
					'type' => 'text',
					'label' => __('Heading', 'echelon-so'),
					'default' => 'Heading'
				),
				'font' => array(
					'type' => 'font',
					'default' => 'default',
					'label' => __('Font', 'echelon-so'),
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
					'default' => 'uk-heading-small',
					'label' => __('Font Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Font Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'transform' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Text Transform', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_transform()
				),
				'alignment' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Text Align', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_align()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse()
				)
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
		if ( $instance['heading']['font'] != 'default' ) {
			return array(
				$instance['heading']['font'],
			);
		} else {
			return false;
		}
	}

	function get_less_variables($instance) {
		$return = array();
		if ( $instance['heading']['font'] != 'default' ) {
			$font = siteorigin_widget_get_font( $instance['heading']['font'] );
			$return['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$return['font_weight'] = $font['weight'];
			}
		}
		return $return;
	}

}

siteorigin_widget_register('echelonso-eso-heading', __FILE__, 'EchelonSOEsoHeading');
