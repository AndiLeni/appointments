<h4>Kunde:</h4>
<table class="table table-striped table-bordered">

    <tr>
        <th>Name</th>
        <td><?php echo $this->appointment->customer->firstName . ' ' . $this->appointment->customer->lastName ?></td>
    </tr>
    <tr>
        <th>E-Mail</th>
        <td><?php echo $this->appointment->customer->email ?></td>
    </tr>
    <tr>
        <th>Telefon</th>
        <td><?php echo $this->appointment->customer->phone ?></td>
    </tr>
    <tr>
        <th>Dienstleistung</th>
        <td><?php echo $this->appointment->service->name  ?></td>
    </tr>
    <tr>
        <th>Preis</th>
        <td><?php echo $this->appointment->service->price ?></td>
    </tr>

</table>