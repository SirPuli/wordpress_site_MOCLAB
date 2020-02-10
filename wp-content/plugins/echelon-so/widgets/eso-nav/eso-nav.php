<?php

/*
Widget Name: E: Nav
Description: A vertical nav for Off Canvas and  other uses.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoNav extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-nav',
            __('E: Nav', 'echelon-so'),
            array(
                'description' => __('A vertical nav for Off Canvas and  other uses.', 'echelon-so' ),
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
        $return['nav'] = !empty( $instance['nav'] ) ? $instance['nav'] : '';

        // modifiers
        $return['nav_class'] = array();
        (empty($instance['modifiers']['inverse'])) ?: $return['nav_class'][] = $instance['modifiers']['inverse'];
        (empty($instance['modifiers']['alignment'])) ?: $return['nav_class'][] = $instance['modifiers']['alignment'];

        $return['heading_class'] = array();
        (empty($instance['modifiers']['heading_size'])) ?: $return['nav_class'][] = $instance['modifiers']['heading_size'];
        (empty($instance['modifiers']['heading_weight'])) ?: $return['nav_class'][] = $instance['modifiers']['heading_weight'];

        $return['link_class'] = array();
        (empty($instance['modifiers']['link_size'])) ?: $return['nav_class'][] = $instance['modifiers']['link_size'];
        (empty($instance['modifiers']['link_weight'])) ?: $return['nav_class'][] = $instance['modifiers']['link_weight'];

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so_modifiers;

        $return['nav'] = array(
            'type' => 'repeater',
            'label' => __('Sections', 'echelon-so'),
            'item_name' => __('Section', 'echelon-so'),
            'fields' => array(
                'header' => array(
                    'type' => 'text',
                    'label' => __( 'Header', 'echelon-so' ),
                ),
                'links' => array(
                    'type' => 'repeater',
                    'label' => __('Links', 'echelon-so'),
                    'item_name' => __('Link', 'echelon-so'),
                    'fields' => array(
                        'text' => array(
                            'type' => 'text',
                            'label' => __( 'Text', 'echelon-so' ),
                        ),
                        'target' => array(
                            'type' => 'text',
                            'label' => __( 'Target', 'echelon-so' ),
                        )
                    )
                )
            )
        );

        $return['modifiers'] = array(
            'type' => 'section',
            'label' => __( 'Modifiers' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'heading_size' => array(
                    'type' => 'select',
                    'default' => 'uk-text-xlarge',
                    'label' => __('Heading Size', 'echelon-so'),
                    'options' => $echelon_so_modifiers->font_size()
                ),
                'heading_weight' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Heading Weight', 'echelon-so'),
                    'options' => $echelon_so_modifiers->font_weight()
                ),
                'link_size' => array(
                    'type' => 'select',
                    'default' => 'uk-text-large',
                    'label' => __('Link Size', 'echelon-so'),
                    'options' => $echelon_so_modifiers->text_size(),
                ),
                'link_weight' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Link Weight', 'echelon-so'),
                    'options' => $echelon_so_modifiers->font_weight(),
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
    * Form Teaser
    */

    function get_form_teaser() {
        global $echelon_so;
        return $echelon_so->form_teaser();
    }

}

siteorigin_widget_register('echelonso-eso-nav', __FILE__, 'EchelonSOEsoNav');
