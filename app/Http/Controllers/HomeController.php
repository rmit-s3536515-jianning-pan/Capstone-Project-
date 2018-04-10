<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category; // getting the data 
use App\Events;

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
        $categories = Category::all();
        // $events = Events::all();
        $relatedEvents = Events::findInterestedCategory();
        
        $relatedEvents = $relatedEvents->toArray();
        $relatedEvents = $relatedEvents['data'];
        // dd($relatedEvents);
        // print_r($relatedEvents["title"]);
        // print_r($relatedEvents['0']["title"]);

        return view('welcome',['categories' =>$categories,'event'=>$relatedEvents]);
    }
}
