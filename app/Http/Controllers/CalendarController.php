<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    //

    public function calendarEvents(){
        $details=array();
        $events=Event::all();
        //$events = Event::where('user_id',$userId)->get();
        
        foreach ($details as $detail) {
            $details[]=[
                'eventname'=>$detail->eventname,
                'description'=>$detail->description,
                'starttime'=>$detail->starttime,
                'endtime'=>$detail->endtime
            ];

            
        }
       
        return view('home', ['details' =>$details]);
       // console.log($details);
    }
    public function calenda(){
        return view('calendar.index');
    }

}
