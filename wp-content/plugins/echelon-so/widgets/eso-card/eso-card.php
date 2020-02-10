<?php
/*
Widget Name: E: Card
Description: Text and image based content cards.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/card/
*/

class EchelonSOEsoCard extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-card',
			__('E: Card', 'echelon-so'),
			array(
				'description' => __('Text and image based content cards.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/card/',
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

		if ( $instance['card']['template'] == 'default' ) {
			return 'default';
		}

		if ( $instance['card']['template'] == 'sub_title' ) {
			return 'sub_title';
		}

		return 'default';
	}

	/**
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		$return = array();

		// content
		$return['title'] = !empty($instance['card']['title']) ? $instance['card']['title'] : '';
		$return['sub_title'] = !empty($instance['card']['sub_title']) ? $instance['card']['sub_title'] : '';
		$return['body'] = !empty($instance['card']['body']) ? $instance['card']['body'] : '';

		// link
		$return['link_target'] = !empty($instance['card']['link_target']) ? sow_esc_url($instance['card']['link_target']) : '';
		$return['link_text'] = !empty($instance['card']['link_text']) ? $instance['card']['link_text'] : '';

		// image
		if ( !empty($instance['card']['image']) ) {
			$size = empty( $instance['card']['image_size'] ) ? 'full' : $instance['card']['image_size'];
			$attachment = wp_get_attachment_image_src( $instance['card']['image'], $size );
			if( !empty( $attachment ) ) {
				$return['image'] = sow_esc_url( $attachment[0] );
			} else {
				$retrun['image'] = false;
			}
		}

		if ( !empty($instance['modifiers']['image_2']) ) {
			$size = empty( $instance['card']['image_size'] ) ? 'full' : $instance['card']['image_size'];
			$attachment = wp_get_attachment_image_src( $instance['modifiers']['image_2'], $size );
			if( !empty( $attachment ) ) {
				$return['image_2'] = sow_esc_url( $attachment[0] );
			} else {
				$return['image_2'] = false;
			}
		}

		$return['image_transition'] = !empty($instance['modifiers']['image_transition']) ? $instance['modifiers']['image_transition'] : '';

		// modifiers
		$return['card_class'] = array();
		(empty($instance['modifiers']['style'])) ?: $return['card_class'][] = $instance['modifiers']['style'];
		(empty($instance['modifiers']['size'])) ?: $return['card_class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['alignment'])) ?: $return['card_class'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['inverse'])) ?: $return['card_class'][] = $instance['modifiers']['inverse'];

		$return['image_class'] = array();
		(empty($instance['modifiers']['image_border_radius'])) ?: $return['image_class'][] = $instance['modifiers']['image_border_radius'];

		$return['title_class'] = array();
		(empty($instance['modifiers']['title_weight'])) ?: $return['title_class'][] = $instance['modifiers']['title_weight'];
		(empty($instance['modifiers']['title_size'])) ?: $return['title_class'][] = $instance['modifiers']['title_size'];

		$return['sub_title_class'] = array();
		(empty($instance['modifiers']['sub_title_weight'])) ?: $return['sub_title_class'][] = $instance['modifiers']['sub_title_weight'];
		(empty($instance['modifiers']['sub_title_size'])) ?: $return['sub_title_class'][] = $instance['modifiers']['sub_title_size'];

		$return['body_class'] = array();
		(empty($instance['modifiers']['body_weight'])) ?: $return['body_class'][] = $instance['modifiers']['body_weight'];
		(empty($instance['modifiers']['body_size'])) ?: $return['body_class'][] = $instance['modifiers']['body_size'];

		return $return;
	}

	/**
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;

		$option_template_image_top = 'Image Top' . $echelon_so->prime_tag();
		$option_template_image_bottom = 'Image Bottom' . $echelon_so->prime_tag();
		$option_template_image_minimal = 'Image Minimal' . $echelon_so->prime_tag();
		$label_card_image = 'Card Image' . $echelon_so->prime_tag();
		$label_card_image_size = 'Card Image Size' . $echelon_so->prime_tag();
		$label_image_transition = 'Image Transition' . $echelon_so->prime_tag();
		$label_two_image = 'Two Image' . $echelon_so->prime_tag();

		$return['card'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'template' => array(
					'type' => 'select',
					'default' => 'default',
					'label' => __('Template', 'echelon-so'),
					'description' => __('The template determines the layout of the Card plus its available Data & modifier fields.', 'echelon-so'),
					'options' => array(
						'default' => __('-', 'echelon-so'),
						'sub_title' => __('Sub Title', 'echelon-so'),
						'image_top' => __($option_template_image_top, 'echelon-so'),
						'image_bottom' => __($option_template_image_bottom, 'echelon-so'),
						'image_minimal' => __($option_template_image_minimal, 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'image' => array(
					'type' => 'media',
					'label' => __( $label_card_image, 'echelon-so' ),
					'description' => __( 'The image to use with image based Card templates.', 'echelon-so' ),
					'choose' => __( 'Choose Image', 'echelon-so' ),
					'update' => __( 'Set Image', 'echelon-so' ),
					'library' => 'image',
					'fallback' => false,
					'state_handler' => array(
						'template[image_top]' => array( 'show' ),
						'template[image_bottom]' => array( 'show' ),
						'template[image_minimal]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'image_size' => array(
					'type' => 'image-size',
					'label' => __( $label_card_image_size, 'echelon-so' ),
					'description' => __( 'The image size to use for the Cards image.', 'echelon-so' ),
					'state_handler' => array(
						'template[image_top]' => array( 'show' ),
						'template[image_bottom]' => array( 'show' ),
						'template[image_minimal]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'title' => array(
					'type' => 'text',
					'default' => '',
					'label' => __('Title Text', 'echelon-so'),
					'description' => __('The text to use for the Cards title.', 'echelon-so'),
				),
				'sub_title' => array(
					'type' => 'text',
					'default' => '',
					'label' => __('Sub Title Text', 'echelon-so'),
					'description' => __('The text to use for the Cards sub title.', 'echelon-so'),
					'state_handler' => array(
						'template[sub_title]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'body' => array(
					'type' => 'text',
					'default' => '',
					'label' => __('Body Text', 'echelon-so'),
					'description' => __('The text to use for the main body of the Card.', 'echelon-so'),
				),
				'link_text' => array(
					'type' => 'text',
					'default' => '',
					'label' => __('Link Text', 'echelon-so'),
					'description' => __('The text to use for the card link, if any.', 'echelon-so'),
				),
				'link_target' => array(
					'type' => 'link',
					'label' => __('Link Target', 'echelon-so'),
					'description' => __('The destination URL for the card link, if any.', 'echelon-so'),
					'default' => ''
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
					'default' => '0',
					'label' => __('Style', 'echelon-so'),
					'description' => __( 'Default, Primary and Secondary Cards use your global background color settings.', 'echelon-so' ),
					'options' => array(
						'0' => __('Transparent', 'echelon-so'),
						'uk-card-default' => __('Default', 'echelon-so'),
						'uk-card-primary' => __('Primary', 'echelon-so'),
						'uk-card-secondary' => __('Secondary', 'echelon-so'),
					)
				),
				'size' => array(
					'type' => 'select',
					'default' => 'uk-card-small',
					'label' => __('Size', 'echelon-so'),
					'description' => __( 'For padding Small cards use global Margin, Large cards use global Gutter Large.', 'echelon-so' ),
					'options' => array(
						'uk-card-small' => __('Small', 'echelon-so'),
						'uk-card-large' => __('Large', 'echelon-so'),
					)
				),
				'title_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Title Size', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_size(true),
					'options' => $echelon_so_modifiers->font_size()
				),
				'title_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Title Weight', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_weight(true),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'sub_title_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Sub Title Size', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_size(true),
					'options' => $echelon_so_modifiers->font_size(),
					'state_handler' => array(
						'template[sub_title]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'sub_title_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Sub Title Weight', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_weight(true),
					'options' => $echelon_so_modifiers->font_weight(),
					'state_handler' => array(
						'template[sub_title]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'body_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Body Size', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_size(true),
					'options' => $echelon_so_modifiers->font_size()
				),
				'body_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Body Weight', 'echelon-so'),
					'description' => $echelon_so_modifiers->font_weight(true),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'alignment' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Text Alignment', 'echelon-so'),
					'description' => $echelon_so_modifiers->text_align(true),
					'options' => $echelon_so_modifiers->text_align()
				),
				'image_border_radius' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Image Border Radius', 'echelon-so'),
					'description' => $echelon_so_modifiers->border_radius(true),
					'options' => $echelon_so_modifiers->border_radius(),
					'state_handler' => array(
						'template[image_top]' => array( 'show' ),
						'template[image_bottom]' => array( 'show' ),
						'template[image_minimal]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'image_transition' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_image_transition, 'echelon-so' ),
					'description' => __('The type of hover transition to use for the Card.', 'echelon-so'),
					'description' => __('Add a hover transition to the cards image.', 'echelon-so'),
					'options' => array(
						'0' => __('-', 'echelon-so'),
						'scale' => __('Scale Up', 'echelon-so'),
						'two_scale' => __('Two Image Scale', 'echelon-so'),
						'two_fade' => __('Two Image Fade', 'echelon-so')
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'image_transition' )
					),
					'state_handler' => array(
						'template[image_top]' => array( 'show' ),
						'template[image_bottom]' => array( 'show' ),
						'template[image_minimal]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'image_2' => array(
					'type' => 'media',
					'label' => __( $label_two_image, 'echelon-so' ),
					'description' => __( 'The second image to use with a two image transition.', 'echelon-so' ),
					'choose' => __( 'Choose Image', 'echelon-so' ),
					'update' => __( 'Set Image', 'echelon-so' ),
					'library' => 'image',
					'fallback' => false,
					'state_handler' => array(
						'template[default]' => array( 'hide' ),
						'template[sub_title]' => array( 'hide' ),
						'image_transition[two_scale]' => array( 'show' ),
						'image_transition[two_fade]' => array( 'show' ),
						'_else[image_transition]' => array( 'hide' ),
					)
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'description' => $echelon_so_modifiers->inverse(true),
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
		return $echelon_so_teasers->teaser('eso-card');
	}

}

siteorigin_widget_register('echelonso-eso-card', __FILE__, 'EchelonSOEsoCard');
