<?php
namespace wurfl_demo\classes;

class wurflHandler {
    public function __construct($config)
    {
        // Config will be needed !
    }

    /**
     * @param string $text_blob
     */
    public function processAgentBlob($text_blob) {
        $agents = explode(PHP_EOL, $text_blob);

        $response_array = [];
        foreach ($agents as $agent) {
            $response_array[] = self::processAgent($agent);
        }

    }

    public function processAgent($agent) {

    }
}