<h3>Kunde:</h3>
<table class="table">

    <tr>
        <th>Name</th>
        <th>Telefon</th>
        <th>E-Mail</th>
        <th>Dienstleistung</th>
        <th>Preis</th>

    <tr>
        <td><?php echo $this->appointment->customer->firstName . ' ' . $this->appointment->customer->lastName ?></td>
        <td><?php echo $this->appointment->customer->phone ?></td>
        <td><?php echo $this->appointment->customer->email ?></td>
        <td><?php echo $this->appointment->service->name  ?></td>
        <td><?php echo $this->appointment->service->price ?></td>
    </tr>

</table>