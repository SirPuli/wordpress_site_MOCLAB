<div class="<?php echo esc_attr(implode(' ', $text_class)); ?>">
    <?php if ($link) : ?>
        <a href="<?php echo get_permalink(); ?>">
        <?php endif; ?>
        <?php wp_kses_post(the_field($fo['key'], $fo['source'])); ?>
        <?php if ($link) : ?>
        </a>
    <?php endif; ?>
</div>
