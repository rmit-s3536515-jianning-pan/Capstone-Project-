<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;
use App\groups_subs;
use App\Groups;
use App\Category; // getting the data
use Illuminate\Support\Collection;
use DB;
class Groups extends Model
{

    public $timestamps = false;
    protected $fillable = ['group_name', 'description'];

    public static function getGroupsWithEachCategory($groupname){
    	$cates = SubCategory::all()->toArray();
        $group_sub = groups_subs::all()->toArray();
        $id = Category::where('cat_name','like',$groupname)->first()->id;//get the id of cate
         $options=[
                'id'=> 'id',
                'threshold' =>0.2,
              'keys' =>[
                "cate_id"
            ]
        ];

        $fuse = new \Fuse\Fuse($cates,$options);
        $result = $fuse->search($id);//get all the sub id with this category
        // dd($result);
         $options=[
                'id'=>'group_id',
                'threshold' =>0.2,
              'keys' =>[
                "sub_id"
            ]
        ];

        $groupids = array();
        $fuse = new \Fuse\Fuse($group_sub,$options);
        foreach($result as $eachsubid){
                $searchresult = $fuse->search($eachsubid);
                // dd($searchresult);
                array_push($groupids,$searchresult);
        }
        // dd($groupids['0']);
        $output = array();
        $options=[

                'threshold' =>0.2,
              'keys' =>[
                "id"
            ]
        ];
        $group = Groups::all()->toArray();
         $fuse = new \Fuse\Fuse($group,$options);
        foreach($groupids['0'] as $gid){
                $searchresult = $fuse->search($gid);
                array_push($output,$searchresult['0']);
        }
        // dd($output);
        return $output;
    }

    //it shows group list without owner group and joined group
    public static function getListedGroups(){
         
         $joinedGroup = DB::table('groups_users')->where('user_id','=',auth()->user()->id)->pluck('group_id');
         
         $tasks = DB::table('groups')->where('owner_id','!=',auth()->user()->id)->whereNotIn('id',$joinedGroup)->get();

         return $tasks;
    }
}
