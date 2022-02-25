<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5/locales-all.min.js"></script>

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.min.css">


<div id='calendar'></div>

<?php


$api_appointments = new api_appointments();

$response = $api_appointments->get_appointments();



if ($response->getStatusCode() != 200) {
    rex_view::error('API-Abfrage fehlgeschlagen. Bitte überprüfen Sie die Einstellungen.');
} else {

    $appointments = json_decode($response->getBody()->getContents());

    dump($appointments);

    $events = [];

    foreach ($appointments as $appointment) {

        $fragment = new rex_fragment();
        $fragment->setVar('appointment', $appointment);
        $table = $fragment->parse('overview_details_table.php');

        $events[] = [
            'title' => $appointment->service->name . ' - ' . $appointment->customer->firstName . ' ' . $appointment->customer->lastName,
            'start' => rex_formatter::date($appointment->start, 'Y-m-d\TH:i:s'),
            'end' => rex_formatter::date($appointment->end, 'Y-m-d\TH:i:s'),
            'description' => $table,
        ];
    }
}


?>

<div id="details_modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body" id="details_modal_body">
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'de',
            initialView: 'dayGridMonth',
            events: <?php echo json_encode($events); ?>,
            eventDidMount: function(info) {
                var tooltip = tippy(info.el, {
                    content: info.event.extendedProps.description,
                    trigger: 'click',
                    allowHTML: true,
                });
            },
            eventClick: function(info) {
                console.log(info.event.extendedProps.description);
                var modal = document.getElementById('details_modal_body');
                modal.innerHTML = info.event.extendedProps.description;
                $('#details_modal').modal('toggle')
            }
        });
        calendar.render();

        $('#details_modal').modal({
            keyboard: true,
            show: false,
        })
    });
</script>