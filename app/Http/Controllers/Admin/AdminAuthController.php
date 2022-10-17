<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * show login page
     */
    public function userLoginPage()
    {
        return view('admin.pages.login');
    }

    /**
     * user login process
     */
    public function userLoginProcess(Request $request)
    {
        $this->validate($request, [
            'email'         =>'required',
            'password'      =>'required',
        ]);
       if (Auth::guard('admin')->attempt([
        'email'             =>$request->email,
        'password'          =>$request->password,
       ])) {
        if (Auth::guard('admin')->user()->status) {
            return redirect()->route('admin.user.dashboard');
        } else {
            return back()->with('success', 'Your accound is under process. Please wait for approvel');
        }
        
        
       }else {
        return back()->with('success', 'Wrong email or password');
       }
    }

    /**
     * logout process
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.user.login');
    }


    
}
