<?php
/*
Widget Name: E: Reuse Layout
Description: Display the content from a reusable layout.
Author: Echelon
Author URI: https://echelonso.com
*/


class EchelonSOEsoReuseLayout extends SiteOrigin_Widget {

	function __construct() {



		parent::__construct(
			'echelonso-eso-reuse-layout',
			__('E: Reuse Layout', 'echelon-so'),
			array(
				'description' => __('Display the content from a reusable layout.', 'echelon-so' ),
			),
			false,
			array(),
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {

		global $echelon_so;

		$form['option'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'layout' => array(
					'type' => 'select',
					'label' => __( 'Layout', 'echelon-so' ),
					'description' => __( 'Select which layout you would like to reuse.' , 'echelon-so' ),
					'default' => '0',
					'options' => $echelon_so->get_layout_select_options()
				)
			)
		);

		return $form;
	}

	function get_template_name($instance) {
		return 'tpl';
	}

	function get_style_name($instance) {
		return false;
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so;
		return $echelon_so->form_teaser();
	}

}


siteorigin_widget_register('echelonso-eso-reuse-layout', __FILE__, 'EchelonSOEsoReuseLayout');
