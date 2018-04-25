<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Groups;
use App\Category;
use App\SubCategory;
class GroupController extends Controller
{

	public function index()
	{
	    $tasks = groups::all();

	    return view('group.show')->withTasks($tasks);
	}


    //
    public function create(){
    	$categories = array(Category::all());
        $subs = SubCategory::all();
        // dd($categories);
    	return view('group.create',['categories'=>$categories['0'], 'subs'=>$subs]);
    }

    public function store(Request $request) {
     	$allpref = $request->input('pref');
		$name = $request->input('group_name');
		$desc = $request->input('description');

        $group = new Groups();

        $group->title = $name;
        $group->description = $desc;
        $group->save();

        $group_id = Groups::query()->where('title',$name)->first()->id;

        return redirect('/');

    }

    public function show(){


	}

}