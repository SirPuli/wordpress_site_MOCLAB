<div class="<?php echo esc_attr(implode(' ', $text_class)); ?>">
<?php
echo esc_html($instance['template']['number']['before_symbol']);
echo number_format(intval(get_field($fo['key'], $fo['source'])), $instance['template']['number']['decimals'], $instance['template']['number']['decimal_point'], $instance['template']['number']['separator']);
echo esc_html($instance['template']['number']['after_symbol']);
?>
</div>
