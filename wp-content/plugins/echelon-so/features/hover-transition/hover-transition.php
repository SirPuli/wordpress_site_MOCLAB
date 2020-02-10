<?php

if (!class_exists('EchelonSOHoverTransition')) {

    class EchelonSOHoverTransition {

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

            $name = 'Hover Transition' . $echelon_so->prime_tag();

            $groups['echelonso_hover_transition_group'] = array(
                'name'     => __( $name, 'echelon-so' ),
                'priority' => 9040
            );

            return $groups;
        }

        /**
        * Add the Style Fields
        */

        public function general_style_fields($fields) {

            global $echelon_so_modifiers, $echelon_so;

            $fields['echelonso_hover_transition'] = array(
                'name'        => __( 'Transition', 'echelon-so' ),
                'description' => __( 'When the element is hovered this transition will be toggle on / off (exclusive from Child Toggle). Learn more about Hover Transitions <a target="_blank" href="https://echelonso.com/features/hover-transition/">here</a>.', 'echelon-so' ) . $echelon_so->prime_link(),
                'type'        => 'select',
                'group'       => 'echelonso_hover_transition_group',
                'priority'    => 1,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->transition()
            );

            $fields['echelonso_hover_transition_transparent'] = array(
                'name'        => __( 'Transparent', 'echelon-so' ),
                'description' => __( 'The element will be transparent until hovered (exclusive from Child Toggle).', 'echelon-so' ),
                'type'        => 'checkbox',
                'group'       => 'echelonso_hover_transition_group',
                'priority'    => 2,
                'default'     => false,
            );

            $fields['echelonso_hover_transition_toggle'] = array(
                'name'        => __( 'Child Toggle', 'echelon-so' ),
                'description' => __( 'Toggle transitions on this elements children (exclusive from Transition & Transparent).', 'echelon-so' ),
                'type'        => 'checkbox',
                'group'       => 'echelonso_hover_transition_group',
                'priority'    => 3,
                'default'     => false,
            );

            return $fields;
        }

    }

    $class = new EchelonSOHoverTransition();

}
