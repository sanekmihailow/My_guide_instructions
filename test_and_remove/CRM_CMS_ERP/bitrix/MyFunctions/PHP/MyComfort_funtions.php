<?php

define('BITR_FILE_LOG', '/var/www/bitri/log.log');

function writeToDump($val_data) {
    ob_start();
    var_dump($val_data);
    $output_dump = ob_get_clean();
    file_put_contents(BITR_FILE_LOG, $output_dump);
}

function writeToLog($data, $title = '') {
    $log = "\n------------------------\n";
    $log .= date("Y.m.d G:i:s") . "\n";
    $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
    $log .= print_r($data, 1);
    $log .= "\n------------------------\n";
    file_put_contents(BITR_FILE_LOG, $log, FILE_APPEND);
    return true;
}
