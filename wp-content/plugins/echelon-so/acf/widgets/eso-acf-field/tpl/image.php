<?php

if ($instance['template']['image']['size'] == 'full') {

    $image_url = $fo['field_object']['value']['url'];

} else {

    $image_url = $fo['field_object']['value']['sizes'][$instance['template']['image']['size']];

}

?>
<div class="<?php echo esc_attr(implode(' ', $text_class)); ?>">
    <img src="<?php echo $image_url; ?>">
</div>
