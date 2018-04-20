<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function selected($param_one, $param_two) {
    if ($param_one == $param_two) {
        return 'selected="selected"';
    }
    return '';
}
