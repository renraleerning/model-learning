<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
        $this->middleware('guest')->except('logout', 'userLogout');
    }

    public function index(){
        if (Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.user_login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string|min:1',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($login))
        {            
            if(Auth::user()->roles == 'siswa')
            {
                return redirect()->intended(route('dashboard'));
            }
            else
            {
                return redirect()->intended(route('guru.dashboard'));
            }            
        }

        return redirect()->back()->withInput($request->only('username','remember'));
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
