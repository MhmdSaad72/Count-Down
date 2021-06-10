<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function forgetLoginForm()
    {
      return view('auth.login-alt');
    }

    public function login(Request $request)
    {

      if ($request->security_key) {
        $request->validate([
          'security_key' => 'required'
        ]);
      }else {
        $request->validate([
          'username' => 'required',
          'password' => 'required',
        ]);
      }

        $username = $request->username ?? null;
        $password = $request->password ?? null;
        $security_key = $request->security_key ?? null;
        $user = \App\Models\User::where('security_key' , $security_key)->first();

        // dd($password);

        if (Auth::attempt(['email' => $username , 'password' => $password , 'role' => 1]) || Auth::attempt(['user_name' => $username , 'password' => $password , 'role' => 1])) {
            return redirect('/dashboard')->withSuccess('Signed in');
        }elseif ($user) {
          Auth::login($user);
          return redirect('/dashboard')->withSuccess('Signed in');
        }

        return redirect()->back()->withSuccess('Login details are not valid');
    }

    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }
}
