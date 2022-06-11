@extends('app');
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3>Event Form</h3>
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
<!--
                    <div class="form-group">    
                        <label for="dayofweek">dayofweek</label>
                        <select class="select">
                            <option name="dayofweek" id="" value="monday">Monday</option>
                            <option name="dayofweek" id="" value="tuesday">Tuesday</option>
                            <option name="dayofweek" id="" value="wednesday">Wednesday</option>
                            <option name="dayofweek" id="" value="thursday">Thursday</option>
                            <option name="dayofweek" id="" value="friday">Friday</option>
                        </select>
                        <p class="text-danger">@error('dayofweek') {{$message}}  @enderror </p>
                        
                    </div>
-->
       
                    <div class="form-group">    
                        <button type="submit" name="login" class="btn  btn-success">Submit Event</button>
                    </div>

                    <br>

                    
                </form>
            </div>

            <div class="col-md-8">
            <table class="table">
             <thead>
                <tr>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Start time</th>
                    <th>End time</th>
                </tr>
            </thead>
            <tbody>
    
         <tr>
         @foreach($details as $detail)
            <td>{{$details->eventname}}</td>
            <td>{{$details->description}}</td>
            <td>{{$details->starttime}}</td>
            <td>{{$details->endtime}}</td>
            @endforeach   
         </tr>
               
       </tbody>
     </table>
    </div>
</div>
    


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <br />

  <div class="row">
    <div class="col-md-10">
      <div id="calendar">
        </div>
    </div>
   </div>
  <script>
    
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'eventname',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(starttime, endtime, allDay)
    {
     var name = prompt("Enter Event Name");
     var descr = prompt("Enter Event description");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"register_event",
       type:"POST",
       data:{eventname:eventname, description:description ,starttime:starttime, endtime:endtime},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
   });
  });
   
  </script>