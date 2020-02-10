<?php


if (!class_exists('EchelonSOParallax')) {

    class EchelonSOParallax {

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

            $name = 'Parallax' . $echelon_so->prime_tag();

            $groups['echelonso_parallax_group'] = array(
                'name'     => __( $name, 'echelon-so' ),
                'priority' => 9050
            );

            return $groups;
        }

        /**
        * Add the Style Fields
        */

        public function general_style_fields($fields) {

            global $echelon_so;

            $fields['echelonso_parallax_viewport'] = array(
                'name'        => __( 'Viewport', 'echelon-so' ),
                'description' => __( 'The scroll position in the viewport when to arrive at the end value. A number between 0 - 1 with 0.5 being halfway.', 'echelon-so' ) . $echelon_so->prime_link(),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 100,
            );

            $fields['echelonso_parallax_media'] = array(
                'name'        => __( 'Responsive', 'echelon-so' ),
                'description' => __( 'Only apply Parallax on this screen and larger.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 100,
                'default'    => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    's' => __('Small', 'echelon-so'),
                    'm' => __('Medium', 'echelon-so'),
                    'l' => __('Large', 'echelon-so'),
                    'xl' => __('Extra Large', 'echelon-so'),
                ),
            );

            // option 1

            $fields['echelonso_parallax_option_1'] = array(
                'name'        => __( 'Option 1', 'echelon-so' ),
                'description' => __( 'Information on using Parallax Options is available <a target="_blank" href="https://echelonso.com/features/parallax/">here</a>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 1000,
                'default'     => '0',
                'options'   => array(
                    '0'         => __('-', 'echelon-so'),
                    'x'         => __('Translate X (px)', 'echelon-so'),
                    'y'         => __('Translate Y (px)', 'echelon-so'),
                    'bgx'       => __('Background X (px)', 'echelon-so'),
                    'bgy'       => __('Background Y (px)', 'echelon-so'),
                    'rotate'    => __('Rotate (deg)', 'echelon-so'),
                    'scale'     => __('Scale (float)', 'echelon-so'),
                    'opacity'   => __('Opacity (float)', 'echelon-so'),
                    'blur'      => __('Blur (px)', 'echelon-so'),
                    'grayscale' => __('Greyscale (%)', 'echelon-so'),
                )
            );

            $fields['echelonso_parallax_option_1_start'] = array(
                'name'        => __( 'Option 1 Start Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 1100,
            );

            $fields['echelonso_parallax_option_1_end'] = array(
                'name'        => __( 'Option 1 End Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 1200,
            );

            // option 2

            $fields['echelonso_parallax_option_2'] = array(
                'name'        => __( 'Option 2', 'echelon-so' ),
                'description' => __( 'Information on using Parallax Options is available <a target="_blank" href="https://echelonso.com/features/parallax/">here</a>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 2000,
                'default'     => '0',
                'options'   => array(
                    '0'         => __('-', 'echelon-so'),
                    'x'         => __('Translate X (px)', 'echelon-so'),
                    'y'         => __('Translate Y (px)', 'echelon-so'),
                    'bgx'       => __('Background X (px)', 'echelon-so'),
                    'bgy'       => __('Background Y (px)', 'echelon-so'),
                    'rotate'    => __('Rotate (deg)', 'echelon-so'),
                    'scale'     => __('Scale (float)', 'echelon-so'),
                    'opacity'   => __('Opacity (float)', 'echelon-so'),
                    'blur'      => __('Blur (px)', 'echelon-so'),
                    'grayscale' => __('Greyscale (%)', 'echelon-so'),
                )
            );

            $fields['echelonso_parallax_option_2_start'] = array(
                'name'        => __( 'Option 2 Start Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 2100,
            );

            $fields['echelonso_parallax_option_2_end'] = array(
                'name'        => __( 'Option 2 End Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 2200,
            );

            // option 3

            $fields['echelonso_parallax_option_3'] = array(
                'name'        => __( 'Option 3', 'echelon-so' ),
                'description' => __( 'Information on using Parallax Options is available <a target="_blank" href="https://echelonso.com/features/parallax/">here</a>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 3000,
                'default'     => '0',
                'options'   => array(
                    '0'         => __('-', 'echelon-so'),
                    'x'         => __('Translate X (px)', 'echelon-so'),
                    'y'         => __('Translate Y (px)', 'echelon-so'),
                    'bgx'       => __('Background X (px)', 'echelon-so'),
                    'bgy'       => __('Background Y (px)', 'echelon-so'),
                    'rotate'    => __('Rotate (deg)', 'echelon-so'),
                    'scale'     => __('Scale (float)', 'echelon-so'),
                    'opacity'   => __('Opacity (float)', 'echelon-so'),
                    'blur'      => __('Blur (px)', 'echelon-so'),
                    'grayscale' => __('Greyscale (%)', 'echelon-so'),
                )
            );

            $fields['echelonso_parallax_option_3_start'] = array(
                'name'        => __( 'Option 3 Start Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 3100,
            );

            $fields['echelonso_parallax_option_3_end'] = array(
                'name'        => __( 'Option 3 End Value', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_parallax_group',
                'priority'    => 3200,
            );

            return $fields;

        }

    }

    $class = new EchelonSOParallax();

}
