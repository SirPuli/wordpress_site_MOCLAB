<?php

if (!class_exists('EchelonSOSticky')) {

    class EchelonSOSticky {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }

        /*
        *	Get things started
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_widget_style_fields', array($this, 'widget_style_fields') );
            add_filter( 'siteorigin_panels_widget_style_attributes', array( $this, 'widget_style_attributes' ), 10, 2 );
        }

        /*
        * Add the Style Fields
        */

        public function widget_style_fields($fields) {

            $fields['echelonso_sticky_widget'] = array(
                'name'        => __( 'Sticky', 'echelon-so' ),
                'type'        => 'checkbox',
                'group'       => 'layout',
                'description' => __( 'Stick this widget to its parent cell. Learn more about Sticky <a target="_blank" href="https://echelonso.com/features/sticky/">here</a>.', 'echelon-so' ),
                'priority'    => 100,
                'default'     => false,
            );

            $fields['echelonso_sticky_widget_offset'] = array(
                'name'        => __( 'Sticky Offset (px)', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'layout',
                'description' => __( 'Offset the stick in pixels. E.g 100', 'echelon-so' ),
                'priority'    => 200,
            );

            return $fields;
        }

        /*
        * Add the Attributes
        */

        public function widget_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_sticky_widget']) ) {

                $attributes['uk-sticky'] = 'bottom: !.panel-grid;';

                if ( !empty($style['echelonso_sticky_widget_offset'] ) ) {
                    $attributes['uk-sticky'] .= 'offset:' . intval($style['echelonso_sticky_widget_offset']) . ';';
                    $attributes['class'][] = 'uk-position-z-index';
                }

            }

            return $attributes;
        }

    }

    $class = new EchelonSOSticky();

}
