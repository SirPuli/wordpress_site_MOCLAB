<?php

/*
Widget Name: E: Modal
Description: Overlay content on the page with Popup Modals.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/modal/
*/

class EchelonSOEsoModal extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'echelonso-eso-modal',
            __('E: Modal', 'echelon-so'),
            array(
                'description' => __('Overlay content on the page with Popup Modals.', 'echelon-so' ),
                'help' => __('https://echelonso.com/widgets/modal/', 'echelon-so' ),
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    /*
    * Template Name
    */

    function get_template_name($instance) {
        return 'default';
    }

    /*
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        // content
        $return['content'] = !empty( $instance['modal']['content'] ) ? $instance['modal']['content'] : '';
        $return['id'] = !empty( $instance['modal']['id'] ) ? $instance['modal']['id'] : '';

        $return['video'] = '';
        if ( !empty($instance['modal']['video']) ) {
            $attachment = wp_get_attachment_url( $instance['modal']['video'] );
            if ( !empty( $attachment ) ) {
                $return['video'] = sow_esc_url($attachment);
            }
        }
        // modifiers
        $return['modal_wrap_class'] = array();
        (empty($instance['modifiers']['center'])) ?: $return['modal_wrap_class'][] = 'uk-flex-top';
        (empty($instance['modifiers']['container'])) ?: $return['modal_wrap_class'][] = $instance['modifiers']['container'];

        if ( $instance['modal']['template'] == 'default' ) {
            (empty($instance['modifiers']['full'])) ?: $return['modal_wrap_class'][] = $instance['modifiers']['full'];
        }

        $return['modal_class'] = array();
        (empty($instance['modifiers']['center'])) ?: $return['modal_class'][] = $instance['modifiers']['center'];

        $return['close_class'] = array();
        (empty($instance['modifiers']['close'])) ?: $return['close_class'][] = $instance['modifiers']['close'];
        (empty($instance['modifiers']['full'])) ?: $return['close_class'][] = 'uk-modal-close-full uk-close-large';

        $return['close_wrap_class'] = array();
        (empty($instance['modifiers']['inverse'])) ?: $return['close_wrap_class'][] = $instance['modifiers']['inverse'];

        if ( $instance['modal']['template'] == 'default' ) {
            $return['overflow'] = !empty( $instance['modifiers']['overflow'] ) ? $instance['modifiers']['overflow'] : '';

        }

        if ( $instance['modal']['template'] == 'video' ) {
            $return['atts'] = array();
            (empty($instance['modifiers']['controls'])) ?: $return['atts'][] = 'controls';
            (empty($instance['modifiers']['muted'])) ?: $return['atts'][] = 'muted';
            (empty($instance['modifiers']['loop'])) ?: $return['atts'][] = 'loop';
        }

        return $return;
    }

    /*
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so, $echelon_so_modifiers;

        $option_template_video = 'Video' . $echelon_so->prime_tag();
        $label_video = 'Video' . $echelon_so->prime_tag();

        $return['modal'] = array(
            'type' => 'section',
            'label' => __( 'Data' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'template' => array(
                    'type' => 'select',
                    'default' => 'default',
                    'label' => __('Template', 'echelon-so'),
                    'options' => array(
                        'default' => __('Content', 'echelon-so'),
                        'video' => __($option_template_video, 'echelon-so'),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'template' )
                    )
                ),
                'id' => array(
                    'type' => 'text',
                    'label' => __('Modal ID', 'echelon-so'),
                ),
                'content' => array(
                    'type' => 'builder',
                    'label' => __('Content', 'echelon-so'),
                ),
                'video' => array(
                    'type' => 'media',
                    'label' => __( $label_video, 'echelon-so' ),
                    'choose' => __( 'Choose Video', 'echelon-so' ),
                    'update' => __( 'Set Video', 'echelon-so' ),
                    'library' => 'video',
                    'fallback' => false,
                    'state_handler' => array(
                        'template[video]' => array( 'show' ),
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
                'center' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Center', 'echelon-so'),
                    'description' => __('Display the modal in the center of the screen.', 'echelon-so'),
                    'options' => array(
                        '0' => __('-', 'echelon-so'),
                        'uk-margin-auto-vertical' => __('Center', 'echelon-so'),
                    )
                ),
                'container' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Container', 'echelon-so'),
                    'description' => __('The modals width will be base don your global Container settings.', 'echelon-so'),
                    'options' => array(
                        '0' => __('-', 'echelon-so'),
                        'uk-modal-container' => __('Container', 'echelon-so'),
                    )
                ),
                'close' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Close', 'echelon-so'),
                    'description' => __('Position the close icon inside or outside the modal.', 'echelon-so'),
                    'options' => array(
                        'uk-modal-close-default' => __('Inside', 'echelon-so'),
                        'uk-modal-close-outside' => __('Outside', 'echelon-so'),
                    )
                ),
                'overflow' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Overflow', 'echelon-so'),
                    'description' => __('The modal content will overflow the modal instead of the screen.', 'echelon-so'),
                    'options' => array(
                        '0' => __('-', 'echelon-so'),
                        'uk-overflow-auto' => __('Auto', 'echelon-so'),
                    ),
                    'state_handler' => array(
                        'template[default]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'full' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Full', 'echelon-so'),
                    'description' => __('The modal will occupy the full width and height of the screen.', 'echelon-so'),
                    'options' => array(
                        '0' => __('-', 'echelon-so'),
                        'uk-modal-full' => __('Full', 'echelon-so'),
                    ),
                    'state_handler' => array(
                        'template[default]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'inverse' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Inverse', 'echelon-so'),
                    'description' => __('Apply inverse to the close icon.', 'echelon-so'),
                    'options' => $echelon_so_modifiers->inverse()
                ),
                'controls' => array(
                    'type' => 'select',
                    'default' => '1',
                    'label' => __('Video Controls', 'echelon-so'),
                    'description' => __('Enable or disable video controls.', 'echelon-so'),
                    'options' => array(
                        '1' => __('True', 'echelon-so'),
                        '0' => __('False', 'echelon-so'),
                    ),
                    'state_handler' => array(
                        'template[video]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'muted' => array(
                    'type' => 'select',
                    'default' => '1',
                    'label' => __('Video Muted', 'echelon-so'),
                    'description' => __('The video will be muted.', 'echelon-so'),
                    'options' => array(
                        '1' => __('True', 'echelon-so'),
                        '0' => __('False', 'echelon-so'),
                    ),
                    'state_handler' => array(
                        'template[video]' => array( 'show' ),
                        '_else[template]' => array( 'hide' ),
                    )
                ),
                'loop' => array(
                    'type' => 'select',
                    'default' => '1',
                    'label' => __('Video Loop', 'echelon-so'),
                    'description' => __('The video will be looped.', 'echelon-so'),
                    'options' => array(
                        '1' => __('True', 'echelon-so'),
                        '0' => __('False', 'echelon-so'),
                    ),
                    'state_handler' => array(
                        'template[video]' => array( 'show' ),
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
        return $echelon_so_teasers->teaser('eso-modal');
    }

}

siteorigin_widget_register('echelonso-eso-modal', __FILE__, 'EchelonSOEsoModal');
