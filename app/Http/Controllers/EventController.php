<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Events;
use App\Category;
use App\events_categories;
use App\SubCategory;
use App\events_subs;
use App\events_users;
class EventController extends Controller
{

    // get method
    public function create(){

        $categories = array(Category::all());
        $subs = SubCategory::all();
        // dd($categories);
    	return view('Event.create',['categories'=>$categories['0'], 'subs'=>$subs]);
    }

    // called by post method for creating event
    public function store(Request $request){

    		$name = $request->input('name');
    		$desc = $request->input('description');
    		$max = $request->input('max');
    		$startdate = $request->input('event_date');
    		$starttime = $request->input('event_time');
            // $cates = $request->input('cates');
            $allpref = $request->input('pref');
            // dd($allpref);

            $event = new Events();

            $event->title = $name;
            $event->description = $desc;
            $event->max_attend = $max;
            $event->start_time = $starttime;
            $event->start_date = $startdate;
            $event->save();

            $event_id = Events::query()->where('title',$name)->first()->id;

            foreach($allpref as $pref){
                $events_subs = new events_subs;
                 $events_subs->event_id = $event_id;
                $events_subs->sub_id = $pref;
                $events_subs->save();
            }
            // foreach($cates as $cate){
            //     $events_cate = new events_categories;
            //      $events_cate->event_id = $event_id;
            //     $events_cate->category_id = $cate;
            //     $events_cate->save();
            // }
    	   $table = Events::all();
    $filename = "events.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('title', 'description', 'max_attend', 'start_date','start_time'));

    foreach($table as $row) {
        fputcsv($handle, array($row['title'], $row['description'], $row['max_attend'], $row['start_date'], $row['start_time']));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );

    Response::download($filename, 'events.csv', $headers);

    		return redirect('/');
    		// echo $name.$max;
    }

    // show event 
    public function show(){
        $records = Events::findRequested();
        // dd($records);

        // if(!$records->isEmpty()){
        
       
        // dd($records);
        return view('Event.show',['records' =>$records] );
    }

    public function singleEvent($eventId){
            $e = Events::findOrFail($eventId);
            $e = $e['original'];
            $id = auth()->user()->id;
            $attends = events_users::where('event_id',$eventId)->where('user_id',$id)->get();
            // dd($attends);
            $attend = 0;
            if($attends->isEmpty()){
                $attend = 0;
            }
            else{
                $attend = 1;
            }

            // dd($attend);
            return view('Event.oneevent',['id'=>$eventId , 'event'=>$e,'attend'=>$attend]);
    }

    public function join($eventId){
        $id = auth()->user()->id;
        $attend = new events_users();
        $attend->user_id = $id;
        $attend->event_id = $eventId;
        $attend->save();
        return redirect('event/'.$eventId);
    }

    public function leave($eventId){
        $id = auth()->user()->id;
        $leave = events_users::where('event_id',$eventId)->where('user_id',$id);
        $leave->delete();

        return redirect('event/'.$eventId);
    }

}
