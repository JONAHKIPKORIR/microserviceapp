<?php

namespace App\Http\Controllers;
use App\Models\Event;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    //

    public function eventform(){
        return view('eventform');
    }

    public function registerEvent(Request $request)
    {
        $request->validate([
            'eventname'=>'required',
            'description'=>'required',
            'starttime'=>'required',
            'endtime'=>'required',
            

        ]);

        $event=new Event();
        $event->eventname=$request->eventname;
        $event->description=$request->description;
        $event->starttime=$request->starttime;
        $event->endtime=$request->endtime;
       // $event->user_id = auth()->user()->id;
        //$event->dayofweek=$request->dayofweek;


        $res=$event->save();

        if($res){
            return back()->with('success','Successfully Registered the Event');
        }
        else{
            return back()->with('fail','Something wrong happened,try again ');
        }
    }

    

    
}
