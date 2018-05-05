<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use DB;
use Auth;
use App\SubCategory;
use App\users_subs;
class ProfileController extends Controller
{
    /**
    *  To show user their profile
    *
    *  @return a list of user's details
    */
    public function profileView()
    {
        $data = DB::table('sub_categories')
          ->join('users_subs', 'sub_categories.id', '=', 'sub_id')
          ->where('user_id', '=', Auth::user()->id)
          ->get();

        return view('profile', ['data'=>$data]);
    }

    /**
    * @return view for update form
    *
    */
    public function formView()
    {
        // $data = Category::all();

        // $selected = DB::table('categories')
        //   ->join('users_categories', 'categories.id', '=', 'category_id')
        //   ->where('users_categories.user_id', '=', Auth::user()->id)
        //   ->select('users_categories.*', 'categories.cat_name')
        //   ->get();
           $selected = users_subs::where('user_id','=',Auth::user()->id)->pluck('sub_id')->toArray();
           // dd($selected);
          // dd(array_has($selected,'1'));
        $categories = array(Category::all());
        $subs = SubCategory::all();
        return view('updateDetail', ['selected'=>$selected, 'categories'=>$categories['0'], 'subs'=>$subs]);
    }

    public function update(Request $data)
    {
        $count = $data->input('pref');
        $uid = auth()->user()->id;
        if(count($count)<3){
            return redirect('/updateDetail')->with('minimumSelection','You have to select at least 2 preferences');
        }
        else{
            $test = DB::table('users_subs')->where('user_id','=',$uid)->pluck('id');
            // dd($test);
            foreach($test as $t){
                $result = users_subs::find($t);
                $result->delete();
            }

            // users_subs::destory($test);

            foreach($count as $c){
                $result = new users_subs();
                $result->user_id = $uid;
                $result ->sub_id = $c;
                $result->save();
            }
        }
        
        DB::table('users')
          ->where('id', '=', Auth::user()->id)
          ->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'bio' => $data['bio'],
          ]);
          /*
          DB::table('users_subs')
            ->where('user_id', '=', Auth::user()->id)
            ->delete();

          $inputs = $data['cates'];

<<<<<<< HEAD
          foreach($inputs as $i){
              DB::table('users_subs')
              ->where('user_id', '=', Auth::user()->id)
              ->where('sub_id', '=', $i)
              ->insert([
                ['user_id' => Auth::user()->id, 'sub_id' => $i]
              ]);
          }
*/
        return redirect('/profile');
=======
        return redirect('/profile')->with('message','You have changed your profile');
>>>>>>> master
    }

}
