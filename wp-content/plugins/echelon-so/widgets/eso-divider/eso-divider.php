<?php

/*
Widget Name: E: Divider
Description: Horizontal and veritcal dividers.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoDivider extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-divider',
            __('E: Divider', 'echelon-so'),
            array(
                'description' => __('Horizontal and veritcal dividers.', 'echelon-so' ),
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
        $allowed_templates = array('default', 'small', 'vertical');
        if ( in_array($instance['divider']['template'], $allowed_templates) ) {
            return $instance['divider']['template'];
        } else {
            return 'default';
        }
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {
        $return = array();
        // icon
        $return['icon'] = !empty($instance['divider']['icon']) ? $instance['divider']['icon'] : '';
        $return['icon_styles'][] = !empty($instance['divider']['icon_color']) ? 'color: ' . $instance['divider']['icon_color'] : 'inherit';
        $return['icon_styles'][] = !empty($instance['divider']['icon_size']) ? 'font-size: ' . $instance['divider']['icon_size'] : 'inherit';
        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so;

        $option_template_icon = 'Icon' . $echelon_so->prime_tag();
        $label_icon = 'Icon' . $echelon_so->prime_tag();
        $label_icon_color = 'Icon Color' . $echelon_so->prime_tag();
        $label_icon_size = 'Icon Size' . $echelon_so->prime_tag();

        $return['divider'] = array(
            'type' => 'section',
            'label' => __( 'Data' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'template' => array(
                    'type' => 'select',
                    'default' => 'default',
                    'label' => __('Template', 'echelon-so'),
                    'description' => __('The dividers color is inherited from Design > Font Color.', 'echelon-so'),
                    'options' => array(
                        'default' => __( 'Large', 'echelon-so' ),
                        'small' => __( 'Small', 'echelon-so' ),
                        'vertical' => __( 'Vertical', 'echelon-so' ),
                        'icon' => __( $option_template_icon, 'echelon-so' ),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'template' )
                    )
                ),
                'icon' => array(
                    'type' => 'icon',
                    'label' => __( $label_icon, 'echelon-so' ),
                    'state_handler' => array(
                        'template[icon]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'icon_color' => array(
                    'type' => 'color',
                    'default' => '#252525',
                    'label' => __( $label_icon_color, 'echelon-so' ),
                    'state_handler' => array(
                        'template[icon]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'icon_size' => array(
                    'type' => 'multi-measurement',
                    'autofill' => true,
                    'default' => '40px',
                    'label' => __( $label_icon_size, 'echelon-so' ),
                    'measurements' => array(
                        'width' => array(
                            'units' => array( 'px' ),
                        )
                    ),
                    'state_handler' => array(
                        'template[icon]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                )
            )
        );

        return $return;

    }

}

siteorigin_widget_register('echelonso-eso-divider', __FILE__, 'EchelonSOEsoDivider');
