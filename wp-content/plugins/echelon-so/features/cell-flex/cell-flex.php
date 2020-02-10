<?php

if (!class_exists('EchelonSOCellFlex')) {

    class EchelonSOCellFlex {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }

        /*
        *	Plugins Loaded
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_cell_style_fields', array($this, 'cell_style_fields') );
            add_filter( 'siteorigin_panels_cell_style_attributes', array( $this, 'cell_style_attributes' ), 10, 2 );
        }


        /*
        *	Cell Style Fields
        */

        public function cell_style_fields($fields) {

            global $echelon_so_teasers, $echelon_so;

            $fields['echelonso_cell_flex_h'] = array(
                'name'        => __('Flex Horizontal', 'echelon-prime'),
                'description' => $echelon_so_teasers->teaser('des-cell-flex-h') . $echelon_so->prime_link(),
                'type'        => 'select',
                'group'       => 'layout',
                'priority'    => 1000,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-flex-left' => __('Left', 'echelon-so'),
                    'uk-flex-center' => __('Center', 'echelon-so'),
                    'uk-flex-right' => __('Right', 'echelon-so'),
                )
            );

            $fields['echelonso_cell_flex_v'] = array(
                'name'        => __( 'Flex Vertical', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'layout',
                'priority'    => 1100,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-flex-middle' => __('Middle', 'echelon-so'),
                    'uk-flex-top' => __('Top', 'echelon-so'),
                    'uk-flex-bottom' => __('Bottom', 'echelon-so'),
                )
            );

            return apply_filters('eso_cell_flex', $fields);
        }

        /*
        *	Add the Style Fields
        */

        public function cell_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_cell_flex_h']) || !empty($style['echelonso_cell_flex_v'])  ) {
                $attributes['class'][] = 'uk-flex';
                $attributes['class'][] = 'uk-grid';
                $attributes['class'][] = 'uk-grid-collapse';
            }

            if ( !empty($style['echelonso_cell_flex_h']) ) {
                $attributes['class'][] = $style['echelonso_cell_flex_h'];
            }

            if ( !empty($style['echelonso_cell_flex_v']) ) {
                $attributes['class'][] = $style['echelonso_cell_flex_v'];
            }

            return $attributes;
        }
    }
    $class = new EchelonSOCellFlex();
}
