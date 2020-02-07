<a class="uk-inline-clip uk-transition-toggle uk-position-relative uk-display-block uk-width-1-1 <?php echo esc_attr(implode(' ', $wrapper_class)); ?>" href="<?php echo $image_display; ?>" style="background-image: url('<?php echo $background_url; ?>'); background-size: cover; background-position: 50%;" data-caption="<?php echo esc_attr($title); ?>">

    <?php if ( empty($background_url)) : ?>

        <img class="uk-float-left uk-transition-opaque <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image_thumb; ?>">

    <?php endif; ?>

    <div class="uk-text-emphasis uk-position-center uk-transition-fade <?php echo esc_attr(implode(' ', $icon_class)); ?>" tabindex="0">
        <span uk-overlay-icon></span>
    </div>

</a>
