<?php

/*
Widget Name: E: Video
Description: Autoplay and cover based videos.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoVideo extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-video',
            __('E: Video', 'echelon-so'),
            array(
                'description' => __('Autoplay and cover based videos.', 'echelon-so' ),
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
        return 'default';
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        // content
        $return['video'] = '';
        if ( !empty($instance['video']['video']) ) {
            $attachment = wp_get_attachment_url( $instance['video']['video'] );
            if ( !empty( $attachment ) ) {
                $return['video'] = sow_esc_url($attachment);
            }
        }

        // toggle
        $return['toggle_class'] = 'vc_tog_' . uniqid(rand(1,9999));
        $return['toggle_id'] = 'vc_tog_id' . uniqid(rand(1,9999));
        $return['video_id'] = 'vc_id_' . uniqid(rand(1,9999));

        // modifiers
        $return['autoplay'] = $instance['modifiers']['autoplay'];
        $return['atts'] = array();
        (empty($instance['modifiers']['controls'])) ?: $return['atts'][] = 'controls';
        (empty($instance['modifiers']['muted'])) ?: $return['atts'][] = 'muted';
        (empty($instance['modifiers']['loop'])) ?: $return['atts'][] = 'loop';
        (empty($instance['modifiers']['hidden'])) ?: $return['atts'][] = 'hidden';

        $return['transition'] = !empty( $instance['modifiers']['transition'] ) ? 'uk-transition-scale-up' : '';

        $return['cover'] = '';
        if ( ! empty( $instance['video']['cover'] ) ) {
            $size = empty( $instance['video']['cover_size'] ) ? 'full' : $instance['video']['cover_size'];
            $attachment = wp_get_attachment_image_src( $instance['video']['cover'], $size );
            if ( !empty( $attachment ) ) {
                $return['cover'] = sow_esc_url( $attachment[0] );
            }
        }

        $return['icon_styles'] = array();
        if (!empty($instance['video']['icon_size'])) $return['icon_styles'][] = 'font-size: ' . intval($instance['video']['icon_size']) . 'px';
        if (!empty($instance['video']['icon_color'])) $return['icon_styles'][] = 'color: '. $instance['video']['icon_color'];
        $return['icon'] = !empty( $instance['video']['icon'] ) ? $instance['video']['icon'] : false;

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so;

        $option_template_cover = 'Cover' . $echelon_so->prime_tag();

        $return['video'] = array(
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
                        'cover' => __($option_template_cover, 'echelon-so'),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'template' )
                    )
                ),
                'video' => array(
                    'type' => 'media',
                    'label' => __( 'Video', 'echelon-so' ),
                    'choose' => __( 'Choose Video', 'echelon-so' ),
                    'update' => __( 'Set Video', 'echelon-so' ),
                    'library' => 'video',
                    'fallback' => false
                ),
                'cover' => array(
                    'type' => 'media',
                    'label' => __( 'Cover', 'echelon-so' ),
                    'choose' => __( 'Choose Image', 'echelon-so' ),
                    'update' => __( 'Set Image', 'echelon-so' ),
                    'library' => 'image',
                    'fallback' => false,
                    'state_handler' => array(
                        'template[cover]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'cover_size' => array(
                    'type' => 'image-size',
                    'label' => __( 'Cover Size', 'echelon-so' ),
                    'state_handler' => array(
                        'template[cover]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'icon' => array(
                    'type' => 'icon',
                    'label' => __('Icon', 'echelon-so'),
                    'state_handler' => array(
                        'template[cover]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'icon_color' => array(
                    'type' => 'esorgba',
                    'label' => __('Icon Color', 'echelon-so'),
                    'state_handler' => array(
                        'template[cover]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'icon_size' => array(
                    'type' => 'slider',
                    'label' => __('Icon Size', 'echelon-so'),
                    'default' => 50,
                    'min' => 15,
                    'max' => 300,
                    'integer' => true,
                    'state_handler' => array(
                        'template[cover]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                )
            )
        );

        $return['modifiers'] = array(
            'type' => 'section',
            'label' => __( 'Modifiers' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'transition' => array(
                    'type' => 'checkbox',
                    'default' => '0',
                    'label' => __('Cover Scale Up', 'echelon-so'),
                    'state_handler' => array(
                        'template[cover]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'autoplay' => array(
                    'type' => 'select',
                    'default' => 'inview',
                    'label' => __('Auto Play', 'echelon-so'),
                    'options' => array(
                        'true' => __('True', 'echelon-so'),
                        'false' => __('False', 'echelon-so'),
                        'inview' => __('Inview', 'echelon-so'),
                    ),
                    'state_handler' => array(
                        'template[default]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'controls' => array(
                    'type' => 'select',
                    'default' => '1',
                    'label' => __('Controls', 'echelon-so'),
                    'options' => array(
                        '1' => __('True', 'echelon-so'),
                        '0' => __('False', 'echelon-so'),
                    )
                ),
                'muted' => array(
                    'type' => 'select',
                    'default' => '1',
                    'label' => __('Muted', 'echelon-so'),
                    'options' => array(
                        '1' => __('True', 'echelon-so'),
                        '0' => __('False', 'echelon-so'),
                    )
                ),
                'loop' => array(
                    'type' => 'select',
                    'default' => '1',
                    'label' => __('Loop', 'echelon-so'),
                    'options' => array(
                        '1' => __('True', 'echelon-so'),
                        '0' => __('False', 'echelon-so'),
                    )
                ),
                'hidden' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Hidden', 'echelon-so'),
                    'options' => array(
                        '1' => __('True', 'echelon-so'),
                        '0' => __('False', 'echelon-so'),
                    ),
                    'state_handler' => array(
                        'template[default]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
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
        return $echelon_so_teasers->teaser('eso-video');
    }

}

siteorigin_widget_register('echelonso-eso-video', __FILE__, 'EchelonSOEsoVideo');
