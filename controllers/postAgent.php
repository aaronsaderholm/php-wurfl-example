<?php

namespace wurfl_demo\controllers;

class homepage {
    $wurflHandler = new wurflHandler($config);
    var_dump($wurflHandler->processAgentBlob($RequestString));
}



