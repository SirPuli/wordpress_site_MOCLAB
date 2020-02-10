<?php

if (!class_exists('EchelonSOLinkedWidgets')) {

    class EchelonSOLinkedWidgets {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }

        /*
        *	Plugins Loaded
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_widget_style_fields', array($this, 'widget_style_fields') );
            add_filter( 'siteorigin_panels_widget_style_attributes', array( $this, 'widget_style_attributes' ), 10, 2 );
        }


        /*
        *	General Style Fields
        */

        public function widget_style_fields($fields) {

            global $echelon_so;

            $fields['echelonso_linked_widgets'] = array(
                'name'        => __('Widget Link', 'echelon-prime'),
                'type'        => 'text',
                'group'       => 'attributes',
                'priority'    => 900,
                'description' =>__('Link to a URL, Post ID, SiteOrigin Syntax or {loop}.', 'echelon-so') . $echelon_so->prime_link()
            );
            return $fields;
        }

        /*
        *	Add the Style Fields
        */

        public function widget_style_attributes( $attributes, $style ) {
            if ( !empty($style['echelonso_linked_widgets']) ) {
                if (filter_var($style['echelonso_linked_widgets'], FILTER_VALIDATE_URL) === FALSE) {
                    if ( is_numeric($style['echelonso_linked_widgets']) ) {
                        $attributes['data-echelonso_linked_widgets'] = apply_filters('eso_linked_widgets', $style['echelonso_linked_widgets']);
                    } else {
                        $attributes['data-echelonso_linked_widgets'] = apply_filters('eso_linked_widgets_sow', $style['echelonso_linked_widgets']);
                    }
                } else {
                    $attributes['data-echelonso_linked_widgets'] = esc_url($style['echelonso_linked_widgets']);
                }
            }
            return $attributes;
        }
    }

    $echelon_so_linked_widgets = new EchelonSOLinkedWidgets();

}
