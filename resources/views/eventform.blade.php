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

       
                    <div class="form-group">    
                        <button type="submit" name="login" class="btn  btn-success">Submit Event</button>
                    </div>

                    <br>

                    
                </form>
            </div>

            
</div>
  