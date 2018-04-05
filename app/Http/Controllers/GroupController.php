<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
class GroupController extends Controller
{
    //
    public function create(){
    	$categories = Category::all();
    	return view('group.create',['cates' =>$categories]);
    }

    public function show(){

    }


}
