<?php

use GuzzleHttp\Client;

class api_appointments
{
    private $addon;

    function __construct()
    {
        $this->addon = rex_addon::get('appointments');
    }

    public function get_appointments()
    {
        $connector = new connector();

        $response = $connector->make_request('GET', 'appointments?aggregates&sort=+start');

        return $response;
    }
}
