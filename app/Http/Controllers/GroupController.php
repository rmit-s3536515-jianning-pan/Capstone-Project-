<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\SubCategory;
use App\Groups;
use DB;
use Auth;

class GroupController extends Controller
{
    //
    public function createGroup(){
    	 $categories = array(Category::all());
       $subs = SubCategory::all();
       // dd($categories);
    	 return view('group.create',['categories'=>$categories['0'], 'subs'=>$subs]);
    }

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

        return redirect('/createGroup');
    }


}
