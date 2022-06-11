<?php


namespace App\Http\Controllers;
use App\Models\Event;
use Response;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    //

    public function eventform(){
        return view('home');
        
    }

    public function registerEvent(Request $request)
    {
        $event=$request->validate([
            'eventname'=>'required',
            'description'=>'required',
            'starttime'=>'required',
            'endtime'=>'required',
            'dayofweek'=>'dayofweek'
            

        ]);

        $event=new Event();
        $event->eventname=$request->eventname;
        $event->description=$request->description;
        $event->starttime=$request->starttime;
        $event->endtime=$request->endtime;
       

     
        $res=$event->save();
        //dd(request()->all);
        if($res){
            return back()->with('success','Successfully Registered the Event');
        }
        else{
            return back()->with('fail','Something wrong happened,try again ');
        }
    }


    public function showEvents(){
        $sh_events=array();
        $sh_events=Event::all();

        foreach ( $sh_events as  $sh_event) {
             $sh_events[]=[
                'eventname'=>$sh_event->eventname,
                'description'=>$sh_event->description,
                'starttime'=>$sh_event->starttime,
                'endtime'=>$sh_event->endtime,
                
            ];
            
        // return Response::json($sh_events);
        }
        

       // return view('home', ['details' =>$details]);
       // console.log($details);
        return view('home')->with('sh_events', $sh_events);
    }

    public function calendarEvents(){
        $details=array();
        $events=Event::all();
        //$events = Event::where('user_id',$userId)->get();
        
        
       
        
    }
    
}
