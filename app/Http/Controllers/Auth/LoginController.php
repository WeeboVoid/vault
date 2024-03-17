<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Add this line
use Illuminate\Support\Facades\Auth; // Add this line
use Illuminate\Support\Facades\DB; // Add this line

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
    protected $redirectTo = '/login-masterPassword'; // Master Password Page

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function username()
    // {
    //     $emailInput = request()->input('email');
    //     return 'email';
    // }


    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        return view('login-masterPassword'); // it should be enter master password page
    }

    public function logout(Request $request) {
        $user = Auth::user();
        DB::table('users')->where('id', $user->id)->update(['master_password_set' => 0]);
        Auth::logout();
        return redirect('/login');
      }


      
    
}
