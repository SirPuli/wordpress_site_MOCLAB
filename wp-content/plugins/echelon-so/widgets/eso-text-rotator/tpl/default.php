<div class="<?php echo esc_attr(implode(' ', $text_class)); ?>">
    <?php echo esc_html($before); ?> <span style="color: <?php echo esc_attr($inner_color); ?>; white-space: nowrap;" id="<?php echo $int_id; ?>"><?php echo esc_html(implode('|', $words)); ?></span> <?php echo esc_html($after); ?>
</div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {
        $("#<?php echo $int_id; ?>").textrotator({
            animation: "<?php echo esc_attr($effect) ;?>",
            separator: "|",
            speed: <?php echo $speed ;?>
        });
    })
})(jQuery)
</script>
