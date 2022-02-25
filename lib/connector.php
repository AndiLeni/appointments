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

        $this->admin_username = rex_config::get($this->addon->getName(), 'admin_username', null);
        $this->admin_password = rex_config::get($this->addon->getName(), 'admin_password', null);
        $ea_url = rex_config::get('appointments', 'ea_url', null);

        if ($this->admin_username == null || $this->admin_password == null || $ea_url == null) {
            echo rex_view::error('Zugangsdaten fehlen. Bitte füllen Sie die Einstellungen aus.');
        } else {
            $this->client = new GuzzleHttp\Client(['base_uri' => $ea_url . '/index.php/api/v1/']);
        }
    }

    public function make_request(String $method, String $url)
    {
        $auth = ['auth' => [$this->admin_username, $this->admin_password]];

        if ($this->client != null) {
            $response = $this->client->request($method, $url, $auth);
            return $response;
        }

        return null;
    }
}
