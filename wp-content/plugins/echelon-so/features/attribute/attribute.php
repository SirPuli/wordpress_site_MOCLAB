<?php


if (!class_exists('EchelonSOAttribute')) {

    class EchelonSOAttribute {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }


        /**
        *	Plugins Loaded
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_general_style_fields', array($this, 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array( $this, 'general_style_attributes' ), 10, 2 );
        }

        /**
        * Add the Style Fields
        */

        public function general_style_fields($fields) {

            $fields['echelonso_attribute_key'] = array(
                'name'        => __( 'Attribute Key', 'echelon-so' ),
                'description' => __( 'Adds the key portion to  the elemets attributes [key]="[value]". Learn more about using attributes <a target="_blank" href="https://echelonso.com/features/attribute/">here</a>.', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'attributes',
                'priority'    => 1000,
                'default'     => ''
            );

            $fields['echelonso_attribute_value'] = array(
                'name'        => __( 'Attribute Value', 'echelon-so' ),
                'description' => __( 'Adds the elements attribute value (key required).', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'attributes',
                'priority'    => 1100,
                'default'     => ''
            );

            return $fields;

        }

        /**
        * Add the Attributes
        */

        public function general_style_attributes( $attributes, $style ) {

            if ( !empty($style['echelonso_attribute_key']) && !empty($style['echelonso_attribute_value']) ) {
                $attributes[$style['echelonso_attribute_key']] = $style['echelonso_attribute_value'];
            }

            return $attributes;
        }

    }

    $class = new EchelonSOAttribute();

}
