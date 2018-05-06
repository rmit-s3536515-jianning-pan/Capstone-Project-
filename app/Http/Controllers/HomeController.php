<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category; // getting the data 
use App\Events;
use App\SubCategory;
use App\groups_subs;
use App\Groups;
use App\events_subs;
use App\users_subs;
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
        return view('index');
    }

    /* home page*/
    public function welcome(){
        $categories = array(Category::all());
        // dd(gettype($categories));
        $subs = SubCategory::all();
        // dd($categories);
        
        $relatedEvents = Events::findInterestedCategory();
        // dd($relatedEvents);
        // $relatedEvents = $relatedEvents->toArray();
        // $relatedEvents = $relatedEvents['data'];
        

        return view('welcome',['categories' =>$categories['0'],'event'=>$relatedEvents,'subs'=>$subs]);
    }

    public function admin(){
        return view('admin.administration');
    }

    public function addParentName(Request $request){

            $id =Category::all()->last();
            if($id==null){
                $id = 1;
            }
            else{
                $id = $id->id + 1;
            }
            
            

            $name = $request->input('catname');
            $exist = Category::where('cat_name','ilike',$name)->first();
            if($exist==null){
                     $cate = new Category();
                    $cate->id = $id;
                    $cate->cat_name= $name;
                    $cate->save();
                    
                    return redirect('/admin/preferences')->with('parentMessage','You added Parent Name to the database');
            }
            else{
                    return redirect('/admin/preferences')->with('parentErrorMessage','You failed to add Parent Name to the database, It may be that you try to add same data to the database');
            }
           
    }

    public function addChildName(Request $request){

            $catid = $request->input('category');
            if($catid==null){
                 return redirect('/admin/preferences')->with('childErrorMessage','No parent category is selected or no parent name is in the databse!! Add the parent CATEGORY FIRST!!');
            }
   
             $id = SubCategory::all()->last();
            if($id==null){
                $id = 1;
            }
            else{
                 $id = $id->id + 1;
            }

            $name = $request->input('childname');
            $exist = SubCategory::where('name','ilike',$name)->first();
            
            if($exist==null){
                 $cate = new SubCategory();
                $cate->id = $id;
                $cate->cate_id= $catid;
                $cate->name = $name;
                $cate->save();
                
                return redirect('/admin/preferences')->with('childMessage','You added Child Name to the database');
            }
            else{
                return redirect('/admin/preferences')->with('childErrorMessage','You failed to add Child Name to the database, It may be that you try to add same data to the database');
            }      
    }

    public function deleteParentName(Request $request){

            $id = $request->input('deleteCategory');
             $exist = SubCategory::where('cate_id','=',$id)->pluck('id')->toArray(); //check the sub category for the main category
            
           
            //because if delete parent , need to all other related table 
            foreach($exist as $e){
                $result = SubCategory::where('id','=',$e);
                $result->delete();
            }
            //delete user with subs 
            foreach($exist as $e){
                $result = users_subs::where('sub_id','=',$e);
                $result->delete();
            }
            //delete group subs 
             foreach($exist as $e){
                $result = groups_subs::where('sub_id','=',$e);
                $result->delete();
            }
            //delte relevant event subs
            foreach($exist as $e){
                $result = events_subs::where('sub_id','=',$e);
                $result->delete();
            }
            Category::destroy($id);
           
            return redirect('/admin/preferences')->with('parentDeleteMessage','You deleted Parent Name from the database');
           
    }

    public function deleteChildName(Request $request){

            $id = $request->input('deleteChild');
            SubCategory::destroy($id);
             $result = events_subs::where('sub_id','=',$id);
                $result->delete();
            $result = users_subs::where('sub_id','=',$id);
                $result->delete();
             $result = groups_subs::where('sub_id','=',$id);
                $result->delete();
                
            return redirect('/admin/preferences')->with('childDeleteMessage','You deleted Child Name from the database');
           
    }
    public function showGroups($groupname){
       $output = Groups::getGroupsWithEachCategory($groupname);
       
        // dd($output);
        return view('grouplist',['items'=>$output , 'name'=>$groupname]);
    }
}
