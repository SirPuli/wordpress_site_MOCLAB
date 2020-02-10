<div class="eso-feature eso-feature-large uk-position-relative <?php echo esc_attr(implode(' ', $feature_class)); ?>">

    <div class="<?php echo esc_attr(implode(' ', $icon_class_large)); ?>">
        <?php echo siteorigin_widget_get_icon($icon, $icon_styles); ?>
    </div>

    <div class="<?php echo esc_attr(implode(' ', $title_class)); ?>">
        <?php echo esc_html($title); ?>
    </div>

    <div class="<?php echo esc_attr(implode(' ', $body_class)); ?>">
        <?php echo esc_html($body); ?>
    </div>

    <?php if (!empty($link_target) && !empty($link_text) ) : ?>
        <div>
            <a class="uk-button uk-button-small uk-button-text" href="<?php echo $link_target; ?>"><?php echo $link_text; ?></a>
        </div>
    <?php endif; ?>

</div>
