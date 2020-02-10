<?php

if (!class_exists('EchelonSOCustomPalette')) {
    
    class EchelonSOCustomPalette {
        
        public function __construct() {
            add_action( 'admin_footer', array($this, 'admin_footer'));
        }
        
        public function admin_footer() {
            global $echelon_so;
            $palette = json_encode(array_values($echelon_so->get_palette_colors()));
            ?>
            <?php if ( wp_script_is( 'wp-color-picker', 'enqueued' ) ) : ?>
                <script type="text/javascript">
                (function($) {
                    $(document).ready(function() {
                        $.wp.wpColorPicker.prototype.options = {
                            width: 240,
                            mode: 'hsv',
                            palettes: <?php echo $palette; ?>,
                            hide: true
                        };
                    });
                })(jQuery)
                </script>
            <?php endif; ?>
            <?php
        }
        
    }
    $class = new EchelonSOCustomPalette();
}
