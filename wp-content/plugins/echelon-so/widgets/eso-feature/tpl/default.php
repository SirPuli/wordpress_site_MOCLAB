<div class="eso-feature eso-feature-default uk-position-relative <?php echo esc_attr(implode(' ', $feature_class)); ?>">

    <div class="uk-flex uk-flex-top uk-flex-left">

        <?php if ( !empty($icon)) : ?>

            <div class="uk-width-auto <?php echo esc_attr(implode(' ', $icon_class_default)); ?>">
                <?php echo siteorigin_widget_get_icon($icon, $icon_styles); ?>
            </div>

        <?php endif; ?>

        <div class="uk-width-expand">

            <?php if ( !empty($title)) : ?>
                <div class="<?php echo esc_attr(implode(' ', $title_class)); ?>">
                    <?php echo esc_html($title); ?>
                </div>
            <?php endif; ?>

            <div class="<?php echo esc_attr(implode(' ', $body_class)); ?>">
                <?php echo esc_html($body); ?>
            </div>

            <?php if (!empty($link_target)) : ?>
                <div>
                    <a class="uk-button uk-button-small uk-button-text" href="<?php echo $link_target; ?>"><?php echo $link_text; ?></a>
                </div>
            <?php endif; ?>

        </div>

    </div>

</div>
