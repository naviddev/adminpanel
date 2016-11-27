<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
    protected $username = 'username';
    protected $redirectTo = '/admin';
    protected $guard = 'admin';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout','getLogout']);
    }
    public function register()
    {
return abort(404);
    }

    public function showLoginForm(){

        if(view()->exists('auth.authenticate')){
            return view('auth.authenticate');
        }
        return view('admin.auth.login');
    }
    
    public function showRegistrationForm(){

        return abort(404);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        return Validator::make($data, [
//            'username' => 'required|max:255|unique:admins,username',
//            'FName' => 'required|max:255',
//            'LName' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:admins,email',
//            'password' => 'required|min:6|confirmed',
//        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        return Admin::create([
//            'username' => $data['username'],
//            'SuperAdmin' => 0,
//            'FName' => $data['FName'],
//            'LName' => $data['LName'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
    }
    public function getLogout()
    {
        $cookie = \Cookie::forget('remember me');
        $this->auth->logout();
        Session::flush();
        return redirect('/')->withCookie($cookie);
    }
}
