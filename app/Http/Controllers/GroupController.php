<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\SubCategory;
class GroupController extends Controller
{
    //
    public function create(){
    	$categories = array(Category::all());
        $subs = SubCategory::all();
        // dd($categories);
    	return view('group.create',['categories'=>$categories['0'], 'subs'=>$subs]);
    }

    public function show(){

    }


}
