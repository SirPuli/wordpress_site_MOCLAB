<?php

/*
Widget Name: E: Lightbox Gallery
Description: Grid based Lightbox Galleries (uses Lightbox Components).
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoLightboxGallery extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-lightbox-gallery',
			__('E: Lightbox Gallery', 'echelon-so'),
			array(
				'description' => __('Grid based Lightbox Galleries (uses Lightbox Components).', 'echelon-so' ),
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
		$return['lightbox'] = !empty($instance['lightbox_gallery']['lightbox']) ? $instance['lightbox_gallery']['lightbox'] : '';
		$return['animation'] = 'slide';
		return $return;
	}

	/*
	* Widgert Form
	*/

	function get_widget_form() {

		global $echelon_so;

		$option_animation_fade = 'Fade' . $echelon_so->prime_tag();
		$option_animation_scale = 'Scale' . $echelon_so->prime_tag();

		$return['lightbox_gallery'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'lightbox' => array(
					'type' => 'builder',
					'label' => __( 'Gallery Layout', 'echelon-so' ),
				),
				'animation' => array(
					'type' => 'select',
					'default' => 'slide',
					'label' => __('Animation', 'echelon-so'),
					'options' => array(
						'slide' => __('Slide', 'echelon-so'),
						'fade' => __($option_animation_fade, 'echelon-so'),
						'scale' => __($option_animation_scale, 'echelon-so'),
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
		global $echelon_so_teasers;
		return $echelon_so_teasers->teaser('eso-lightbox-gallery');
	}
}

siteorigin_widget_register('echelonso-eso-lightbox-gallery', __FILE__, 'EchelonSOEsoLightboxGallery');
