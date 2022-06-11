@extends('app')
@extends('eventform')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <!--<h4> {{$details->firstname}}   {{$details->lastname}}  {{$details->email}}</h4>-->
        </div>
        <div class="col-md-4">
        <button> <a href="logout">Logout</a> </button>
        </div>
    </div>
</div>



<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
   /* $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($details) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: details,
            })
        });
        */
</script>

</div>