<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req) 
      {
        Session::put('LoginUsername',$req->username);
        $input = $req->all();
        $login = User::where('username',$req->username)->first();
        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])) || $login)
         {
            if(Hash::check($req->password,$login->password)) {
                return redirect()->route('home');
            } else {
                return redirect()->route('login')
                ->with('errors','Username or Password is Incorrect.');
            }
        }
         else {
            return redirect()->route('login')
            ->with('errors','No Credentials found');
        }
    }
}
