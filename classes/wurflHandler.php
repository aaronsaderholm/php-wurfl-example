<?php
namespace wurfl_demo\classes;
use ScientiaMobile\WurflCloud;

class wurflHandler {

    private $client;
    private $config;

    public function __construct($config)
    {
        $this->config = new WurflCloud\Config();
        $this->config->api_key = $config->WURFL_API_KEY;

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
        #var_dump($http_request);
        #return [];

        $client = new WurflCloud\Client($this->config);
        $client->detectDevice($http_request, ['complete_device_name', 'form_factor', 'is_mobile']);

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