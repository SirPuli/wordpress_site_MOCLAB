<div class="uk-card <?php echo esc_attr(implode(' ', $card_class)); ?>">

    <div class="uk-card-header">
        <div class="uk-margin-remove-bottom <?php echo esc_attr(implode(' ', $title_class)); ?>">
            <?php echo esc_html($title); ?>
        </div>
        <div class="uk-text-meta uk-margin-remove-top <?php echo esc_attr(implode(' ', $sub_title_class)); ?>">
            <?php echo esc_html($sub_title); ?>
        </div>
    </div>

    <div class="uk-card-body">
        <div class="<?php echo esc_attr(implode(' ', $body_class)); ?>">
            <?php echo esc_html($body); ?>
        </div>
    </div>

    <?php if (!empty($link_text) && !empty($link_target)) : ?>
        <div class="uk-card-footer">
            <a href="<?php echo $link_target; ?>" class="uk-button uk-button-text"><?php echo esc_html($link_text); ?></a>
        </div>
    <?php endif; ?>

</div>
