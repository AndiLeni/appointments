<?php

use GuzzleHttp\Client;

class api_customers
{
    private $addon;

    function __construct()
    {
        $this->addon = rex_addon::get('appointments');
    }

    public function get_customers()
    {
        $connector = new connector();

        $response = $connector->make_request('GET', 'customers');

        return $response;
    }
}
