@extends('app')


<!DOCTYPE html>
<html>
<head>
  <title>Microservice App</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<body>
<header>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg  ">
    <div class="container-fluid" style="background-color: cadetblue; margin:20px;padding:20px;">
     
      <div class="collapse navbar-collapse" id="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link " style="color:white; font-size:25px;" aria-current="page" href="#">Microservice App</a>
          </li>
          
         
        </ul>
        <ul class="navbar-nav">
            
            <li class="nav-item">
                <a class="nav-link"href="{{route('login')}}" style="color:white; font-size:25px; " >Logout</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

</header>


  <div class="container"> 

  
  <div class="row">
      <div class="col-md-4">  
                <h3>Create Event </h3>
                <hr>
                
                <form action="{{ route('register_event') }}" method="POST">
                @if(Session::has('success'))
                <p class="alert alert-success"> {{Session::get('success')}}</p>
                @endif
                @if(Session::has('fail'))
                <p class="alert alert-danger"> {{Session::get('fail')}}</p>
                @endif

                @csrf

                    <div class="form-group">    
                        <label for="eventname">Event Name</label>
                        <input type="text" name="eventname" class="form-control" placeholder="Enter eventname" value="{{old('eventname')}}">
                        <p class="text-danger">@error('eventname') {{$message}}  @enderror </p>
                    </div>

                    <div class="form-group">    
                        <label for="description">description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter description" value="{{old('description')}}">
                        <p class="text-danger">@error('description') {{$message}}  @enderror </p>
                    </div>

                    <div class="form-group">    
                        <label for="starttime">starttime</label>
                        <input type="datetime-local" name="starttime" class="form-control" placeholder="Enter starttime" value="{{old('starttime')}}">
                        <p class="text-danger">@error('starttime') {{$message}}  @enderror </p>
                    </div>

                    <div class="form-group">    
                        <label for="endtime">endtime</label>
                        <input type="datetime-local" name="endtime" class="form-control" placeholder="Enter starttime" value="{{old('endtime')}}">
                        <p class="text-danger">@error('starttime') {{$message}}  @enderror </p>
                    </div>
                   
                    <div class="form-group">    
                        <button type="submit" name="login" class="btn  btn-success" style="background:cadetblue;">Add Event</button>
                    </div>

                    <br>

                    
                </form>
            </div>

            

  
     

     <div class="col-md-8">
          <div class="response"></div>
          <div id='calendar'><p></p></div> 
     </div>
  
  </div>
    
    
  
  
    
 


 <script>
  $(document).ready(function () {
         
        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
 
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/home",
            displayEventTime: true,
            editable: true,
            
            selectable: true,
            selectHelper: true,
            select: function (starttime, endtime) {
                var eventname = prompt('Enter Event Name:');
 
                if (eventname) {
                    var starttime = $.fullCalendar.formatDate(starttime, "Y-MM-DD HH:mm:ss");
                    var endtime = $.fullCalendar.formatDate(endtime, "Y-MM-DD HH:mm:ss");
 
                    $.ajax({
                        url: SITEURL + "/home/create",
                        data: 'eventname=' + eventname + '&starttime=' + starttime + '&endtime=' + endtime,
                        type: "POST",
                        success: function (data) {
                            displayMessage("Added Successfully");
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                            {
                                eventname: eventname,
                                starttime: starttime,
                                endtime: endtime,
                              
                            },
                    true
                            );
                }
                calendar.fullCalendar('unselect');
            },
             
            eventDrop: function (event) {
                        var starttime = $.fullCalendar.formatDate(event.starttime, "Y-MM-DD HH:mm:ss");
                        var endtime = $.fullCalendar.formatDate(event.endtime, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + '/home/update',
                            data: 'eventname=' + event.eventname + '&starttime=' + starttime + '&endtime=' + endtime + '&id=' + event.id,
                            type: "POST",
                            success: function (response) {
                                displayMessage("Updated Successfully");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/home/delete',
                        data: "&id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            }
 
        });
  });
 
  function displayMessage(message) {
    $(".response").html(""+message+"");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
  }
</script>
</body>
</html>