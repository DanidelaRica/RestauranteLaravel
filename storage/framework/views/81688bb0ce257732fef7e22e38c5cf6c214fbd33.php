<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', "Restaurante | Reservas"); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="container">
                    <div class="response"></div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: '<?php echo e(route('booking.calendar')); ?>',
                displayEventTime: true,
                editable: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var date = $.fullCalendar.formatDate(start, "YYYY-MM-DD");
                    $("#createModal").find('#date').val(date);
                    $("#createModal").modal('show');
                },
            });

            $("#create-booking-form").on('submit', function(e) {
                e.preventDefault();
                let data = $(this).serialize();
                book(data);
            });
        });

        function displayMessage(message) {
            $(".response").html("<div class='success'>" + message + "</div>");
            setInterval(function() {
                $(".success").fadeOut();
            }, 5000);
        }

        function book(data) {
            $.post("<?php echo e(route('booking.book')); ?>", { _token: '<?php echo e(csrf_token()); ?>', data: data }, function( res ) {
                $("#createModal").modal('hide');
                displayMessage(res == 1 ? "Reserva realizada" : "No se ha podido realizar la reserva");
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\restaurantee\resources\views/welcome/booking.blade.php ENDPATH**/ ?>