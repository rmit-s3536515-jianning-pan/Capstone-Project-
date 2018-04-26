<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Groups;

use App\Category;
use App\SubCategory;
use App\Groups;
use DB;
use Auth;

class GroupController extends Controller
{

	public function index()
	{
	    $tasks = groups::all();

	    return view('group.show')->withTasks($tasks);
	}


    //
    public function createGroup(){
    	 $categories = array(Category::all());
       $subs = SubCategory::all();
       // dd($categories);
    	 return view('group.create',['categories'=>$categories['0'], 'subs'=>$subs]);
    }


    // post for creating group
    public function store(Request $request){
    		$name = $request->input('group_name');
    		$desc = $request->input('description');
            $allpref = $request->input('pref');
            dd($allpref);
    }
    public function show(){

    public function store(Request $request) {
     	$allpref = $request->input('pref');
		$name = $request->input('group_name');
		$desc = $request->input('description');

    public function storeGroup(Request $data){
      /*DB::table('groups')
        ->insert([
          'title' => $data['group_name'],
          'description' => $data['description'],
        ]);*/

        $name = $data->input('group_name');
        $desc = $data->input('description');


        $group = new Groups();

        $group->title = $name;
        $group->description = $desc;
        $group->save();


        $group_id = Groups::query()->where('title',$name)->first()->id;

        return redirect('/');


        return redirect('/createGroup');
    }

    public function show(){


	}

}