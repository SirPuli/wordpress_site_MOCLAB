<div class="<?php echo esc_attr(implode(' ', $text_class)); ?>">
    <a href="<?php echo esc_url(get_field($fo['key'], $fo['source'])['url']); ?>">
        <?php echo esc_html($instance['template']['file']['linked_text']); ?>
    </a>
</div>
