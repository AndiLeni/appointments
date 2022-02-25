<?php

$api_appointments = new api_appointments();

$response = $api_appointments->get_appointments();



if ($response == null || $response->getStatusCode() != 200) {
    rex_view::error('API-Abfrage fehlgeschlagen. Bitte überprüfen Sie die Einstellungen.');
} else {

    $appointments = json_decode($response->getBody()->getContents());

    $fragment = new rex_fragment();
    $fragment->setVar('appointments', $appointments);
    echo $fragment->parse('table_appointments.php');
}
