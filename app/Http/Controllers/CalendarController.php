<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class CalendarController extends Controller
{
    public function index()
    {
        if(request()->ajax()) 
        {
 
         $starttime = (!empty($_GET["starttime"])) ? ($_GET["starttime"]) : ('');
         $endtime = (!empty($_GET["endtime"])) ? ($_GET["endtime"]) : ('');
 
         $data = Event::whereDate('starttime', '>=', $starttime)->whereDate('endtime',   '<=', $endtime)->get(['id','eventname','starttime', 'endtime']);
         return Response::json($data);
        }
        return view('home');
    }
    
   
    public function create(Request $request)
    {  
        $insertArr=new Event();
        $insertArr = [ 'eventname' => $request->eventname,
                       'description' => $request->description,
                       'starttime' => $request->starttime,
                       'endtime' => $request->endtime
                    ];
        $event = $insertArr->save();   
        return Response::json($event);
    }
     

}
