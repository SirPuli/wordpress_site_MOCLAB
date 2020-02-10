<?php if ( !empty($nav) ) : ?>
    <div class="uk-width-1-1">

        <ul class="uk-nav uk-nav-primary <?php echo esc_attr(implode(' ', $nav_class)); ?>">

            <?php foreach ($nav as $k => $v) : ?>

                <li class="<?php echo esc_attr(implode(' ', $heading_class)); ?>">
                    <?php echo esc_html($v['header']); ?>
                </li>

                <?php foreach ($v['links'] as $k2 => $v2) : ?>

                    <li>
                        <a class="<?php echo esc_attr(implode(' ', $link_class)); ?>" href="<?php echo sow_esc_url($v2['target']); ?>">
                            <?php echo esc_html($v2['text']); ?>
                        </a>
                    </li>

                <?php endforeach; ?>

            <?php endforeach; ?>

        </ul>

    </div>
<?php endif; ?>
