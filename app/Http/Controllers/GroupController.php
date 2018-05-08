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
use App\groups_users;
use App\groups_reports;
use App\User;
class GroupController extends Controller
{

    public function index()
    {
        $tasks = Groups::getListedGroups();

        return view('group.show')->withTasks($tasks);
    }

    public function create(){
       $categories = array(Category::all());
       $subs = SubCategory::all();
       // dd($categories);
         return view('group.create',['categories'=>$categories['0'], 'subs'=>$subs]);
    }

    public function storeGroup(Request $data){
        $userID = Auth::user()->id;
        $name = $data->input('group_name');
        $desc = $data->input('description');
                $allpref = $data->input('pref');
        $group = new Groups();
        $group->title = $name;
        $group->description = $desc;

        $group->owner_id = $userID;

        $group->owner_id = auth()->user()->id;

        $group->save();
        $group_id = Groups::query()->where('title',$name)->first()->id;
                foreach($allpref as $pref){
                        $groups_subs = new groups_subs;
                        $groups_subs->group_id = $group_id;
                        $groups_subs->sub_id = $pref;
                        $groups_subs->save();
                }

        return redirect('/')->with('message','You have created new group!');

    }

    public function join($groupid){


            $group = Groups::findOrFail($groupid)->toArray();
            $attends = groups_users::where('group_id',$groupid)->where('user_id',auth()->user()->id)->get();

            $attend = 0;
            if($attends->isEmpty()){
                $attend = 0;
            }
            else{
                $attend = 1;
            }

            $ownerId = Groups::where('id',$groupid)->first()->owner_id;
            // dd($ownerId);
            $owner = User::where('id',$ownerId)->first();
        
        return view('group.join',['group'=>$group, 'attend'=>$attend,'owner'=>$owner]);

    }

    public function joingroup($groupid){
            $id = auth()->user()->id;
        $attend = new groups_users();
        $attend->user_id = $id;
        $attend->group_id = $groupid;
        $attend->save();
        return redirect('group/'.$groupid)->with('message','You have joined this GROUP');
    }

    public function leavegroup($groupid){
         $id = auth()->user()->id;
        $leave = groups_users::where('group_id',$groupid)->where('user_id',$id);
        $leave->delete();
        return redirect('group/'.$groupid)->with('message','You have left this GROUP');
    }

     public function reportGroup($groupid,Request $request){
        $text = $request->input('report');
        // dd($text);
        if($text!=null){
             $report = new groups_reports();
            $report->group_id = $groupid;
            $report->user_id = auth()->user()->id;
            $report->report = $text;
            $report->save();
        }
       

        return redirect('group/'.$groupid)->with('message','You have just reported this Group');
    }
}
