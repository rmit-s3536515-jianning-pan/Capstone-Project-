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
use Auth;
use App\User;
use App\events_reports;

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

        $userID = Auth::user()->id;
            // $cates = $request->input('cates');
            $allpref = $request->input('pref');
            
            $event = new Events();
            $event->title = $name;
            $event->owner_id = $userID;
            $event->description = $desc;
            $event->max_attend = $max;
            $event->start_time = $starttime;
            $event->start_date = $startdate;
            $event->owner_id = auth()->user()->id;
            $event->save();
            $event_id = Events::query()->where('title',$name)->first()->id;
            foreach($allpref as $pref){
                $events_subs = new events_subs;
                 $events_subs->event_id = $event_id;
                $events_subs->sub_id = $pref;
                $events_subs->save();
            }

    		return redirect('/')->with('message','You have create new Event!!!');
    		

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
            $ownerId = Events::where('id',$eventId)->first()->owner_id;
            // dd($ownerId);
            $owner = User::where('id',$ownerId)->first();
            // dd($owner->name);
            $attend = 0;
            if($attends->isEmpty()){
                $attend = 0;
            }
            else{
                $attend = 1;
            }
            
            return view('Event.oneevent',['id'=>$eventId , 'event'=>$e,'attend'=>$attend,'owner'=>$owner]);
    }
    public function join($eventId){
        $id = auth()->user()->id;
        $attend = new events_users();
        $attend->user_id = $id;
        $attend->event_id = $eventId;
        $attend->save();
        return redirect('event/'.$eventId)->with('message','You have joined this event');
    }
    public function leave($eventId){
        $id = auth()->user()->id;
        $leave = events_users::where('event_id',$eventId)->where('user_id',$id);
        $leave->delete();
        return redirect('event/'.$eventId)->with('message','You have left this event');
    }

    public function reportEvent($eventId,Request $request){
        $text = $request->input('report');
        
        if($text!=null){
             $report = new events_reports();
            $report->event_id = $eventId;
            $report->user_id = auth()->user()->id;
            $report->report = $text;
            $report->save();
        }
       

        return redirect('event/'.$eventId)->with('message','You have just reported this event');
    }
}
