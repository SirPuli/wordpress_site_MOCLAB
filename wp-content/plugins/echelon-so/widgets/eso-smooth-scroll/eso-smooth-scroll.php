<?php

/*
Widget Name: E: Smooth Scroll
Description: Smooth scroll page links to their targets.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoSmoothScroll extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-smooth-scroll',
			__('E: Smooth Scroll', 'echelon-so'),
			array(
				'description' => __('Smooth scroll page links to their targets.', 'echelon-so' ),
			),
			false,
			array(
				'scroll' => array(
					'type' => 'section',
					'label' => __( 'Data' , 'echelon-so' ),
					'hide' => true,
					'fields' => array(
						'speed' => array(
							'type' => 'number',
							'autofill' => true,
							'default' => '500',
							'label' => __( 'Speed', 'echelon-so' ),
							'description' => __( 'The speed of the scroll in milliseconds.', 'echelon-so' ),
							'measurements' => array(
								'offset' => array(
									'units' => array( 'px' ),
								)
							),
						),
						'offset' => array(
							'type' => 'multi-measurement',
							'autofill' => true,
							'default' => '0px',
							'label' => __( 'Offset', 'echelon-so' ),
							'description' => __( 'Offset the position of the scroll target.', 'echelon-so' ),
							'measurements' => array(
								'offset' => array(
									'units' => array( 'px' ),
								)
							),
						),
					)
				)
			),
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so;
		return $echelon_so->form_teaser();
	}

}

siteorigin_widget_register('echelonso-eso-smooth-scroll', __FILE__, 'EchelonSOEsoSmoothScroll');
