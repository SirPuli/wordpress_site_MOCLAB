<?php

/*
Widget Name: E: Tabs
Description: Animated content switching tabs.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoTabs extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-tabs',
            __('E: Tabs', 'echelon-so'),
            array(
                'description' => __('Animated content switching tabs.', 'echelon-so' ),
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
        return 'default';
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        // content
        $return['tabs_repeater'] = !empty( $instance['tabs_repeater'] ) ? $instance['tabs_repeater'] : '';

        // Modifiers
        $return['icon_size'] = !empty( $instance['modifiers']['icon_size'] ) ? $instance['modifiers']['icon_size'] : 15;

        $return['tabs_class'] = array();
        (empty($instance['modifiers']['flex_h'])) ?: $return['tabs_class'][] = $instance['modifiers']['flex_h'];

        $return['link_class'] = array();
        (empty($instance['modifiers']['title_size'])) ?: $return['link_class'][] = $instance['modifiers']['title_size'];
        (empty($instance['modifiers']['title_transform'])) ?: $return['link_class'][] = $instance['modifiers']['title_transform'];

        $return['animation_in'] = !empty( $instance['modifiers']['animation_in'] ) ? $instance['modifiers']['animation_in'] : 'uk-animation-fade';
        $return['animation_out'] = !empty( $instance['modifiers']['animation_out'] ) ? $instance['modifiers']['animation_out'] : 'uk-animation-fade';

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so, $echelon_so_modifiers;
        
        $return['tabs_repeater'] = array(
            'type' => 'repeater',
            'label' => __( 'Tabs Content' , 'echelon-so' ),
            'item_name'  => __( 'Tabs', 'siteorigin-widgets' ),
            'fields' => array(
                'icon' => array(
                    'type' => 'icon',
                    'label' => __( 'Icon', 'echelon-so' ),
                    'state_handler' => array(
                        'template[icon]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'title' => array(
                    'type' => 'text',
                    'label' => __( 'Title', 'echelon-so' )
                ),
                'content' => array(
                    'type' => 'builder',
                    'label' => __( 'Content', 'echelon-so' )
                ),
            )
        );

        $option_template_icon = 'Icon' . $echelon_so->prime_tag();

        $return['tabs'] = array(
            'type' => 'section',
            'label' => __( 'Data' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'template' => array(
                    'type' => 'select',
                    'label' => __( 'Template', 'echelon-so' ),
                    'default' => 'default',
                    'options' => array(
                        'default' => __( 'Default', 'echelon-so' ),
                        'icon' => __( $option_template_icon, 'echelon-so' ),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'template' )
                    )
                ),
            )
        );

        $return['modifiers'] = array(
            'type' => 'section',
            'label' => __( 'Modifiers' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'icon_size' => array(
                    'type' => 'slider',
                    'default' => '15',
                    'label' => __('Icon Size', 'echelon-so'),
                    'min' => 5,
                    'max' => 50,
                    'integer' => true,
                    'state_handler' => array(
                        'template[icon]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'flex_h' => array(
                    'type' => 'select',
                    'default' => 'uk-flex-left',
                    'label' => __('Tabs Align', 'echelon-so'),
                    'options' => $echelon_so_modifiers->flex_h()
                ),
                'animation_in' => array(
                    'type' => 'select',
                    'default' => 'uk-animation-fade',
                    'label' => __('Animation In', 'echelon-so'),
                    'options' => $echelon_so_modifiers->animation()
                ),
                'animation_out' => array(
                    'type' => 'select',
                    'default' => 'uk-animation-fade',
                    'label' => __('Animation Out', 'echelon-so'),
                    'options' => $echelon_so_modifiers->animation()
                ),
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
                'title_transform' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Title Transform', 'echelon-so'),
                    'options' => $echelon_so_modifiers->text_transform()
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
        return $echelon_so_teasers->teaser('eso-tabs');
    }

}

siteorigin_widget_register('echelonso-eso-tabs', __FILE__, 'EchelonSOEsoTabs');
