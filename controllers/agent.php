<?php

namespace wurfl_demo\controllers;

use wurfl_demo\classes\wurflHandler;

class agent {

    public static function get() {

    }

    public static function post($config) {

        $wurflHandler = new wurflHandler($config);
        $results = $wurflHandler->processAgentBlob($_POST['agents']);



        $data = [];
        $data[] = array('ua','is_mobile','complete_device_name', 'form_factor', 'id');

        foreach ($results as $result) {
            $data[] = [
                $result['ua'],
                $result['is_mobile'],
                $result['complete_device_name'],
                $result['form_factor'],
                $result['id'],
            ];
        }
        
        header('Content-type: text/tab-separated-values');
        header("Content-Disposition: attachment;filename=wurfl_tsv.tsv");
        foreach ($data as $fields) {
            //$fields=str_replace('"','',$fields);
            //$fields=trim($fields,'"');
            echo implode("\t", $fields);
            echo "\n";
        }
    }

}



