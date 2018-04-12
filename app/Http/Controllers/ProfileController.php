<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use DB;
use Auth;

class ProfileController extends Controller
{
    /**
    *  To show user their profile
    *
    *  @return a list of user's details
    */
    public function profileView()
    {
        $data = DB::table('categories')
          ->join('users_categories', 'categories.id', '=', 'category_id')
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
        $data = Category::all();

        $selected = DB::table('categories')
          ->join('users_categories', 'categories.id', '=', 'category_id')
          ->where('users_categories.user_id', '=', Auth::user()->id)
          ->select('users_categories.*', 'categories.cat_name')
          ->get();

        return view('updateDetail', ['data'=>$data, 'selected'=>$selected]);
    }

    public function update(Request $data)
    {
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

        DB::table('users_categories')
          ->where('user_id', '=', Auth::user()->id)
          ->delete();

        $inputs = $data['cates'];

        foreach($inputs as $i){
            DB::table('users_categories')
            ->where('user_id', '=', Auth::user()->id)
            ->where('category_id', '=', $i)
            ->insert([
              ['user_id' => Auth::user()->id, 'category_id' => $i]
            ]);
        }

        return redirect('/profile');
    }

}
