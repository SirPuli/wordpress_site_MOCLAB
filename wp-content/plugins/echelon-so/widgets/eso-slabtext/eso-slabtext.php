<?php
/*
Widget Name: E: Slabtext
Description: Automatically format text into square blocks.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoSlabtext extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-slabtext',
            __('E: Slabtext', 'echelon-so'),
            array(
                'description' => __('Automatically format text into square blocks.', 'echelon-so' ),
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
        $return['text'] = !empty($instance['slabtext']['text']) ? $instance['slabtext']['text'] : '';
        $return['int_id'] = 'st_' . uniqid(rand(1,9999));
		$return['text_class'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['text_class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['weight']) && $instance['slabtext']['font'] != 'default') ?: $return['text_class'][] = $instance['modifiers']['weight'];
		(empty($instance['modifiers']['transform'])) ?: $return['text_class'][] = $instance['modifiers']['transform'];
		(empty($instance['modifiers']['alignment'])) ?: $return['text_class'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['inverse'])) ?: $return['text_class'][] = $instance['modifiers']['inverse'];
        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so_modifiers;

        $return['slabtext'] = array(
			'type' => 'section',
			'label' => __( 'Data' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'text' => array(
					'type' => 'text',
					'label' => __('Text', 'echelon-so'),
					'default' => ''
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
					'default' => 'small',
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
    * Scripts
    */

    function initialize(){
        add_action( 'siteorigin_widgets_enqueue_frontend_scripts_' . $this->id_base, array( $this, 'enqueue_widget_scripts' ) );
    }

    function enqueue_widget_scripts($instance) {
        wp_enqueue_script('echelonso_text_rotator_cdn_js', 'https://cdnjs.cloudflare.com/ajax/libs/slabText/2.3/jquery.slabtext.min.js', array('jquery'), '2.3.0', true);
    }

    /*
	* Google Font
	*/

	function get_google_font_fields($instance) {
		if (!empty($instance['slabtext']['font'])) {
			return array(
				$instance['slabtext']['font'],
			);
		} else {
			return false;
		}
	}

	function get_less_variables($instance) {
		$return = array();
		if ( ! empty( $instance['slabtext']['font'] ) ) {
			$font = siteorigin_widget_get_font( $instance['slabtext']['font'] );
			$return['font'] = $font['family'];
			if ( ! empty( $font['weight'] ) ) {
				$return['font_weight'] = $font['weight'];
			}
		}
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

siteorigin_widget_register('echelonso-eso-slabtext', __FILE__, 'EchelonSOEsoSlabtext');
