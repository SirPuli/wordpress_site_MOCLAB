<?php
/*
Widget Name: E: Custom Loop
Description: Run a custom loop for an Echelon layout based on a posts query.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoCustomLoop extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-custom-loop',
			__('E: Custom Loop', 'echeon-so' ),
			array(
				'description' => __('Run a loop for an Echelon layout based on a posts query.', 'echeon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Widget Form
	*/

	function get_template_variables($instance, $args) {
		// content
		$return['layout'] = !empty( $instance['custom_loop']['layout'] ) ? absint($instance['custom_loop']['layout']) : false;
		$return['some_posts'] = !empty( $instance['custom_loop']['some_posts'] ) ? $instance['custom_loop']['some_posts'] : false;
		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so;

		$return['custom_loop'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'layout' => array(
					'type' => 'select',
					'label' => __( 'Echelon Layout', 'echeon-so' ),
					'description' => __('The Echelon Layout will be displayed as being in loop allowing Template Tags, ACF and WooCommerce plus all other in loop functionality.', 'echelon-so'),
					'default' => '0',
					'options' => $echelon_so->get_layout_select_options()
				),
				'some_posts' => array(
					'type' => 'posts',
					'label' => __('Some Posts Query', 'echeon-so' ),
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
		return $echelon_so_teasers->teaser('generic');
	}

}

siteorigin_widget_register('echelonso-eso-custom-loop', __FILE__, 'EchelonSOEsoCustomLoop');
