<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Groups;
use DB;
use Auth;
use App\groups_users;

class MyGroupController extends Controller
{

  public function showGroupList()
  {
    $own = DB::table('groups')
      ->where('owner_id', '=', Auth::user()->id)
      ->select('*')
      ->get();

    $data = DB::table('groups')
      ->join('groups_users', 'groups.id', '=', 'group_id')
      ->where('groups_users.user_id', '=', Auth::user()->id)
      ->select('groups_users.*','groups.title')
      ->get();

    return view('myGroup', ['own'=>$own ,'joined'=>$data]);
  }

  public function showGroups($groupname){
     $output = Groups::getGroupsWithEachCategory($groupname);

      // dd($output);
      return view('grouplist',['items'=>$output , 'name'=>$groupname]);
  }

  public function leaveGroup($group_id)
  {
    DB::table('groups_users')
      ->where('user_id', '=', Auth::user()->id)
      ->where('group_id', '=', $group_id)
      ->delete();

      return redirect(route('myGroup'));
  }

  public function updateGroup(Request $data) {

    DB::table('groups')
      ->where('id', '=', $data['id'])
      ->update([
        'title' => $data['title'],
        'description' => $data['description'],
      ]);

      return redirect('/myGroup');
  }

  public function deleteGroup($id)
  {
    DB::table('groups')
      ->where('owner_id', '=', Auth::user()->id)
      ->where('id', '=', $id)
      ->delete();

      return redirect(route('myGroup'));
  }
  
}
