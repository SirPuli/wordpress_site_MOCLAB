<?php

/*
Widget Name: E: Pricing
Description: Card based pricing box.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoPricing extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-pricing',
			__('E: Pricing', 'echelon-so'),
			array(
				'description' => __('Card based pricing box.', 'echelon-so' ),
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

		// content
		$return['title'] = !empty($instance['pricing']['title']) ? $instance['pricing']['title'] : '';
		$return['sub_title'] = !empty($instance['pricing']['sub_title']) ? $instance['pricing']['sub_title'] : '';
		$return['symbol'] = !empty($instance['pricing']['symbol']) ? $instance['pricing']['symbol'] : '';
		$return['price'] = !empty($instance['pricing']['price']) ? $instance['pricing']['price'] : '';
		$return['link_text'] = !empty($instance['pricing']['link_text']) ? $instance['pricing']['link_text'] : '';
		$return['link_target'] = !empty($instance['pricing']['link_target']) ? sow_esc_url($instance['pricing']['link_target']) : '';
		$return['label'] = !empty($instance['pricing']['label']) ? $instance['pricing']['label'] : '';

		// modifiers
		$return['title_class'] = array();
		(empty($instance['modifiers']['title_size'])) ?: $return['title_class'][] = $instance['modifiers']['title_size'];
		(empty($instance['modifiers']['title_weight'])) ?: $return['title_class'][] = $instance['modifiers']['title_weight'];

		$return['price_class'] = array();
		(empty($instance['modifiers']['price_size'])) ?: $return['price_class'][] = $instance['modifiers']['price_size'];
		(empty($instance['modifiers']['price_weight'])) ?: $return['price_class'][] = $instance['modifiers']['price_weight'];

		$return['symbol_class'] = array();
		(empty($instance['modifiers']['symbol_size'])) ?: $return['symbol_class'][] = $instance['modifiers']['symbol_size'];
		(empty($instance['modifiers']['symbol_weight'])) ?: $return['symbol_class'][] = $instance['modifiers']['symbol_weight'];

		$return['sub_title_class'] = array();
		(empty($instance['modifiers']['sub_title_size'])) ?: $return['sub_title_class'][] = $instance['modifiers']['sub_title_size'];
		(empty($instance['modifiers']['sub_title_weight'])) ?: $return['sub_title_class'][] = $instance['modifiers']['sub_title_weight'];

		$return['button_class'] = array();
		(empty($instance['modifiers']['button_style'])) ?: $return['button_class'][] = $instance['modifiers']['button_style'];
		(empty($instance['modifiers']['button_size'])) ?: $return['button_class'][] = $instance['modifiers']['button_size'];
		(empty($instance['modifiers']['button_border_radius'])) ?: $return['button_class'][] = $instance['modifiers']['button_border_radius'];
		(empty($instance['modifiers']['button_weight'])) ?: $return['button_class'][] = $instance['modifiers']['button_weight'];

		$return['label_class'] = array();
		(empty($instance['modifiers']['label_style'])) ?: $return['label_class'][] = $instance['modifiers']['label_style'];
		(empty($instance['modifiers']['label_weight'])) ?: $return['label_class'][] = $instance['modifiers']['label_weight'];

		$return['heading_class'] = array();
		(empty($instance['modifiers']['heading_class'])) ?: $return['heading_class'][] = $instance['modifiers']['heading_class'];

		// image
		$return['image'] = false;
		if ( ! empty( $instance['pricing']['image'] ) ) {
			$size = empty( $instance['pricing']['image_size'] ) ? 'full' : $instance['pricing']['image_size'];
			$attachment = wp_get_attachment_image_src( $instance['pricing']['image'], $size );
			if( !empty( $attachment ) ) {
				$return['image'] = sow_esc_url( $attachment[0] );
			}
		}

		return $return;
	}

	/*
	* Form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['pricing'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'title' => array(
					'type' => 'text',
					'default' => 'Title',
					'label' => __( 'Title', 'echelon-so' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'default' => 'Sub Title',
					'label' => __( 'Sub Title', 'echelon-so' ),
				),
				'symbol' => array(
					'type' => 'text',
					'default' => '£',
					'label' => __( 'Price Symbol', 'echelon-so' ),
				),
				'price' => array(
					'type' => 'number',
					'default' => '19.99',
					'label' => __( 'Price', 'echelon-so' ),
				),
				'link_text' => array(
					'type' => 'text',
					'default' => 'Purchase Plan',
					'label' => __( 'Link Text', 'echelon-so' ),
				),
				'link_target' => array(
					'type' => 'link',
					'default' => 'https://example.com',
					'label' => __( 'Link Target', 'echelon-so' ),
				),
				'label' => array(
					'type' => 'text',
					'default' => '',
					'label' => __( 'Label', 'echelon-so' ),
				),
				'image' => array(
					'type' => 'media',
					'label' => __( 'Image', 'widget-form-fields-text-domain' ),
					'choose' => __( 'Choose Image', 'widget-form-fields-text-domain' ),
					'update' => __( 'Set Image', 'widget-form-fields-text-domain' ),
					'library' => 'image',
					'fallback' => false,
				),
				'image_size' => array(
					'type' => 'image-size',
					'label' => __( 'Image Size', 'widget-form-fields-text-domain' ),
				)
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'title_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Title Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'title_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Title Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'price_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Price Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'price_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Price Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'symbol_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Symbol Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'symbol_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Symbol Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'sub_title_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Sub Title Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'sub_title_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Sub Title Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'button_style' => array(
					'type' => 'select',
					'default' => 'uk-button-primary',
					'label' => __('Button Style', 'echelon-so'),
					'options' => $echelon_so_modifiers->button_style()
				),
				'button_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->button_size()
				),
				'button_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'button_border_radius' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Button Border Radius', 'echelon-so'),
					'options' => $echelon_so_modifiers->border_radius()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse()
				),
				'label_style' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Label Style', 'echelon-so'),
					'options' => $echelon_so_modifiers->label()
				),
				'label_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Label Weight', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
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

siteorigin_widget_register('echelonso-eso-pricing', __FILE__, 'EchelonSOEsoPricing');
