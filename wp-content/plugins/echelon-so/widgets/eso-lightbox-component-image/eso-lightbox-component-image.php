<?php
/*
Widget Name: E: Lightbox Component - Image
Description: Images designed for Lighbox supported widgets.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoLightboxComponentImage extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-lightbox-component-image',
			__('E: Lightbox Component - Image', 'echelon-so'),
			array(
				'description' => __('Images designed for Lighbox supported widgets.', 'echelon-so' ),
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
		$allowed_templates = array('default', 'icon');
		if ( in_array($instance['lightbox_content']['template'], $allowed_templates) ) {
			return $instance['lightbox_content']['template'];
		} else {
			return 'default';
		}
	}

	/**
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		// content
		if ( ! empty( $instance['lightbox_content']['image'] ) ) {

			$t_size = empty( $instance['lightbox_content']['thumb_size'] ) ? 'full' : $instance['lightbox_content']['thumb_size'];
			$d_size = empty( $instance['lightbox_content']['display_size'] ) ? 'full' : $instance['lightbox_content']['display_size'];

			$return['image_thumb'] = sow_esc_url(wp_get_attachment_image_src( $instance['lightbox_content']['image'], $t_size )[0]);
			$return['image_display'] = sow_esc_url(wp_get_attachment_image_src( $instance['lightbox_content']['image'], $d_size )[0]);

		} else {

			$return['thumb'] = false;
			$return['display'] = false;

		}

		$return['title'] = !empty($instance['lightbox_content']['title']) ? $instance['lightbox_content']['title'] : '';
		$return['sub_title'] = !empty($instance['lightbox_content']['sub_title']) ? $instance['lightbox_content']['sub_title'] : '';

		// modifiers
		$return['wrapper_class'] = array();
		$return['force_height'] = !empty($instance['modifiers']['height']) ? true : false;
		$return['background_url'] = !empty($instance['modifiers']['height']) ? $return['image_thumb'] : '';
		(empty($instance['modifiers']['height'])) ?: $return['wrapper_class'][] = $instance['modifiers']['height'];
		(empty($instance['modifiers']['inverse'])) ?: $return['wrapper_class'][] = $instance['modifiers']['inverse'];

		$return['icon_class'] = array();
		(empty($instance['modifiers']['inverse'])) ?: $return['icon_class'][] = $instance['modifiers']['inverse'];

		$return['image_class'] = array();
		(empty($instance['modifiers']['image_scale'])) ?: $return['image_class'][] = $instance['modifiers']['image_scale'];

		$return['overlay_class'] = array();
		(empty($instance['modifiers']['overlay'])) ?: $return['overlay_class'][] = $instance['modifiers']['overlay'];
		(empty($instance['modifiers']['position'])) ?: $return['overlay_class'][] = $instance['modifiers']['position'];
		(empty($instance['modifiers']['position_size'])) ?: $return['overlay_class'][] = $instance['modifiers']['position_size'];
		(empty($instance['modifiers']['inverse'])) ?: $return['overlay_class'][] = $instance['modifiers']['inverse'];
		(empty($instance['modifiers']['transition'])) ?: $return['overlay_class'][] = $instance['modifiers']['transition'];
		if ( isset($instance['modifiers']['position']) && $instance['modifiers']['position'] == 'uk-position-cover' ) {
			$return['overlay_class'][] = 'uk-flex';
			(empty($instance['modifiers']['flex_h'])) ?: $return['overlay_class'][] = $instance['modifiers']['flex_h'];
			(empty($instance['modifiers']['flex_v'])) ?: $return['overlay_class'][] = $instance['modifiers']['flex_v'];
		}

		$return['title_class'] = array();
		(empty($instance['modifiers']['title_size'])) ?: $return['title_class'][] = $instance['modifiers']['title_size'];
		(empty($instance['modifiers']['title_weight'])) ?: $return['title_class'][] = $instance['modifiers']['title_weight'];
		(empty($instance['modifiers']['title_align'])) ?: $return['title_class'][] = $instance['modifiers']['title_align'];

		$return['sub_title_class'] = array();
		(empty($instance['modifiers']['sub_title_size'])) ?: $return['sub_title_class'][] = $instance['modifiers']['sub_title_size'];
		(empty($instance['modifiers']['sub_title_weight'])) ?: $return['sub_title_class'][] = $instance['modifiers']['sub_title_weight'];
		(empty($instance['modifiers']['sub_title_align'])) ?: $return['sub_title_class'][] = $instance['modifiers']['sub_title_align'];

		return $return;

	}

	function get_widget_form() {

		global $echelon_so, $echelon_so_modifiers;
		$option_template_overlay = 'Overlay' . $echelon_so->prime_tag();
		$label_sub_title = 'Sub Title' . $echelon_so->prime_tag();

		$return['lightbox_content'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'template' => array(
					'type' => 'select',
					'default' => 'default',
					'label' => __( 'Template', 'echelon-so' ),
					'options' => array(
						'default' => __('Default', 'echelon-so'),
						'icon' => __('Icon', 'echelon-so'),
						'overlay' => __($option_template_overlay, 'echelon-so'),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'template' )
					)
				),
				'image' => array(
					'type' => 'media',
					'label' => __( 'Image', 'echelon-so' ),
					'choose' => __( 'Choose Image', 'echelon-so' ),
					'update' => __( 'Set Image', 'echelon-so' ),
					'library' => 'image',
					'fallback' => true
				),
				'thumb_size' => array(
					'type' => 'image-size',
					'label' => __( 'Thumb Size', 'echelon-so' ),
				),
				'display_size' => array(
					'type' => 'image-size',
					'label' => __( 'Display Size', 'echelon-so' ),
				),
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'echelon-so' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'label' => __( $label_sub_title, 'echelon-so' ),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				)
			)
		);

		$label_overlay = 'Overlay' . $echelon_so->prime_tag();
		$label_position = 'Position' . $echelon_so->prime_tag();
		$label_position_size = 'Position Size' . $echelon_so->prime_tag();
		$label_flex_h = 'Flex Horizontal' . $echelon_so->prime_tag();
		$label_flex_v = 'Flex Vertical' . $echelon_so->prime_tag();
		$label_transition = 'Transition' . $echelon_so->prime_tag();
		$label_title_size = 'Title Size' . $echelon_so->prime_tag();
		$label_title_weight = 'Title Weight' . $echelon_so->prime_tag();
		$label_title_align = 'Title Align' . $echelon_so->prime_tag();
		$label_sub_title_size = 'Sub Title Size' . $echelon_so->prime_tag();
		$label_sub_title_weight = 'Sub Title Weight' . $echelon_so->prime_tag();
		$label_sub_title_align = 'Sub Title Align' . $echelon_so->prime_tag();

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'height' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( 'Height', 'echelon-so' ),
					'options' => $echelon_so_modifiers->height(),
					'state_emitter' => array(
						'callback' => 'select',
						'args' => array( 'height' )
					)
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( 'Inverse', 'echelon-so' ),
					'options' => $echelon_so_modifiers->inverse()
				),
				'image_scale' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( 'Image Scale', 'echelon-so' ),
					'options' => array(
						'0' => __('-', 'echelon-so'),
						'uk-transition-scale-up' => __('Scale Up', 'echelon-so')
					),
					'state_handler' => array(
						'height[0]' => array( 'show' ),
						'_else[height]' => array( 'hide' ),
					)
				),
				'overlay' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_overlay, 'echelon-so' ),
					'options' => $echelon_so_modifiers->overlay(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'position' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_position, 'echelon-so' ),
					'options' => $echelon_so_modifiers->position(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'position_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_position_size, 'echelon-so' ),
					'options' => $echelon_so_modifiers->position_size(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'flex_h' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_flex_h, 'echelon-so' ),
					'description' => __( 'You might need this for cover based positioning.', 'echelon-so' ),
					'options' => $echelon_so_modifiers->flex_h(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'flex_v' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_flex_v, 'echelon-so' ),
					'description' => __( 'You might need this for cover based positioning.', 'echelon-so' ),
					'options' => $echelon_so_modifiers->flex_v(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'transition' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_transition, 'echelon-so' ),
					'options' => $echelon_so_modifiers->transition(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'title_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_title_size, 'echelon-so' ),
					'options' => $echelon_so_modifiers->font_size(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'title_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_title_weight, 'echelon-so' ),
					'options' => $echelon_so_modifiers->font_weight(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'title_align' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_title_align, 'echelon-so' ),
					'options' => $echelon_so_modifiers->text_align(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'sub_title_size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_sub_title_size, 'echelon-so' ),
					'options' => $echelon_so_modifiers->font_size(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'sub_title_weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_sub_title_weight, 'echelon-so' ),
					'options' => $echelon_so_modifiers->font_weight(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
				),
				'sub_title_align' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __( $label_sub_title_align, 'echelon-so' ),
					'options' => $echelon_so_modifiers->text_align(),
					'state_handler' => array(
						'template[overlay]' => array( 'show' ),
						'_else[template]' => array( 'hide' ),
					)
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
		return $echelon_so_teasers->teaser('eso-lightbox-component-image');
	}
}

siteorigin_widget_register('echelonso-eso-lightbox-component-image', __FILE__, 'EchelonSOEsoLightboxComponentImage');
