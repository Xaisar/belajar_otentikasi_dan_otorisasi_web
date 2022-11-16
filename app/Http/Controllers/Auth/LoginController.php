<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
    public function index() {
        if ($user = Auth::user()){
            if ($user->level == 'admin'){
                return redirect()->intended('admin');
            } else if ($user->level == 'pengguna'){
                return redirect()->intended('pengguna');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request) {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
            );

            $kredensil = $request->only('username','password');

            if (Auth::attempt($kredensil)){
                $user = Auth::user();
                if ($user->level == 'admin') {
                    return redirect()->intended('admin');
                } else if ($user->level == 'pengguna') {
                    return redirect()->intended('pengguna');
                }
                return redirect()->intended('/');
            }
        
            return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'these credentials do not match our records']);
    }
}
