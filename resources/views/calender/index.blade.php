@extends('layout.app')
@section('content')   
<div class="page-wrapper">
    <div class="content" style="height:100vh">
        <div class="row">
            <div class="col-sm-6 col-6">
                <h4 class="page-title" style="text-align:left;">Calendar</h4>
            </div>
            <div class="col-sm-6 col-6">
                <div class="form-group">

                    <select class="form-control" id="filter-event-state">
                        <option value="All">All Appointment</option>
                        <option value="Today">Today Appointment</option>
                        <option value="Upcoming">Upcoming Appointment</option>
                        <option value="Pending">Pending Appointment</option>
                        <option value="Completed">Completed Appointment</option>
                        <option value="Cancelled">Cancelled Appointment</option>
                        <option value="Confirmed">Confirmed Appointment</option>
                        <option value="Rejected">Rejected Appointment</option>

                    </select>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card-box mb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>

                <!-- Event Details Modal -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content modal-md">
                            <div class="modal-header">
                                <h4 class="modal-title">Appointment Details</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p id="event-details"></p>
                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-danger btn-lg delete-event"
                                    data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Event Modal -->
<div id="add_event" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Add Appointment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="add-event-form">
                    <div class="form-group">
                        <label>Appointment Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="event-name" required>
                    </div>
                    <div class="form-group">
                        <label>Appointment Date <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input class="form-control datetimepicker" type="text" id="event-date" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Appointment State</label>
                        <select class="form-control" id="event-state">
                            <option value="Today">Today</option>
                            <option value="Upcoming">Upcoming</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Rejected">Rejected</option>
                            <option value="Follow-up">Follow-up</option>
                        </select>
                    </div>
                    <div class="m-t-20 text-center">
                        <button type="submit" class="btn btn-primary submit-btn">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'dayGridMonth',
                events: [], // Dynamic events array
                editable: true,
                selectable: true,
                eventClick: function (info) {
                    // Display event details in modal
                    $('#event-modal').modal('show');
                    $('#event-details').text(info.event.title);
                }
            });

            calendar.render();

            // Event storage
            var allEvents = [];

            // Handle event creation
            $('#add-event-form').on('submit', function (e) {
                e.preventDefault();
                var eventName = $('#event-name').val();
                var eventDate = $('#event-date').val();
                var eventState = $('#event-state').val();

                var newEvent = {
                    title: `${eventName} (${eventState})`,
                    start: eventDate,
                    state: eventState,
                    backgroundColor: getEventColor(eventState),
                    borderColor: getEventColor(eventState)
                };

                allEvents.push(newEvent);
                calendar.addEvent(newEvent);

                $('#add_event').modal('hide');
                this.reset();
            });

            // Filter functionality
            $('#filter-event-state').on('change', function () {
                var selectedState = $(this).val();
                calendar.removeAllEvents();

                if (selectedState === 'All') {
                    allEvents.forEach(event => calendar.addEvent(event));
                } else {
                    allEvents
                        .filter(event => event.state === selectedState)
                        .forEach(event => calendar.addEvent(event));
                }
            });

            function getEventColor(state) {
                switch (state) {
                    case 'Today': return '#1abc9c';
                    case 'Upcoming': return '#3498db';
                    case 'Pending': return '#f1c40f';
                    case 'Completed': return '#2ecc71';
                    case 'Cancelled': return '#e74c3c';
                    case 'Confirmed': return '#9b59b6';
                    case 'Rejected': return '#e67e22';
                    case 'Follow-up': return '#34495e';
                    default: return '#7f8c8d';
                }
            }
        });
    </script>
@endpush