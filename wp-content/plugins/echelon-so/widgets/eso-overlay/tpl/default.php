<div class="uk-position-relative uk-inline-clip uk-width-1-1 <?php echo esc_attr(implode(' ', $wrap_class)); ?>">

    <div class="uk-transition-opaque <?php echo esc_attr(implode(' ', $content_class)); ?>">

        <?php
        if ( function_exists( 'siteorigin_panels_render' ) ) {
            $content_builder_id = substr( md5( json_encode( $content ) ), 0, 8 );
            echo siteorigin_panels_render( 'w'.$content_builder_id, true, $content );
        }
        ?>
    </div>

    <div class="uk-overlay <?php echo esc_attr(implode(' ', $overlay_class)); ?>">
        <?php
        if ( function_exists( 'siteorigin_panels_render' ) ) {
            $content_builder_id = substr( md5( json_encode( $overlay_content ) ), 0, 8 );
            echo siteorigin_panels_render( 'w'.$content_builder_id, true, $overlay_content );
        }
        ?>
    </div>

</div>
