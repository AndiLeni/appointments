<?php

$api_customers = new api_customers();

$response = $api_customers->get_customers();



if ($response->getStatusCode() != 200) {
    rex_view::error('API-Abfrage fehlgeschlagen. Bitte überprüfen Sie die Einstellungen.');
} else {

    $customers = json_decode($response->getBody()->getContents());

    $fragment = new rex_fragment();
    $fragment->setVar('customers', $customers);
    echo $fragment->parse('table_customers.php');
}
