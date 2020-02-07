<?php

$int_id = 'tw_' . uniqid(rand(1,9999));

if (!empty($instance['steps'])) {
    $s = 'typewriter';
    foreach ($instance['steps']['strings'] as $k => $v) {
        $s .= ".typeString('".esc_js($v['text'])."')";
        $s .= '.pauseFor('.absint($v['pause_for']).')';
        if ($v['deletion_mode'] == 'delete_all') {
            $s .= '.deleteAll()';
        } else {
            $s .= '.deleteChars('.absint($v['delete_some']).')';
        }
        $s .= '.pauseFor('.absint($v['pause_for']).')';
    }
    $s .= '.start()';
}

?>

<div class="eso-typewriter-wrap">
    <span class="eso-typewriter-before"><?php echo esc_html($instance['typewriter']['before']); ?> </span>
    <span class="eso-typewriter" id="<?php echo $int_id; ?>"></span>
    <span class="eso-typewriter-after"> <?php echo esc_html($instance['typewriter']['after']); ?></span>
</div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {

        var app = document.getElementById('<?php echo $int_id; ?>');

        var typewriter = new Typewriter(app, {
            cursor: '<?php echo esc_js($instance['typewriter']['cursor']); ?>',
            loop: <?php echo ( !empty($instance['typewriter']['loop']) ? 'true' : 'false' ); ?>,
            delay: <?php echo absint($instance['typewriter']['delay']); ?>,
        });

        <?php echo ( !empty($s) ? $s : '' ); ?>

    })
})(jQuery)
</script>
