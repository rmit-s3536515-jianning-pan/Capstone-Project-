<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
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
        return view('profile');
    }

    /**
    * @return view for update form
    *
    */
    public function formView()
    {
        return view('updateDetail');
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
          return redirect('/profile');
    }

}
