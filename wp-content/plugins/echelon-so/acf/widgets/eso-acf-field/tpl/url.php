<?php

if ( !empty($instance['template']['url']['linked_text']) ) {
    $link_value = esc_html($instance['template']['url']['linked_text']);
} else {
    $link_value = esc_url(get_field($fo['key'], $fo['source']));
}

$link_target = esc_url(get_field($fo['key'], $fo['source']));

?>
<div class="<?php echo esc_attr(implode(' ', $text_class)); ?>">
    <a href="<?php echo $link_target; ?>">
        <?php echo $link_value; ?>
    </a>
</div>
