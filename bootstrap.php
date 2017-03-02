<?php

require __DIR__."/psr4.php";
require __DIR__ . '/vendor/autoload.php';

use wurfl_demo\classes\wurflHandler;

$config_json = file_get_contents(__DIR__.'/config.json');
$config = json_decode($config_json);

$Request_URI = $_SERVER['REQUEST_URI'];
$Request_Method = $_SERVER['REQUEST_METHOD'];

switch ($Request_URI) {
    case "/":
        wurfl_demo\controllers\homepage::view();
        exit;
        break;
    default:
        #header('Location: /', true, 302;
        #exit;
    break;
}



