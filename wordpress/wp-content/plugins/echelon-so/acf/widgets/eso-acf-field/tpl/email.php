<div class="<?php echo esc_attr(implode(' ', $text_class)); ?>">
    <a href="mailto:<?php esc_url(the_field($fo['key'], $fo['source'])); ?>">
        <?php esc_html_e($instance['template']['email']['linked_text']); ?>
    </a>
</div>
