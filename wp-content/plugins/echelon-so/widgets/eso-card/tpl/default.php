<div class="uk-card <?php echo esc_attr(implode(' ', $card_class)); ?>">

    <div class="uk-card-body">

        <?php if (!empty($title)) : ?>
            <div class="<?php echo esc_attr(implode(' ', $title_class)); ?>">
                <?php echo esc_html($title); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($body)) : ?>
            <div class="uk-margin-small-top <?php echo esc_attr(implode(' ', $body_class)); ?>">
                <?php echo esc_html($body); ?>
            </div>
        <?php endif; ?>

    </div>

    <?php if (!empty($link_text) && !empty($link_target)) : ?>
        <div class="uk-card-footer <?php echo esc_attr(implode(' ', $body_class)); ?>">
            <a href="<?php echo $link_target; ?>" class="uk-button uk-button-text"><?php echo esc_html($link_text); ?></a>
        </div>
    <?php endif; ?>

</div>
