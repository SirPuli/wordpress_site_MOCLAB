<?php
/*
Widget Name: E: Comment
Description: Comments with images, text and person info.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoComment extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'echelonso-eso-comment',
            __('E: Comment', 'echelon-so'),
            array(
                'description' => __('Comments with images, text and person info.', 'echelon-so' ),
            ),
            array(),
            false,
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_name($instance) {
        return $instance['comment']['template'];
    }

    /**
    * Template Variables
    */

    function get_template_variables($instance, $args) {

        $return = array();

        // content
        $return['name'] = !empty($instance['comment']['name']) ? $instance['comment']['name'] : '';
        $return['company'] = !empty($instance['comment']['company']) ? $instance['comment']['company'] : '';
        $return['comment'] = !empty($instance['comment']['comment']) ? $instance['comment']['comment'] : '';
        $return['rating'] = absint($instance['comment']['rating']);


        // image
        if( ! empty( $instance['comment']['image'] ) ) {
            $size = empty( $instance['comment']['image_size'] ) ? 'full' : $instance['comment']['image_size'];
            $attachment = wp_get_attachment_image_src( $instance['comment']['image'], $size );
            if( !empty( $attachment ) ) {
                $return['image'] = sow_esc_url( $attachment[0] );
            } else {
                $retrun['image'] = false;
            }
        }

        $return['image_class'] = array();
        (empty($instance['modifiers']['image_radius'])) ?: $return['image_class'][] = $instance['modifiers']['image_radius'];

        $return['body_class'] = array();
        (empty($instance['modifiers']['body_size'])) ?: $return['body_class'][] = $instance['modifiers']['body_size'];
        (empty($instance['modifiers']['body_weight'])) ?: $return['body_class'][] = $instance['modifiers']['body_weight'];

        $return['wrap_class'] = array();
        (empty($instance['modifiers']['inverse'])) ?: $return['wrap_class'][] = $instance['modifiers']['inverse'];

        // icon
        $return['icon'] = $instance['comment']['rating_icon'];
        $return['icon_styles'][] = !empty($instance['comment']['rating_color']) ? 'color: ' . $instance['comment']['rating_color'] : 'inherit';

        return $return;
    }

    /**
    * Widget Form
    */

    function get_widget_form() {

        global $echelon_so_modifiers;

        $return['comment'] = array(
            'type' => 'section',
            'label' => __( 'Data' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'template' => array(
                    'type' => 'select',
                    'default' => 'default',
                    'label' => __('Template', 'echelon-so'),
                    'options' => array(
                        'default' => __('Default', 'echelon-so'),
                        'wide' => __('Wide', 'echelon-so'),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'template' )
                    )
                ),
                'image' => array(
                    'type' => 'media',
                    'label' => __( 'Image', 'echelon-so' ),
                    'choose' => __( 'Choose Image', 'echelon-so' ),
                    'update' => __( 'Set Image', 'echelon-so' ),
                    'library' => 'image',
                    'fallback' => false,
                ),
                'image_size' => array(
                    'type' => 'image-size',
                    'label' => __( 'Image Size', 'echelon-so' ),
                ),
                'name' => array(
                    'type' => 'text',
                    'default' => '',
                    'label' => __('Name', 'echelon-so'),
                ),
                'company' => array(
                    'type' => 'text',
                    'default' => '',
                    'label' => __('Company', 'echelon-so'),

                ),
                'comment' => array(
                    'type' => 'textarea',
                    'default' => '',
                    'label' => __('Comment', 'echelon-so'),
                ),
                'rating' => array(
                    'type' => 'slider',
                    'label' => __( 'Rating', 'echelon-so' ),
                    'default' => 5,
                    'min' => 1,
                    'max' => 5,
                    'integer' => true
                ),
                'rating_color' => array(
                    'type' => 'color',
                    'default' => '#252525',
                    'label' => __( 'Rating Color', 'echelon-so' )
                ),
                'rating_icon' => array(
                    'type' => 'icon',
                    'label' => __( 'Rating Icon', 'echelon-so' )
                ),
            )
        );

        $return['modifiers'] = array(
            'type' => 'section',
            'label' => __( 'Modifiers' , 'echelon-so' ),
            'hide' => true,
            'fields' => array(
                'image_radius' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Image Radius', 'echelon-so'),
                    'description' => $echelon_so_modifiers->border_radius(true),
                    'options' => array(
                        '0' => __('-', 'echelon-so'),
                        'uk-border-rounded' => __('Rounded', 'echelon-so'),
                        'uk-border-circle' => __('Circle', 'echelon-so'),
                    )
                ),
                'body_size' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Body Size', 'echelon-so'),
                    'description' => $echelon_so_modifiers->font_size(true),
                    'options' => $echelon_so_modifiers->font_size()
                ),
                'body_weight' => array(
                    'type' => 'select',
                    'default' => '0',
                    'label' => __('Body Weight', 'echelon-so'),
                    'description' => $echelon_so_modifiers->font_weight(true),
                    'options' => $echelon_so_modifiers->font_weight()
                ),
                'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
                    'description' => $echelon_so_modifiers->inverse(true),
					'options' => $echelon_so_modifiers->inverse()
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

siteorigin_widget_register('echelonso-eso-comment', __FILE__, 'EchelonSOEsoComment');
