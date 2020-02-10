<div class="eso-pricing uk-position-relative uk-text-center">

    <?php if ( !empty($label) ) : ?>
        <span class="uk-label uk-position-top-right uk-position-small <?php echo esc_attr(implode(' ', $label_class)); ?>"><?php echo esc_html($label); ?></span>
    <?php endif; ?>

    <div class="eso-pricing-inner uk-padding <?php echo esc_attr(implode(' ', $inner_class)); ?>">

        <div class="uk-margin-bottom <?php echo esc_attr(implode(' ', $title_class)); ?>">
            <?php echo $title; ?>
        </div>

        <div class="uk-margin-bottom uk-flex uk-flex-middle uk-flex-center <?php echo esc_attr(implode(' ', $price_class)); ?>">
            <div class="uk-margin-micro-right <?php echo esc_attr(implode(' ', $symbol_class)); ?>"><?php echo $symbol; ?></div>
            <div class="<?php echo esc_attr(implode(' ', $price_class)); ?>"><?php echo $price; ?></div>
        </div>

        <?php if (!empty($image)) : ?>
            <div class="uk-margin-bottom">
                <img src="<?php echo $image; ?>">
            </div>
        <?php endif; ?>

        <div class="uk-margin-bottom <?php echo esc_attr(implode(' ', $sub_title_class)); ?>">
            <?php echo $sub_title; ?>
        </div>

    </div>

    <a href="<?php echo $link_target; ?>" class="uk-width-1-1 uk-button <?php echo esc_attr(implode(' ', $button_class)); ?>">
        <?php echo esc_html($link_text); ?>
    </a>

</div>
