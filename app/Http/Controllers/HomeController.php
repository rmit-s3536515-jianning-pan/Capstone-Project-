<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category; // getting the data 
use App\Events;
use App\SubCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /* home page*/
    public function welcome(){
        $categories = array(Category::all());
        // dd(gettype($categories));
        $subs = SubCategory::all();
        // dd($categories);
        
        $relatedEvents = Events::findInterestedCategory();
        
        $relatedEvents = $relatedEvents->toArray();
        $relatedEvents = $relatedEvents['data'];
        

        return view('welcome',['categories' =>$categories['0'],'event'=>$relatedEvents,'subs'=>$subs]);
    }

    public function admin(){
        return view('admin.administration');
    }
}
