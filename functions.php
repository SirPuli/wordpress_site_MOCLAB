<?php

if (!defined('APP_VERSION')) {
    exit;
}


function route($params = []) {
    $url = DOMAIN;
    if (is_array($params) && count($params) > 0) {
        $i = 0;
        $url .= "?";
        foreach($params as $key => $value) {
            if ($i == 0) {
                $url .= "$key=$value";
                $i++;
            } else {
                $url .= "&$key=$value";
            }
        }
    }
    return $url;
}