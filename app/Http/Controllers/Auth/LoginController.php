<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;


    protected $redirectTo = '/home';

    public function login(Request $request)
    {
        if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->route('account')->with('msg', 'Successfully Log In !');
        }else{
            return redirect()->back()->with('email')->with('msg','wrong Email or Password !');
        }
    }
    public function login2(Request $request)
    {
        if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->route('frontend-room')->with('msg', 'Successfully Log In !');
        }else{
            return redirect()->back()->with('email')->with('msg','wrong Email or Password !');
        }
    }






    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('/')->with('msg','Successfully Log Out !');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
