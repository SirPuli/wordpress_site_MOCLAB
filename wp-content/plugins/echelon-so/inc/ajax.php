<?php

add_action( 'wp_ajax_echelonso_regen_less', 'ajax_echelonso_regen_less' );

function ajax_echelonso_regen_less() {
    require 'less/less.php';
    wp_die();
}
