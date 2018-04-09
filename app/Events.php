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
    	$user_cates = users_categories::all();
    	$events_cates = events_categories::all();

    	$query = Events::query()->get();
    	// $events = $query->get();
    	$result = new Collection();
    	foreach($user_cates as $user_cate){
    			if($user_cate ->user_id==$user_id){
    				
    				foreach($events_cates as $event_cate){
    					if($user_cate->category_id == $event_cate->category_id){
    						$result->push($query->find($event_cate->event_id));

    					}
    				}
    			}
    	}
    	return $result;	
    }

    public static function findRequested(){
    	$query = Events::query();
    	
    	//search results based on user input without case sensitive
    	$cates = \Request::input('categories');
    	if($cates!=null){
    		
    	}
    	$query->where(function($q){
	    		$q->where('title','ilike','%'.\Request::input('keywords').'%')
	    				->orWhere('description','ilike','%'.\Request::input('keywords').'%');
    		});
    
    	
    	

    	return $query->paginate(5);
    }
}
