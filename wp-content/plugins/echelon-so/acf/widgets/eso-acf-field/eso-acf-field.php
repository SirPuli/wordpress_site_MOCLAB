<?php

/*
Widget Name: E: ACF Field
Description: Display a supported ACF field.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOAcfField extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-acf-field',
            __('E: ACF Field', 'echelon-so' ),
            array(
                'description' => __('Display a supported ACF field.', 'echelon-so' ),
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

        global $echelonso_acf;
        $fo = $echelonso_acf->get_acf_field_object($instance);

        // do we have a field
        if (empty($fo)) {
            return 'error';
        }

        // reusable layout
        if ( !empty($instance['field']['render_reusable_layout']) ) {
            return 'echelon_layout';
        }

        // templates for fields types
        $field_type = $fo['field_object']['type'];
        $sp_text = array('text','textarea', 'wysiwyg', 'select', 'date_picker', 'date_time_picker', 'time_picker');
        $sp_number = array('number','range');

        if ( in_array($field_type, $sp_text) ) {
            return 'text';
        }

        if ( in_array($field_type, $sp_number) ) {
            return 'number';
        }

        if ( $fo['field_object']['type'] == 'url' ) {
            return 'url';
        }

        if ( $fo['field_object']['type'] == 'email' ) {
            return 'email';
        }

        if ($fo['field_object']['type'] == 'file') {
            return 'file';
        }

        if ($fo['field_object']['type'] == 'image') {
            return 'image';
        }

        return 'error';

    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        global $echelonso_acf;
        $return['fo'] = $echelonso_acf->get_acf_field_object($instance);

        $return['text_class'] = array();
        (empty($instance['modifiers']['size'])) ?: $return['text_class'][] = $instance['modifiers']['size'];
        (empty($instance['modifiers']['weight'])) ?: $return['text_class'][] = $instance['modifiers']['weight'];
        (empty($instance['modifiers']['transform'])) ?: $return['text_class'][] = $instance['modifiers']['transform'];
        (empty($instance['modifiers']['alignment'])) ?: $return['text_class'][] = $instance['modifiers']['alignment'];
        (empty($instance['modifiers']['inverse'])) ?: $return['text_class'][] = $instance['modifiers']['inverse'];

        $return['link'] = !empty($instance['template']['text']['link']) ? true : false;

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelonso_acf;
        global $echelon_so_modifiers;

        $return['field'] = array(
            'type' => 'section',
            'label' => __( 'Field' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'source' => array(
                    'type' => 'select',
                    'label' => __( 'Source', 'echelon-so' ),
                    'default' => 'loop',
                    'options' => array(
                        'loop' => __( 'Directly', 'echelon-so' ),
                        'post_object' => __( 'Via Relation', 'echelon-so' ),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'source' )
                    )
                ),
                'post_object_field' => array(
                    'type' => 'select',
                    'label' => __( 'Relation Field', 'echelon-so' ),
                    'default' => '',
                    'options' => $echelonso_acf->get_acf_post_object_options(),
                    'state_handler' => array(
                        'source[post_object]' => array('show'),
                        '_else[source]' => array('hide'),
                    )
                ),
                'field' => array(
                    'type' => 'select',
                    'label' => __( 'Field', 'echelon-so' ),
                    'default' => '',
                    'options' => $echelonso_acf->get_acf_field_options(),
                ),

                'render_reusable_layout' => array(
                    'type' => 'checkbox',
                    'label' => __( 'Render Echelon Layout', 'echelon-so' ),
                    'default' => false,
                ),
            )
        );

        $return['template'] = array(
            'type' => 'section',
            'label' => __( 'Field Options' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'show_options' => array(
                    'type' => 'select',
                    'label' => __( 'Show Options For', 'echelon-so' ),
                    'default' => '0',
                    'options' => array(
                        '0' => __( '-', 'echelon-so' ),
                        'text' => __( 'Text', 'echelon-so' ),
                        'url' => __( 'URL', 'echelon-so' ),
                        'email' => __( 'Email', 'echelon-so' ),
                        'file' => __( 'File', 'echelon-so' ),
                        'image' => __( 'Image', 'echelon-so' ),
                        'number' => __( 'Number', 'echelon-so' ),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'show_options' )
                    ),
                ),
                'text' => array(
                    'type' => 'section',
                    'label' => __( 'Text', 'echelon-so' ),
                    'hide' => true,
                    'fields' => array(
                        'link' => array(
                            'type' => 'checkbox',
                            'label' => __('Self Link', 'echelon-so' ),
                            'default' => false,
                        )
                    ),
                    'state_handler' => array(
                        'show_options[text]' => array('show'),
                        '_else[show_options]' => array('hide'),
                    )
                ),
                'url' => array(
                    'type' => 'section',
                    'label' => __( 'URL', 'echelon-so' ),
                    'hide' => true,
                    'fields' => array(
                        'linked_text' => array(
                            'type' => 'text',
                            'label' => __('Link Text', 'echelon-so' ),
                            'default' => '',
                        )
                    ),
                    'state_handler' => array(
                        'show_options[url]' => array('show'),
                        '_else[show_options]' => array('hide'),
                    )
                ),
                'email' => array(
                    'type' => 'section',
                    'label' => __( 'Email' , 'echelon-so' ),
                    'hide' => true,
                    'fields' => array(
                        'linked_text' => array(
                            'type' => 'text',
                            'label' => __( 'Link Text', 'echelon-so' ),
                            'default' => '',
                        )
                    ),
                    'state_handler' => array(
                        'show_options[email]' => array('show'),
                        '_else[show_options]' => array('hide'),
                    )
                ),
                'file' => array(
                    'type' => 'section',
                    'label' => __( 'File' , 'echelon-so' ),
                    'hide' => true,
                    'fields' => array(
                        'linked_text' => array(
                            'type' => 'text',
                            'label' => __( 'Link Text', 'echelon-so' ),
                            'default' => '',
                        )
                    ),
                    'state_handler' => array(
                        'show_options[file]' => array('show'),
                        '_else[show_options]' => array('hide'),
                    )
                ),
                'image' => array(
                    'type' => 'section',
                    'label' => __( 'Image' , 'echelon-so' ),
                    'hide' => true,
                    'fields' => array(
                        'size' => array(
                            'type' => 'image-size',
                            'label' => __( 'Size', 'echelon-so' ),
                        ),
                    ),
                    'state_handler' => array(
                        'show_options[image]' => array('show'),
                        '_else[show_options]' => array('hide'),
                    )
                ),
                'number' => array(
                    'type' => 'section',
                    'label' => __( 'Number', 'echelon-so' ),
                    'hide' => true,
                    'fields' => array(
                        'decimals' => array(
                            'type' => 'number',
                            'label' => __( 'Decimal Places', 'echelon-so' ),
                            'default' => 0,
                        ),
                        'decimal_point' => array(
                            'type' => 'text',
                            'label' => __('Decimal Point', 'echelon-so'),
                            'default' => ''
                        ),
                        'separator' => array(
                            'type' => 'text',
                            'label' => __('Thousands Separator', 'echelon-so'),
                            'default' => ''
                        ),
                        'before_symbol' => array(
                            'type' => 'text',
                            'label' => __('Before Symbol', 'echelon-so'),
                            'default' => ''
                        ),
                        'after_symbol' => array(
                            'type' => 'text',
                            'label' => __('After Symbol', 'echelon-so'),
                            'default' => ''
                        ),
                    ),
                    'state_handler' => array(
                        'show_options[number]' => array('show'),
                        '_else[show_options]' => array('hide'),
                    )
                ),
            )
        );

        $return['modifiers'] = array(
            'type' => 'section',
            'label' => __( 'Modifiers' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'size' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Size', 'echelon-so'),
                    'options' => $echelon_so_modifiers->font_size()
                ),
                'weight' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Weight', 'echelon-so'),
                    'description' => __('Google fonts ignore this modifier.', 'echelon-so'),
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

}

siteorigin_widget_register('echelonso-acf-field', __FILE__, 'EchelonSOAcfField');
