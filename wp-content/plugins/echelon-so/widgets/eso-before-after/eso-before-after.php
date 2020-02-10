<?php

/*
Widget Name: E: Before & After
Description: Slider to compare the visual difference between two images.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoBeforeAfter extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-before-after',
			__('E: Before & After', 'echelon-so'),
			array(
				'description' => __('Compare the visual difference between two images.', 'echelon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template File Variables
	*/

	function get_template_variables($instance, $args) {
		$return = array();
		if ( !empty($instance['before_after']['image_1']) ) {
			$size = empty( $instance['before_after']['image_1_size'] ) ? 'full' : $instance['before_after']['image_1_size'];
			$attachment = wp_get_attachment_image_src( $instance['before_after']['image_1'], $size );
			$return['image_1'] = sow_esc_url($attachment[0]);
		} else {
			$return['image_1'] = false;
		}
		if ( !empty($instance['before_after']['image_2']) ) {
			$size = empty( $instance['before_after']['image_2_size'] ) ? 'full' : $instance['before_after']['image_2_size'];
			$attachment = wp_get_attachment_image_src( $instance['before_after']['image_2'], $size );
			$return['image_2'] = sow_esc_url($attachment[0]);
		} else {
			$return['image_2'] = false;
		}
		$return['before_label'] = __('Before', 'echelon-so');
		$return['after_label'] = __('After', 'echelon-so');
		$return['initial_offset'] = 0.5;
		$return['orientation'] = 'horizontal';
		$return['int_id'] = 'ba_' . uniqid(rand(1,9999));
		return $return;
	}


	function get_widget_form() {

		global $echelon_so;

		$label_image_1 = 'Image 1 Label' . $echelon_so->prime_tag();
		$label_image_2 = 'Image 2 Label' . $echelon_so->prime_tag();
		$option_orientation_vertical = 'Vertical' . $echelon_so->prime_tag();

		$return['before_after'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'image_1' => array(
					'type' => 'media',
					'label' => __( 'Image 1', 'echelon-so' ),
					'description' => __( 'The image to use for the left or top side of the slider.', 'echelon-so' ),
					'choose' => __( 'Choose image', 'echelon-so' ),
					'update' => __( 'Set image', 'echelon-so' ),
					'library' => 'image',
					'fallback' => true

				),
				'image_1_size' => array(
					'type' => 'image-size',
					'label' => __( 'Image 1 Size', 'echelon-so' ),
					'description' => __( 'Choose which image size to use from those available.', 'echelon-so' ),
				),
				'image_1_label' => array(
					'type' => 'text',
					'label' => __( $label_image_1, 'echelon-so' ),
					'description' => __( 'Replace the default before label with some custom text.', 'echelon-so' ),
					'default' => __( 'Before', 'echelon-so' ),
				),
				'image_2' => array(
					'type' => 'media',
					'label' => __( 'Image 2', 'echelon-so' ),
					'description' => __( 'The image to use for the right or bottom side of the slider.', 'echelon-so' ),
					'choose' => __( 'Choose image', 'echelon-so' ),
					'update' => __( 'Set image', 'echelon-so' ),
					'library' => 'image',
					'fallback' => true
				),
				'image_2_size' => array(
					'type' => 'image-size',
					'description' => __( 'Choose which image size to use from those available.', 'echelon-so' ),
					'label' => __( 'Image 2 Size', 'echelon-so' ),

				),
				'image_2_label' => array(
					'type' => 'text',
					'label' => __( $label_image_2, 'echelon-so' ),
					'description' => __( 'Replace the default after label with some custom text.', 'echelon-so' ),
					'default' => __( 'After', 'echelon-so' ),
				),
				'orientation' => array(
					'type' => 'select',
					'label' => __( 'Orientation', 'echelon-so' ),
					'description' => __( 'Choose from a Horizontal (left / right) slider or Vertical (top / bottom) slider.', 'echelon-so' ),
					'default' => __( 'horizontal', 'echelon-so' ),
					'options' => array(
						'horizontal' => __('Horizontal', 'echelon-so'),
						'vertical' => __($option_orientation_vertical, 'echelon-so')
					)
				)
			)
		);
		return $return;
	}

	/*
	* Scripts
	*/

	function initialize(){
		add_action( 'siteorigin_widgets_enqueue_frontend_scripts_' . $this->id_base, array( $this, 'enqueue_widget_scripts' ) );
	}

	function enqueue_widget_scripts($instance) {
		global $echelon_so;
		$twentytwenty = 'https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/js/jquery.twentytwenty.min.js';
		$event_move = 'https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/js/jquery.event.move.min.js';
		$imagesloaded = 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js';
		$css = 'https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/css/twentytwenty.min.css';
		wp_enqueue_script( 'echelonso_images_loaded', $imagesloaded, array('jquery'), '4.1.4', true );
		wp_enqueue_script( 'echelonso_twentytwenty', $twentytwenty, array('jquery', 'echelonso_images_loaded'), '1.0.0', true );
		wp_enqueue_script( 'echelonso_event_move', $event_move, array('jquery', 'echelonso_images_loaded'), '1.0.0', true );
		wp_enqueue_style( 'echelonso_twentytwenty_css', $css, array(), '1.0.0' );
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so_teasers;
		return $echelon_so_teasers->teaser('eso-before-after');
	}

}

siteorigin_widget_register('echelonso-eso-before-after', __FILE__, 'EchelonSOEsoBeforeAfter');
