<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Category;
use App\users_categories;
use Illuminate\Support\Facades\Auth;
use App\SubCategory;
use App\users_subs;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function store(Request $request){
            $validator = $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
            ]);

          


            $name = session()->put('name',$request['name']);
            $email = session()->put('email',$request['email']);
            $password = session()->put('password',$request['password']);
            

            return redirect()->route('step2');
            
    }

    public function step2(){

        $categories = array(Category::all());
        $subs = SubCategory::all();
        return view('auth.regcate',['categories'=>$categories['0'],'subs'=>$subs]);
    }

    public function store2(Request $request){

        $inputs = $request->input('pref');
        //return dd($inputs);
        //dd($inputs);
        $user = User::create([
            'name' =>session('name'),
            'email' => session('email'),
            'password' => bcrypt(session('password'))
        ]);

        $id = User::where('email',session('email'))->first()->id;

        
        foreach($inputs as $i){
            $users_subs = new users_subs;
            $users_subs->user_id = $id;
            $users_subs->sub_id = $i;
            $users_subs->save();
        }
       
        session()->flush();

        \Illuminate\Support\Facades\Auth::guard($this->getGuard())->login($user);

        return redirect('/');
    }

    public function logout()
    {
        Auth::guard($this->getGuard())->logout();
        
        // request()->session()->flush();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

}
