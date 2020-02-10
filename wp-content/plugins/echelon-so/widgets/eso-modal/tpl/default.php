<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr(implode(' ', $modal_wrap_class)); ?>" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-padding-remove <?php echo esc_attr(implode(' ', $modal_class)); ?>" <?php echo esc_attr($overflow); ?>>
        <?php
        if (function_exists('siteorigin_panels_render')) {
            $content_builder_id = substr( md5( json_encode( $content ) ), 0, 8 );
            echo siteorigin_panels_render( 'w'.$content_builder_id, true, $content );
        }
        ?>
        <div class="<?php echo esc_attr(implode(' ', $close_wrap_class)); ?>">
            <a class="<?php echo esc_attr(implode(' ', $close_class)); ?>" type="button" uk-close></a>
        </div>
    </div>
</div>
