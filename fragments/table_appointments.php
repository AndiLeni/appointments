<?php




?>


<table class="table">
    <tr>
        <th>Datum</th>
        <th>Startzeit</th>
        <th>Endzeit</th>
        <th>Dienstleistung</th>
        <th>Kunde</th>
        <th>Angestellter</th>
    </tr>

    <?php foreach ($this->appointments as $appointment) : ?>

        <tr>
            <td><?php echo rex_formatter::date($appointment->start, 'd.m.Y') ?></td>
            <td><?php echo rex_formatter::date($appointment->start, 'H:i') ?></td>
            <td><?php echo rex_formatter::date($appointment->end, 'H:i') ?></td>
            <td><?php echo $appointment->service->name ?></td>
            <td><?php echo $appointment->customer->firstName . ' ' . $appointment->customer->lastName ?></td>
            <td><?php echo $appointment->provider->firstName . ' ' . $appointment->provider->lastName ?></td>
        </tr>

    <?php endforeach ?>

</table>