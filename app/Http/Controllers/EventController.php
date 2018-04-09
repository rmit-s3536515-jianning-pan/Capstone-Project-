<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events;
use App\Category;
use App\events_categories;
class EventController extends Controller
{

    // get method
    public function create(){

        $categories = Category::all();
    	return view('Event.create',['categories'=>$categories]);
    }

    // called by post method for creating event
    public function store(Request $request){
    	
    		$name = $request->input('name');
    		$desc = $request->input('description');
    		$max = $request->input('max');
    		$startdate = $request->input('event_date');
    		$starttime = $request->input('event_time');
            $cates = $request->input('cates');

            $event = new Events();

            $event->title = $name;
            $event->description = $desc;
            $event->max_attend = $max;
            $event->start_time = $starttime;
            $event->start_date = $startdate;
            $event->save();

            $event_id = Events::query()->where('title',$name)->first()->id;

            
            foreach($cates as $cate){
                $events_cate = new events_categories;
                 $events_cate->event_id = $event_id;
                $events_cate->category_id = $cate;
                $events_cate->save();
            }
    		

    		return redirect('/');
    		// echo $name.$max;
    }

    // show event 
    public function show(){
        $records = Events::findRequested();

        $records = $records->toArray();
        $records = $records["data"];
        // dd($records);
        return view('Event.show',['records' =>$records] );
    }


}
