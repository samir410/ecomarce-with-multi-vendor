<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function UserLogin()
    {
        return view('frontend.pages.login');
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = [
            'message' => 'Logout Successfully',
            'alert-type' => 'info',
        ];

        return redirect('/user/login')->with($notification);
    }

    public function UserRegister()
    {
        return view('frontend.pages.register');
    }

    public function ResetPassword()
    {
        return view('frontend.pages.forget-password');
    }

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('frontend.pages.user-profile', compact('userData'));
    }

    public function store_profile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');

            if (! empty($data->photo)) {
                @unlink(public_path('upload/user_images/'.$data->photo));
            }

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        //return redirect()->route('admin.profile');

        $notification = [
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('user.profile')->with($notification);

        //return redirect()->route('admin.profile');
    }
}
