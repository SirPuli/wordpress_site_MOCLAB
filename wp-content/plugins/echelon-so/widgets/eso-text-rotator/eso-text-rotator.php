<?php
/*
Widget Name: E: Text Rotator
Description: Automaitcally rotate text with animations.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoTextRotator extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-text-rotator',
            __('E: Text Rotator', 'echelon-so'),
            array(
                'description' => __('Automaitcally rotate text with animations.', 'echelon-so' ),
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
        if ( !empty($instance['text_rotator']['words']) ) {
            foreach ($instance['text_rotator']['words'] as $k => $v) {
                $return['words'][] = $v['word'];
            }
        }
        $return['int_id'] = 'tr_' . uniqid(rand(1,9999));
        $return['speed'] = absint($instance['modifiers']['speed']) * 1000;

        $allowed_effects = array('fade', 'dissolve');
        if ( in_array($instance['modifiers']['effect'], $allowed_effects) ) {
            $return['effect'] = !empty($instance['modifiers']['effect']) ? $instance['modifiers']['effect'] : '';
        } else {
            $return['effect'] = 'fade';
        }

        $return['before'] = !empty($instance['text_rotator']['before']) ? $instance['text_rotator']['before'] : '';
        $return['after'] = !empty($instance['text_rotator']['after']) ? $instance['text_rotator']['after'] : '';
        $return['inner_color'] = !empty($instance['modifiers']['inner_color']) ? $instance['modifiers']['inner_color'] : 'inherit';
        //modifiers
        $return['text_class'] = array();
        (empty($instance['modifiers']['size'])) ?: $return['text_class'][] = $instance['modifiers']['size'];
        (empty($instance['modifiers']['weight']) && $instance['text_rotator']['font'] != 'default') ?: $return['text_class'][] = $instance['modifiers']['weight'];
        (empty($instance['modifiers']['transform'])) ?: $return['text_class'][] = $instance['modifiers']['transform'];
        (empty($instance['modifiers']['alignment'])) ?: $return['text_class'][] = $instance['modifiers']['alignment'];
        (empty($instance['modifiers']['inverse'])) ?: $return['text_class'][] = $instance['modifiers']['inverse'];
        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so, $echelon_so_modifiers;

        $return['text_rotator'] = array(
            'type' => 'section',
            'label' => __( 'Data' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'words' => array(
                    'type' => 'repeater',
                    'label' => __( 'Words' , 'echelon-so' ),
                    'item_name'  => __( 'Word', 'echelon-so' ),
                    'fields' => array(
                        'word' => array(
                            'type' => 'text',
                            'label' => __( 'A Word', 'echelon-so' )
                        ),
                    )
                ),
                'before' => array(
                    'type' => 'text',
                    'default' => '',
                    'label' => __('Before', 'echelon-so'),
                ),
                'after' => array(
                    'type' => 'text',
                    'default' => '',
                    'label' => __('After', 'echelon-so'),
                ),
                'font' => array(
                    'type' => 'font',
                    'default' => 'default',
                    'label' => __('Font', 'echelon-so'),
                )
            )
        );

        $option_effect_flip = 'Flip' . $echelon_so->prime_tag();
        $option_effect_flip_up = 'Flip Up' . $echelon_so->prime_tag();
        $option_effect_flip_cube = 'Flip Cube' . $echelon_so->prime_tag();
        $option_effect_flip_cube_up = 'Flip Cube Up' . $echelon_so->prime_tag();
        $option_effect_spin = 'Spin' . $echelon_so->prime_tag();

        $return['modifiers'] = array(
            'type' => 'section',
            'label' => __( 'Modifiers' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'inner_color' => array(
                    'type' => 'color',
                    'label' => __( 'Inner Color', 'echelon-so' ),
                    'default' => '#252525'
                ),
                'effect' => array(
                    'type' => 'select',
                    'default' => 'fade',
                    'label' => __('Animation', 'echelon-so'),
                    'options' => array(
                        'fade' => __('Fade', 'echelon-so'),
                        'dissolve' => __('Dissolve', 'echelon-so'),
                        'flip' => __($option_effect_flip, 'echelon-so'),
                        'flipUp' => __($option_effect_flip_up, 'echelon-so'),
                        'flipCube' => __($option_effect_flip_cube, 'echelon-so'),
                        'flipCubeUp' => __($option_effect_flip_cube_up, 'echelon-so'),
                        'spin' => __($option_effect_spin, 'echelon-so'),
                    )
                ),
                'speed' => array(
                    'type' => 'slider',
                    'default' => '3',
                    'label' => __('Speed', 'echelon-so'),
                    'min' => 1,
                    'max' => 10,
                    'integer' => true,
                ),
                'size' => array(
                    'type' => 'select',
                    'default' => 'small',
                    'label' => __('Font Size', 'echelon-so'),
                    'options' => $echelon_so_modifiers->font_size()
                ),
                'weight' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Font Weight', 'echelon-so'),
                    'description' => __('Google fonts ignore this modifier.', 'echelon-so'),
                    'options' => $echelon_so_modifiers->font_weight()
                ),
                'transform' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Text Transform', 'echelon-so'),
                    'options' => $echelon_so_modifiers->text_transform()
                ),
                'alignment' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Text Align', 'echelon-so'),
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
        wp_enqueue_script('echelonso_text_rotator_cdn_js', 'https://cdn.jsdelivr.net/npm/jquery.simple-text-rotator@0.0.1/jquery.simple-text-rotator.min.js', array('jquery'), '0.0.1', true);
        wp_enqueue_style('echelonso_text_rotator_cdn_css', 'https://cdn.jsdelivr.net/npm/jquery.simple-text-rotator@0.0.1/simpletextrotator.min.css', array(), '0.0.1');
    }

    /*
    * Google Font
    */

    function get_google_font_fields($instance) {
        if (!empty($instance['text_rotator']['font'])) {
            return array(
                $instance['text_rotator']['font'],
            );
        } else {
            return false;
        }
    }

    function get_less_variables($instance) {
        $return = array();
        if ( ! empty( $instance['text_rotator']['font'] ) ) {
            $font = siteorigin_widget_get_font( $instance['text_rotator']['font'] );
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
        global $echelon_so_teasers;
        return $echelon_so_teasers->teaser('eso-text-rotator');
    }

}

siteorigin_widget_register('echelonso-eso-text-rotator', __FILE__, 'EchelonSOEsoTextRotator');
