<?php

namespace App;

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
    	$user_cates = users_subs::all()->groupBy('user_id');
    	$events_cates = events_subs::all()->groupBy('event_id');
        // dd($user_cates);
    	$query = Events::query();
        $u_subid = \DB::table('users_subs')->where('users_subs.user_id','=',$user_id)->pluck('sub_id');
        // dd($u_subid);
    	$results = \DB::table('users_subs')->where('users_subs.user_id','=',$user_id)->join('events_subs',function($join){
            $join->on('users_subs.sub_id','=','events_subs.sub_id');
        })->get();
        $e_ids = array();
        foreach($results as $r){
            
            array_push($e_ids,$r->event_id);
        }
        $unique_eid = array_unique($e_ids);

        $query->findMany($unique_eid);

        foreach($unique_eid as $r){
            $count =0;
            foreach($e_ids as $i){
                if($r==$i){
                    $count = $count + 1;
                }
            }
            $points = ($count / (float)count($u_subid))*100;
            request()->session()->put($r,$points);
        }
    
    	// $result = collect();
     //    foreach($user_cates as $user_cate){ //outside user loop
     //            $uid = $user_cate['0']['original']['user_id'];//get the user id
     //            // dd($user_cate);
     //            if($uid==$user_id){ //verify if it is same user
     //                foreach($user_cate as $uc){ // loop for same id 
     //                    $u_cat_id = $uc['original']['category_id'];//get the cat_id
     //                     foreach($events_cates as $event_cate){// outside of event loop
     //                        // dd($events_cates);
     //                        $isRight = false;
     //                        $e_event_id = $event_cate['0']['original']['event_id'];//get the event_id
     //                        foreach($event_cate as $ec){//inner loop same eventId
     //                            $e_cat_id = $ec['original']['category_id'];//get the cat_id for the specific event_id

     //                            if($u_cat_id == $e_cat_id){ //check if user's category is same with event cat_id

     //                                    $isRight = true;
     //                                    break;
     //                            }
                            
     //                        }
     //                        if($isRight){

     //                            $result->push($e_event_id);//push event_id
     //                            // $result->push($query->find($e_event_id));
                                
                                
     //                        }
     //                    }
     //                }
                   
     //                 break;
     //            }
               
     //    }
     //    $result = $result->unique();
     //    $query->findMany($result->toArray());
    	return $query->paginate(5);	
    }

    // find the result based on the keywords and category
    public static function findRequested(){
    	$query = Events::query();
    	// dd($query);
    	//search results based on user input without case sensitive
    	$cates = \Request::input('categories');
        $subs = \Request::input('subs');
        // dd($subs); 
    	$events_cates = events_subs::all()->groupBy('event_id');

    	// dd($events_cates);
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
            // $result = \DB::table('events_categories')->whereIn('category_id',$cates)->lists('event_id');
            // $result = events_categories::query()->find($cates)->lists('event_id');
            // dd($result);
            if(count($result)==0){
                return $query->limit(0);// might have other issue
               
            }
    		 $query->findMany($result->toArray());
            // dd($query->get());
            
    	}
        if(\Request::input('keywords')!=null){
    	   $query->where(function($q){
	    		$q->where('title','ilike','%'.\Request::input('keywords').'%')
	    				->orWhere('description','ilike','%'.\Request::input('keywords').'%');
    		});
       }
                       
    	
    	

    	return $query->paginate(5);
    }
}
