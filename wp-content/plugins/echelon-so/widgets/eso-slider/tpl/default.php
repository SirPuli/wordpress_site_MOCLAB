<?php if ( !empty($frames)) : ?>

    <div uk-slider="autoplay: <?php echo esc_attr($autoplay); ?>; autoplay-interval: <?php echo esc_attr($autoplay_interval); ?>; clsActivated: <?php echo esc_attr($transition); ?>" tabindex="-1">

        <div class="uk-position-relative <?php echo esc_attr(implode(' ', $nav_wrap_class)); ?>">

            <div <?php echo $lightbox; ?> class="uk-slider-container">

                <div class="uk-slider-items uk-grid <?php echo esc_attr(implode(' ', $items_class)); ?>">
                    <?php foreach ($frames as $k => $v) : ?>
                        <div>
                            <?php
                            if( function_exists( 'siteorigin_panels_render' ) ) {
                                $content_builder_id = substr( md5( json_encode( $v['content'] ) ), 0, 8 );
                                echo siteorigin_panels_render( 'w'.$content_builder_id, true, $v['content'] );
                            }
                            ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <?php if ( !empty($show_nav) ) : ?>
                <div class="<?php echo esc_attr(implode(' ', $nav_class)); ?> uk-slidenav-container">
                    <a class="<?php echo esc_attr(implode(' ', $nav_left_class)); ?> uk-slidenav uk-position-small uk-hidden-hover uk-hidden-touch" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="<?php echo esc_attr(implode(' ', $nav_right_class)); ?> uk-slidenav uk-position-small uk-hidden-hover uk-hidden-touch" href="#" uk-slidenav-next uk-slider-item="next"></a>
                </div>
            <?php endif; ?>

        </div>

        <?php if ( !empty($show_dot) ) : ?>
            <div class="uk-margin-medium-top <?php echo esc_attr(implode(' ', $dot_class)); ?>">
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
            </div>
        <?php endif; ?>

    </div>

<?php endif; ?>
