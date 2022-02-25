<?php




?>


<table class="table">
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail</th>
        <th>Telefon</th>
        <th>Adresse</th>
        <th>Stadt</th>
        <th>PLZ</th>
        <th>Notizen</th>
        <th>ID</th>
    </tr>

    <?php foreach ($this->customers as $customer) : ?>

        <tr>
            <td><?php echo $customer->firstName ?></td>
            <td><?php echo $customer->lastName ?></td>
            <td><?php echo $customer->email ?></td>
            <td><?php echo $customer->phone ?></td>
            <td><?php echo $customer->address ?></td>
            <td><?php echo $customer->city ?></td>
            <td><?php echo $customer->zip ?></td>
            <td><?php echo $customer->notes ?></td>
            <td><?php echo $customer->id ?></td>
        </tr>

    <?php endforeach ?>

</table>