<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AdminLoginController extends Controller
{
    public function LoginForm()
    {
        return view('admin.pages.admin.admin_login');
    }

    public function login(Request $request)
    {
        // return $request;
        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->route('dashboard')->with('msg', 'Successfully Log In !');
        }else{
            return redirect()->back()->with('email')->with('msg','wrong Email or Password !');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/')->with('msg','Successfully Log Out !');
    }
}
