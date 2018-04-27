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
               'includeScore' =>true,
                'threshold' =>0.5,
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
      
        }
        
        return $result;
    }
    // find the result based on the keywords and category
    public static function findRequested(){
    	//search results based on user input without case sensitive
      $subs = \Request::input('subs');
        
      $re = Events::all()->toArray();
    	$events_cates = events_subs::all()->groupBy('event_id')->toArray();

    $options=[
          'includeScore' =>true,
          'threshold' =>0.5,
          'keys' =>[
            "title","description"
        ]
    ];
       
      $fuse = new \Fuse\Fuse($re,$options);
      $searchresult = $fuse->search(\Request::input('keywords'));//return the match with keywords
      $result = array(); //to store the id that matches with sub category
       $last = array(); //return the final array without duplicate 
      // below code that remove duplicate event 

      if(!empty($subs)){ //check if the search by sub category is selected or not, if selected , run below code
          foreach($searchresult as $eid){
                $id = $eid['item']['id'];
              foreach($events_cates as $eachevents){
                   $count = 0;
                   $eventid = $eachevents['0']['event_id'];
                  foreach($eachevents as $eventsub){
                       
                        if(in_array($eventsub['sub_id'], $subs)){
                            $count = $count + 1;
                        }
                       
                  }

                  if($count == count($subs) && $eventid ==$id){
                        // dd($eachevents);
                        array_push($result, $eventid);
                        // dd(key($events_cates));
                  }

              }
          }
         
            foreach($result as $e){
                foreach($searchresult as $s){
                  if($s['item']['id'] ==$e){
                      array_push($last,$s);

                  }
                }
            }
            return $last;
    	}
      else{ //if the sub category is not selected , run below code
        return $searchresult;
      }
    	
    }
}
