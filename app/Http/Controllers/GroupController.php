<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
<<<<<<< HEAD
use App\Groups;
=======
>>>>>>> 438a00eb021c50b203b2af5dfd820b23e2ddfa6c
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

<<<<<<< HEAD
    // post for creating group
    public function store(Request $request){
    		$name = $request->input('group_name');
    		$desc = $request->input('description');
            $allpref = $request->input('pref');
            dd($allpref);
    }
    public function show(){
=======
<<<<<<< HEAD
    public function store(Request $request) {
     	$allpref = $request->input('pref');
		$name = $request->input('group_name');
		$desc = $request->input('description');
=======
    public function storeGroup(Request $data){
      /*DB::table('groups')
        ->insert([
          'title' => $data['group_name'],
          'description' => $data['description'],
        ]);*/
>>>>>>> 9fb14e4d5cb6cba1725bd6ff64c075b966a85e7f

        $name = $data->input('group_name');
        $desc = $data->input('description');
>>>>>>> 438a00eb021c50b203b2af5dfd820b23e2ddfa6c

        $group = new Groups();

        $group->title = $name;
        $group->description = $desc;
        $group->save();
<<<<<<< HEAD

        $group_id = Groups::query()->where('title',$name)->first()->id;

        return redirect('/');
=======
>>>>>>> 438a00eb021c50b203b2af5dfd820b23e2ddfa6c

        return redirect('/createGroup');
    }

    public function show(){


	}

}