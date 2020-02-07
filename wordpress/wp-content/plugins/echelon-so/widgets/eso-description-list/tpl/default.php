<?php  if ( !empty($list_items) ) : ?>
    
    <dl class="uk-description-list <?php echo esc_attr(implode(' ', $class)); ?>">
        <?php foreach ( $list_items as $k => $v) : ?>
            <dt><?php echo esc_html($v['heading']); ?></dt>
            <dd class="uk-margin-remove"><?php echo esc_html($v['text']); ?></dd>
        <?php endforeach; ?>
    </dl>
    
<?php endif; ?>
