@extends('app');
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3>Event Form</h3>
                <hr>
                <form action="">
                    
                    <div class="form-group">    
                        <label for="name">Event Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" value="">
                    </div>

                    <div class="form-group">    
                        <label for="description">description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter description" value="">
                    </div>

                    <div class="form-group">    
                        <label for="starttime">starttime</label>
                        <input type="datetime-local" name="starttime" class="form-control" placeholder="Enter starttime" value="">
                    </div>

                    <div class="form-group">    
                        <label for="endtime">endtime</label>
                        <input type="datetime-local" name="endtime" class="form-control" placeholder="Enter starttime" value="">
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
                        
                    </div>

                    <div class="form-group">    
                        <button type="submit" name="login" class="btn  btn-success">Submit Event</button>
                    </div>

                    <br>

                    
                </form>
            </div>
        </div>
    </div>