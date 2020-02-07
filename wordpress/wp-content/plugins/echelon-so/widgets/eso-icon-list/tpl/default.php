<?php if (!empty($list_items)) : ?>

    <div class="eso-icon-list uk-margin-remove-last-child <?php echo esc_attr(implode(' ', $wrap_class)); ?>">

        <?php foreach ($list_items as $k => $v) : ?>

            <div class="uk-flex uk-flex-middle uk-flex-left uk-margin-small-bottom">

                <div class="uk-width-auto uk-margin-small-right uk-text-center">
                    <?php
                    $icon_styles['color'] = 'color: ' . $v['icon_color'];
                    $icon_styles['size'] = 'font-size: ' . $icon_size;
                    $icon_styles['width'] = 'width: 1.25em;';
                    echo siteorigin_widget_get_icon($v['icon'], $icon_styles);
                    ?>
                </div>

                <div class="uk-width-expand <?php echo esc_attr(implode(' ', $text_class)); ?>" style="color: <?php echo esc_attr($v['text_color']); ?>;">
                    <?php if (!empty($v['link'])) : ?>
                        <a href="<?php echo sow_esc_url($v['link']); ?>">
                        <?php endif; ?>
                        <?php echo esc_html($v['text']); ?>
                        <?php if (!empty($v['link'])) : ?>
                        </a>
                    <?php endif; ?>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>
