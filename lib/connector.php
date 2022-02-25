<?php

class connector
{

    private $addon;
    private $client;
    private $admin_username;
    private $admin_password;


    function __construct()
    {
        $this->addon = rex_addon::get('appointments');

        $this->admin_username = rex_config::get($this->addon->getName(), 'admin_username');
        $this->admin_password = rex_config::get($this->addon->getName(), 'admin_password');
        $ea_url = rex_config::get('appointments', 'ea_url');

        $this->client = new GuzzleHttp\Client(['base_uri' => $ea_url . '/index.php/api/v1/']);
    }

    public function make_request(String $method, String $url)
    {
        $auth = ['auth' => [$this->admin_username, $this->admin_password]];

        $response = $this->client->request($method, $url, $auth);

        return $response;
    }
}
