<?php

/*
Widget Name: E: Description List
Description: A simple alternative to item lists.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoDescriptionList extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-description-list',
            __('E: Description List', 'echelon-so'),
            array(
                'description' => __('A simple alternative to item lists.', 'echelon-so' ),
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    /*
    * Template File Variables
    */

    function get_template_variables( $instance, $args ) {
        $return['list_items'] = $instance['description_list']['list_items'];
        $return['class'] = array();
        (empty($instance['modifiers']['divider'])) ?: $return['class'][] = $instance['modifiers']['divider'];

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        $return['description_list'] = array(
            'type' => 'section',
            'label' => __( 'Data' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'list_items' => array(
                    'type' => 'repeater',
                    'label' => __( 'List Items' , 'echelon-so' ),
                    'item_name'  => __( 'Item', 'echelon-so' ),
                    'fields' => array(
                        'heading' => array(
                            'type' => 'text',
                            'label' => __( 'Heading', 'echelon-so' )
                        ),
                        'text' => array(
                            'type' => 'textarea',
                            'label' => __( 'Text', 'echelon-so' )
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
                'divider' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Divider', 'echelon-so'),
                    'options' => array(
                        '0' => __('-', 'echelon-so'),
                        'uk-description-list-divider' => __('Divider', 'echelon-so'),
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
        return $echelon_so_teasers->teaser('generic');
    }

}

siteorigin_widget_register('echelonso-eso-description-list', __FILE__, 'EchelonSOEsoDescriptionList');
