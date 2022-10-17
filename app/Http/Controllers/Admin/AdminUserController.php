<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * show user dashboard page
     */
    public function index()
    {
        $user_data= AdminUser::latest()->get();
        return view('admin.pages.index', compact('user_data'));
    }

    /**
     * show user registration page
     */
    public function userRegisterPage()
    {
        return view('admin.pages.register');
    }

    /**
     * store data for a new user
     */
    public function userRegister(Request $request)
    {
        $this->validate($request, [
            'name'                              =>'required',
            'email'                             =>'required',
            'password'                          =>'required|confirmed',
            'password_confirmation'             =>'required',
        ]);

        AdminUser::create([
            'name'                  =>$request->name,
            'email'                 =>$request->email,
            'password'              =>Hash::make($request->password),
        ]);
        return back()->with('success', 'Your registration is successfull. Wait for approvel');
    }

    /**
     * user status update
     */

    public function userstatusUpdate($id)
    {
        $update_id= AdminUser::findOrFail($id);
        $update_id->update([
            'status'        =>true
        ]);
        return redirect()->route('admin.user.dashboard')->with('success', 'The approvel has been done');
    }

    /**
     * delete a user data
     */
    public function destroy($id)
    {
        $delete_id= AdminUser::findOrFail($id);
        $delete_id->delete();
        return back()->with('The user data has been Deleted');
    }


 
    


}
