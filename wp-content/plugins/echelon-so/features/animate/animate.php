<?php

if (!class_exists('EchelonSOAnimate')) {

    class EchelonSOAnimate {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }

        /*
        *	Setup the form fields
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_widget_style_groups', array($this, 'widget_style_groups') );
            add_filter( 'siteorigin_panels_widget_style_fields', array($this, 'widget_style_fields') );
            add_filter( 'siteorigin_panels_widget_style_attributes', array( $this, 'widget_style_attributes' ), 10, 2 );
            add_filter( 'siteorigin_panels_row_style_groups', array($this, 'row_style_groups') );
            add_filter( 'siteorigin_panels_row_style_fields', array($this, 'row_style_fields') );
            add_filter( 'siteorigin_panels_cell_style_groups', array($this, 'row_style_groups') );
            add_filter( 'siteorigin_panels_cell_style_fields', array($this, 'row_style_fields') );
        }

        /*
        * Add the Style Group
        */

        public function widget_style_groups($groups) {

            $groups['echelonso_animate_group'] = array(
                'name'     => __( 'Animate', 'echelon-so' ),
                'priority' => 9000
            );

            return $groups;
        }

        public function row_style_groups($groups) {

            global $echelon_so;

            $groups['echelonso_animate_group'] = array(
                'name'     => __( 'Animate', 'echelon-so' ) . $echelon_so->prime_tag(),
                'priority' => 9000
            );

            return $groups;
        }

        /*
        *	Add the Style Fields
        */

        public function widget_style_fields($fields) {

            global $echelon_so_modifiers;

            $fields['echelonso_animate_effect'] = array(
                'name'        => __( 'Effect', 'echelon-so' ),
                'description' => __( 'Choose the effect for this widget. Learn more about using animate <a target="_blank" href="https://echelonso.com/features/animate/">here</a>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 100,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->animation()
            );

            $fields['echelonso_animate_effect_origin'] = array(
                'name'        => __( 'Origin', 'echelon-so' ),
                'description' => __( 'Adjust the effect origin from the default (Center).', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 200,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-transform-origin-top-left' => __('Top Left', 'echelon-so'),
                    'uk-transform-origin-top-center' => __('Top Center', 'echelon-so'),
                    'uk-transform-origin-top-right' => __('Top Right', 'echelon-so'),
                    'uk-transform-origin-center-left' => __('Center Left', 'echelon-so'),
                    'uk-transform-origin-center-right' => __('Center Right', 'echelon-so'),
                    'uk-transform-origin-bottom-left' => __('Bottom Left', 'echelon-so'),
                    'uk-transform-origin-bottom-center' => __('Bottom Center', 'echelon-so'),
                    'uk-transform-origin-bottom-right' => __('Bottom Right', 'echelon-so')
                )
            );

            $fields['echelonso_animate_offset'] = array(
                'name'        => __( 'Offset (px)', 'echelon-so' ),
                'description' => __( 'How far from the bottom of the screen before the animation triggers. E.g 300.', 'echelon-so'),
                'type'        => 'text',
                'group'       => 'echelonso_animate_group',
                'priority'    => 300,
                'default'     => '',
            );

            return $fields;
        }

        public function row_style_fields($fields) {

            global $echelon_so, $echelon_so_modifiers;

            $fields['echelonso_animate_effect'] = array(
                'name'        => __( 'Effect', 'echelon-so' ),
                'description' => __( 'Choose the effect for each widget in the row or cell. Learn more about using animate <a target="_blank" href="https://echelonso.com/features/animate/">here</a>.', 'echelon-so' ) . $echelon_so->prime_link(),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 100,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->animation()
            );

            $fields['echelonso_animate_effect_origin'] = array(
                'name'        => __( 'Origin', 'echelon-so' ),
                'description' => __( 'Adjust the effect origin from the default (Center).', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_animate_group',
                'priority'    => 200,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-transform-origin-top-left' => __('Top Left', 'echelon-so'),
                    'uk-transform-origin-top-center' => __('Top Center', 'echelon-so'),
                    'uk-transform-origin-top-right' => __('Top Right', 'echelon-so'),
                    'uk-transform-origin-center-left' => __('Center Left', 'echelon-so'),
                    'uk-transform-origin-center-right' => __('Center Right', 'echelon-so'),
                    'uk-transform-origin-bottom-left' => __('Bottom Left', 'echelon-so'),
                    'uk-transform-origin-bottom-center' => __('Bottom Center', 'echelon-so'),
                    'uk-transform-origin-bottom-right' => __('Bottom Right', 'echelon-so')
                )
            );

            $fields['echelonso_animate_offset'] = array(
                'name'        => __( 'Offset (px)', 'echelon-so' ),
                'description' => __( 'How far from the bottom of the screen before the animation triggers. E.g 300.', 'echelon-so'),
                'type'        => 'text',
                'group'       => 'echelonso_animate_group',
                'priority'    => 300,
                'default'     => '',
            );

            $fields['echelonso_animate_delay'] = array(
                'name'        => __( 'Delay', 'echelon-so' ),
                'description' => __( 'The time in milliseconds between each animation. E.g 500.', 'echelon-so'),
                'type'        => 'text',
                'group'       => 'echelonso_animate_group',
                'priority'    => 350,
                'default'     => '',
            );

            $fields['echelonso_animate_hover_toggle'] = array(
                'name'        => __( 'Hover Toggle', 'echelon-so' ),
                'description' => __( 'Toggle animations on the rows widgets when hovered.', 'echelon-so'),
                'type'        => 'checkbox',
                'group'       => 'echelonso_animate_group',
                'priority'    => 400,
                'default'     => '',
            );

            return $fields;
        }

        /*
        * Add the Attributes
        */

        public function widget_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_animate_effect']) ) {

                $attributes['tabindex'] = '0';
                $attributes['class'][] = 'eso-animate-hidden-widget';

                $attributes['uk-scrollspy'] = 'cls: eso-animate-visible-widget ' . $style['echelonso_animate_effect'] . ';';

                if ( !empty($style['echelonso_animate_offset'] ) ) {
                    $attributes['uk-scrollspy'] .= 'offset-top: -' . absint($style['echelonso_animate_offset']) . '; delay: 10;';
                }

            }

            return $attributes;
        }

    }

    $class = new EchelonSOAnimate();

}
