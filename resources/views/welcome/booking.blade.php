@extends('template')

@section('css')

@endsection

@section('title', "Restaurante | Reservas")

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="container">
                    <div id="response"></div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('welcome.modal')
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: '{{ route('booking.calendar') }}',
                displayEventTime: true,
                editable: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: false,
                selectHelper: true,
                eventClick: function(info) {
                    var date = $.fullCalendar.formatDate(info.start, "YYYY-MM-DD");
                    var time = $.fullCalendar.formatDate(info.start, "HH:SS");
                    $("#createModal").find('#date').val(date);
                    $("#createModal").find("#time").val(time);
                    $("#createModal").modal('show');
                },
            });

            $("#close-modal").on('click', function(e) {
                e.preventDefault();
                $("#createModal").modal('hide');
            });

            $("#create-booking-form").on('submit', function(e) {
                e.preventDefault();
                let data = $(this).serialize();
                book(data);
            });
        });

        function book(data) {
            $.post("{{ route('booking.book') }}", { _token: '{{ csrf_token() }}', data: data }, function( res ) {
                if (res.success) {
                    $("#createModal").modal('hide');
                    Swal.fire({
                        title: 'Correcto',
                        text: res.message,
                        icon: 'success',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: res.message,
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                    });
                }
            });
        }
    </script>
@endsection
