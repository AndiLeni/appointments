<?php

$addon = rex_addon::get('appointments');
$form = rex_config_form::factory($addon->name);

$field = $form->addInputField('url', 'ea_url', null, ["class" => "form-control"]);
$field->setLabel('Url der EasyAppointments-Installation');

$field = $form->addInputField('text', 'admin_username', null, ["class" => "form-control"]);
$field->setLabel('Admin Benutzername');

$field = $form->addInputField('password', 'admin_password', null, ["class" => "form-control"]);
$field->setLabel('Admin Passwort');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', "Settings", false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
