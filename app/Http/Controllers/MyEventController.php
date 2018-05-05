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
    $own = DB::table('events')
      ->where('owner_id', '=', Auth::user()->id)
      ->select('events.*')
      ->get();

    $joined = DB::table('events')
      ->join('events_users', 'events.id', '=', 'event_id')
      ->where('events_users.user_id', '=', Auth::user()->id)
      ->select('events_users.*','events.*')
      ->get();

    return view('myEvent', ['own'=>$own , 'joined'=>$joined]);
  }

  public function leaveEvent($event_id)
  {
    DB::table('events_users')
      ->where('user_id', '=', Auth::user()->id)
      ->where('event_id', '=', $event_id)
      ->delete();

      return redirect(route('myEvent'));
  }

  public function updateEvent(Request $data) {

    DB::table('events')
      ->where('id', '=', $data['id'])
      ->update([
        'title' => $data['title'],
        'start_date' => $data['start_date'],
        'start_time' => $data['start_time'],
        'max_attend' => $data['max_attend'],
        'description' => $data['description'],
      ]);

      return redirect('/myEvent');
  }

  public function deleteEvent($id)
  {
    DB::table('events')
      ->where('owner_id', '=', Auth::user()->id)
      ->where('id', '=', $id)
      ->delete();

      return redirect(route('myEvent'));
  }

}
