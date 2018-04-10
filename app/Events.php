<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\users_categories;
use App\events_categories;
use Illuminate\Support\Collection;
class Events extends Model
{
    //
    public $timestamps = false;


    // find only interested category
    public static function findInterestedCategory(){
    	// get the user id 
    	$user_id = auth()->user()->id;
    	$user_cates = users_categories::all()->groupBy('user_id');
    	$events_cates = events_categories::all()->groupBy('event_id');
        // dd($events_cates);
    	$query = Events::query();
    	
    	$result = collect();
        foreach($user_cates as $user_cate){ //outside user loop
                $uid = $user_cate['0']['original']['user_id'];//get the user id
                // dd($user_cate);
                if($uid==$user_id){ //verify if it is same user
                    foreach($user_cate as $uc){ // loop for same id 
                        $u_cat_id = $uc['original']['category_id'];//get the cat_id
                         foreach($events_cates as $event_cate){// outside of event loop
                            // dd($events_cates);
                            $isRight = false;
                            $e_event_id = $event_cate['0']['original']['event_id'];//get the event_id
                            foreach($event_cate as $ec){//inner loop same eventId
                                $e_cat_id = $ec['original']['category_id'];//get the cat_id for the specific event_id

                                if($u_cat_id == $e_cat_id){ //check if user's category is same with event cat_id

                                        $isRight = true;
                                        break;
                                }
                            
                            }
                            if($isRight){

                                $result->push($e_event_id);//push event_id
                                // $result->push($query->find($e_event_id));
                                
                                
                            }
                        }
                    }
                   
                     break;
                }
               
        }
        $result = $result->unique();
        $query->findMany($result->toArray());
    	return $query->paginate(5);	
    }

    // find the result based on the keywords and category
    public static function findRequested(){
    	$query = Events::query();
    	// dd($query);
    	//search results based on user input without case sensitive
    	$cates = \Request::input('categories');
        // dd($cates);
    	$events_cates = events_categories::all()->groupBy('event_id');

    	// dd($events_cates);
        $result = collect(); //create empty collection 
    	if($cates!=null){ //if the request from category not null
    		foreach($events_cates as $ec){ 
                
                $count = 0;
                $ec_event_id  = $ec['0']['original']['event_id'];
                
                foreach($ec as $e){ //inside the loop of same event id
                        $e_cate_id  = $e['original']['category_id'];
                        
                    foreach($cates as $cate){

                        if($e_cate_id == $cate){
                            $count = $count + 1;
                        }
                    }
                }
                if($count == count($cates)){
                    $result->push($ec_event_id);
                }
                // $test =$ec['0']['original']['event_id'];
                // if( $test=="13"){
                //     foreach($ec as $e){
                //         dd($e['original']);
                //     }
                //      dd($ec);
                // } 
                // $cate_id = $ec['0']['original']['category_id'];
                
            }
            // $result = \DB::table('events_categories')->whereIn('category_id',$cates)->lists('event_id');
            // $result = events_categories::query()->find($cates)->lists('event_id');
            
    		$query->findMany($result->toArray());
            
    	}
    	$query->where(function($q){
	    		$q->where('title','ilike','%'.\Request::input('keywords').'%')
	    				->orWhere('description','ilike','%'.\Request::input('keywords').'%');
    		});
       
                       
    	
    	

    	return $query->paginate(5);
    }
}
