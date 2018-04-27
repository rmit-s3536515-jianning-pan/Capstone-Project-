<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\SubCategory;
use App\Groups;
use App\groups_subs;
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
    public function create(){
         $categories = array(Category::all());
       $subs = SubCategory::all();
       // dd($categories);
         return view('group.create',['categories'=>$categories['0'], 'subs'=>$subs]);
    }
    // post for creating group
    public function store(Request $request){
            $name = $request->input('group_name');
            $desc = $request->input('description');
            $allpref = $request->input('pref');
            // dd($allpref);
    }
 
    public function storeGroup(Request $data){
        $name = $data->input('group_name');
        $desc = $data->input('description');
                $allpref = $data->input('pref');
        $group = new Groups();
        $group->title = $name;
        $group->description = $desc;
        $group->save();
        $group_id = Groups::query()->where('title',$name)->first()->id;
                foreach($allpref as $pref){
                        $groups_subs = new groups_subs;
                        $groups_subs->group_id = $group_id;
                        $groups_subs->sub_id = $pref;
                        $groups_subs->save();
                }
        return redirect('/createGroup');
    }
}