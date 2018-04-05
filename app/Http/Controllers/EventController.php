<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events;
class EventController extends Controller
{
    // get method
    public function create(){
    	return view('event.create');
    }

    // called by post method for creating event
    public function store(Request $request){
    	
    		$name = $request->input('name');
    		$desc = $request->input('description');
    		$max = $request->input('max');
    		$startdate = $request->input('event_date');
    		$starttime = $request->input('event_time');

    		$event = new Events();

    		$event->title = $name;
    		$event->description = $desc;
    		$event->max_attend = $max;
    		$event->start_time = $starttime;
    		$event->start_date = $startdate;
    		$event->save();

    		return redirect('/');
    		// echo $name.$max;
    }

    // show event 
    public function show(){

    }


}
