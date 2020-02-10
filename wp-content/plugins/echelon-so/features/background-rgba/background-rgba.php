<?php

if (!class_exists('EchelonSOBackgroundRgba')) {

    class EchelonSOBackgroundRgba {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }

        /*
        *	Plugins Loaded
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_general_style_fields', array($this, 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array( $this, 'general_style_attributes' ), 10, 2 );
            add_action( 'admin_print_footer_scripts', array($this, 'admin_footer_js'));
        }


        /*
        *	General Style Fields
        */

        public function general_style_fields($fields) {
            $fields['echelonso_background_rgba'] = array(
                'name'        => __('Background Colour (rgba)', 'echelon-prime'),
                'type'        => 'text',
                'group'       => 'design',
                'priority'    => 2,
                'description' => __('Background color of the widget. Learn more about transparent backgrounds <a target="_blank" href="https://echelonso.com/features/background-rgba/">here</a>.', 'echelon-so')
            );
            return $fields;
        }

        /*
        *	Add the Style Fields
        */

        public function general_style_attributes( $attributes, $style ) {
            if ( !empty($style['echelonso_background_rgba']) ) {
                $attributes['style'] = $attributes['style'] . 'background-color: ' . $style['echelonso_background_rgba'] . ';';
            }
            return $attributes;
        }

        public function admin_footer_js() {
            global $echelon_so;
            $palette = $echelon_so->get_palette_colors();
            $palette = implode('|', $palette);
            ?>
            <script type="text/javascript">
            (function($) {

                $(document).ajaxComplete(function() {

                    $("[name='style[echelonso_background_rgba]']").each(function(k,v) {
                        if (!$(v).hasClass('cprgba')) {
                            $(v).addClass('cprgba').attr('data-palette', '<?php echo $palette; ?>').alphaColorPicker();
                        }
                    })

                });

            })(jQuery)
            </script>
            <?php
        }
    }
    $class = new EchelonSOBackgroundRgba();
}
