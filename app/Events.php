<?php
namespace App;
// use \vendor\loilo\fuse\src\Fuse;
// use \Fuse;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\users_categories;   
use App\events_categories;
use App\events_subs;
use Illuminate\Support\Collection;
class Events extends Model
{
    //
    public $timestamps = false;
    // find only interested category
    public static function findInterestedCategory(){
    	// get the user id 
    	$user_id = auth()->user()->id;
        $u_subid = \DB::table('users_subs')->where('users_subs.user_id','=',$user_id)->pluck('sub_id');
        
    	$results = \DB::table('users_subs')->where('users_subs.user_id','=',$user_id)->join('events_subs',function($join){
            $join->on('users_subs.sub_id','=','events_subs.sub_id');
        })->get();
        $e_ids = array();
        foreach($results as $r){
            
            array_push($e_ids,$r->event_id);
        }
        // dd($e_ids);
        $unique_eid = array_unique($e_ids);
        // $query->findMany($unique_eid);
        $options=[
              'shouldSort'=>true,
              'tokenize' =>true,
              'includeScore' =>true,
              'threshold' =>0.6,
              'location' =>0,
              'distance' =>100,
              'maxPatternLength' =>32,
              'minMatchCharLength' =>1,
              'keys' =>[
                "id"
            ]
        ];
        // dd($options);
        $re = Events::all()->toArray();
        $fuse = new \Fuse\Fuse($re,$options);
        $final = $fuse->search('1');
        
        $result = array();
        foreach($unique_eid as $r){
            $count =0;
            foreach($e_ids as $i){
                if($r==$i){
                    $count = $count + 1;
                }
            }
            $rounds = $fuse->search($r);
            foreach($rounds as $round){
                if($round['item']['id']==$r && $round['score']=='0'){
                        
                         $points = ($count / (float)count($u_subid))*100;
                         $round['score'] = $points;
                        array_push($result, $round);
                        break;
                }
            }
            // request()->session()->put($r,$points);
            // request()->session()->save();
        }
        
        return $result;
    }
    // find the result based on the keywords and category
    public static function findRequested(){
    	$query = Events::query();
    	// dd($query);
    	//search results based on user input without case sensitive
    	$cates = \Request::input('categories');
        $subs = \Request::input('subs');
        // dd($subs); 
         $last = array(); // final return
          $re = Events::all()->toArray();
    	$events_cates = events_subs::all()->groupBy('event_id');
         $options=[
              'shouldSort'=>true,
              'tokenize' =>true,
              'includeScore' =>true,
              'threshold' =>0.6,
              'location' =>0,
              'distance' =>100,
              'maxPatternLength' =>32,
              'minMatchCharLength' =>1,
              'keys' =>[
                "id"
            ]
        ];
        // dd($options);
        
    	// dd($final);
        $result = collect(); //create empty collection 
    	if($subs!=null){ //if the request from category not null
    		foreach($events_cates as $ec){ 
                // dd($ec);
                $count = 0;
                $ec_event_id  = $ec['0']['original']['event_id'];
                
                foreach($ec as $e){ //inside the loop of same event id
                        $e_cate_id  = $e['original']['sub_id'];
                        // dd($e_cate_id);
                    foreach($subs as $cate){
                        if($e_cate_id == $cate){
                            $count = $count + 1;
                        }
                    }
                }
                
                if($count == count($subs)){
                    $result->push($ec_event_id);
                }
                
            }
            
            if(count($result)==0){
                return $query->limit(0);// might have other issue
               
            }
            $result = $result->toArray();
            // dd($result); 
           
            $fuse = new \Fuse\Fuse($re,$options);
           
            foreach($result as $r){
                $rounds = $fuse->search($r);
                // dd($rounds);
                foreach($rounds as $round){
                        if($round['item']['id']==$r && $round['score']=='0'){
                                array_push($last, $round);
                                break;
                        }
                    }
            }
            // dd($last);
    		 // $query->findMany($result->toArray());
            // dd($query->get());
            
    	}
         $options=[
              'shouldSort'=>true,
              'tokenize' =>true,
              'includeScore' =>true,
              'threshold' =>0.6,
              'location' =>0,
              'distance' =>100,
              'maxPatternLength' =>32,
              'minMatchCharLength' =>1,
              'keys' =>[
                "item.title","item.description"
            ]
        ];
        if(\Request::input('keywords')!=null){
    	 //   $query->where(function($q){
	    	// 	$q->where('title','ilike','%'.\Request::input('keywords').'%')
	    	// 			->orWhere('description','ilike','%'.\Request::input('keywords').'%');
    		// });
            // dd($last);
            $fuse = new \Fuse\Fuse($last,$options);
            $last = $fuse->search(\Request::input('keywords'));
       }
        // dd($last);    
    	
    	
    	return $last;
    }
}
