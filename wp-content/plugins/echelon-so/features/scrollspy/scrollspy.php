<?php


if (!class_exists('EchelonSOScrollspy')) {

    class EchelonSOScrollspy {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }


        /**
        *	Plugins Loaded
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_general_style_groups', array($this, 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array($this, 'general_style_fields') );
        }

        /**
        * Add the Style Group
        */

        public function general_style_groups($groups) {

            global $echelon_so;

            $name = 'Scrollspy' . $echelon_so->prime_tag();

            $groups['echelonso_scrollspy_group'] = array(
                'name'     => __( $name, 'echelon-so' ),
                'priority' => 9065
            );

            return $groups;
        }

        /**
        * Add the Style Fields
        */

        public function general_style_fields($fields) {

            global $echelon_so;

            $fields['echelonso_scrollspy_class'] = array(
                'name'        => __( 'Class', 'echelon-so' ),
                'description' => __( 'The classes to toggle when the element enters / leaves the viewport. Learn more about using Scrollspy <a target="_blank" href="https://echelonso.com/features/scrollspy/">here</a>.', 'echelon-so' ) . $echelon_so->prime_link(),
                'type'        => 'text',
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 10,
            );

            $fields['echelonso_scrollspy_hidden'] = array(
                'name'        => __( 'Hidden', 'echelon-so' ),
                'description' => __( 'Hides the element while out of view.', 'echelon-so' ),
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 20,
            );

            $fields['echelonso_scrollspy_offset_top'] = array(
                'name'        => __( 'Offset Top (px)', 'echelon-so' ),
                'description' => __( 'How far into the viewport before the classes are toggled. E.g -200', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 30,
            );

            $fields['echelonso_scrollspy_repeat'] = array(
                'name'        => __( 'Repeat', 'echelon-so' ),
                'description' => __( 'Add classes when in and remove classes when out of view.', 'echelon-so' ),
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 40,
            );

            $fields['echelonso_scrollspy_delay'] = array(
                'name'        => __( 'Delay', 'echelon-so' ),
                'description' => __( 'A delay in milliseconds before the clsasses are added. E.g 1000', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_scrollspy_group',
                'priority'    => 50,
            );

            return $fields;

        }

    }

    $class = new EchelonSOScrollspy();

}
