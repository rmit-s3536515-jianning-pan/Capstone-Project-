<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Events;
use App\events_users;
use DB;
use Auth;

class MyEventController extends Controller
{

  public function showEventList()
  {

    $data = DB::table('events')
      ->join('events_users', 'events.id', '=', 'event_id')
      ->where('events_users.user_id', '=', Auth::user()->id)
      ->select('events_users.*','events.*')
      ->get();

    return view('myEvent', ['data'=>$data]);
  }

  public function leaveEvent($event_id)
  {
    DB::table('events_users')
      ->where('user_id', '=', Auth::user()->id)
      ->where('event_id', '=', $event_id)
      ->delete();

      return redirect(route('myEvent'));
  }
}
