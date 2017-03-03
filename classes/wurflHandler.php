<?php
namespace wurfl_demo\classes;
use ScientiaMobile\WurflCloud;

class wurflHandler {

    private $client;
    private $config;
    private $config_json;

    public function __construct($config_json)
    {
        $this->config = new WurflCloud\Config();
        $this->config->api_key = $config_json->WURFL_API_KEY;
        $this->config_json = $config_json;
    }

    /**
     * @param string $text_blob
     */
    public function processAgentBlob($text_blob) {
        $agents = explode(PHP_EOL, $text_blob);
        $response_array = [];
        foreach ($agents as $agent) {
            $agent = preg_replace('/\s+/', ' ', trim($agent));
            $response_array[] = self::processAgent($agent);
        }

        if($this->config_json->debug_mode) {
            exit();
        }

        return $response_array;

    }

    /**
     * @param string $agent
     * @return array
     */
    public function processAgent($agent) {
        $http_request = $_SERVER;
        $http_request['HTTP_USER_AGENT'] = $agent;
        $http_request['HTTP_COOKIE'] = "";

        # This threw me for a loop.
        $cache = new WurflCloud\Cache\File();

        $client = new WurflCloud\Client($this->config, $cache);
        $client->detectDevice($http_request, ['complete_device_name', 'form_factor', 'is_mobile']);

        if($this->config_json->debug_mode) {
            echo "<strong>$agent</strong><br/>";
            foreach ($client->capabilities as $name => $value) {
                echo "<strong>$name</strong>: ".(is_bool($value)? var_export($value, true): $value) ."<br/>";
            }
            echo "<br/>";
        }

        /*
            Capability 1 = is_mobile
            Capability 2 = complete_device_name
            Capability 3 = form_factor
            Capability 4 = id
         */
        $result = [
            'ua' => $agent,
            'is_mobile' => $client->getDeviceCapability('is_mobile') ? "yes" : "no",
            'complete_device_name' => $client->getDeviceCapability('complete_device_name'),
            'form_factor' => $client->getDeviceCapability('form_factor'),
            'id' => $client->getDeviceCapability('id'),
        ];

        return $result;
    }
}