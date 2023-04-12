<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class VendorController extends Controller
{
    public function vendor_dashboard()
    {
        return view('vendor.index');
    }

    public function VendorLogin()
    {
        return view('vendor.login');
    }

    public function VendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }

    public function ChangePassword()
    {
        return view('vendor.change_password');
    }// End Method

    public function VendorUpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            $notification = [
                'message' => 'password update Successfully',
                'alert-type' => 'success',
            ];

            return redirect('/vendor/dashboard')->with($notification);
        } else {
            $notification = [
                'message' => 'password update failed',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

      public function vendor_profile()
      {
          $id = Auth::user()->id;
          $vendorData = User::find($id);
          // dd($admindata);
          return view('vendor.vendor_profile', compact('vendorData'));
      }

      public function store_profile(Request $request)
      {
          $id = Auth::user()->id;
          $data = User::find($id);
          $data->name = $request->name;
          $data->email = $request->email;
          $data->phone = $request->phone;
          $data->address = $request->address;
          $data->vendor_join = $request->vendor_join;
          $data->vendor_short_info = $request->vendor_short_info;

          if ($request->file('photo')) {
              $file = $request->file('photo');

              if (! empty($data->photo)) {
                  @unlink(public_path('upload/vendor_images/'.$data->photo));
              }

              $filename = date('YmdHi').$file->getClientOriginalName();
              $file->move(public_path('upload/vendor_images'), $filename);
              $data['photo'] = $filename;
          }
          $data->save();
          //return redirect()->route('admin.profile');

          $notification = [
              'message' => 'vendor Profile Updated Successfully',
              'alert-type' => 'success',
          ];

          return redirect()->route('vendor.profile')->with($notification);
      }

    public function BecomeVendor()
    {
        return view('vendor.includes.vendor_register');
    } // End Mehtod

    public function VendorRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'vendor_join' => 'required|digits:4|integer|min:2010|max:'.(date('Y') + 1),

        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'vendor_join' => $request->vendor_join,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

        $notification = [
            'message' => 'Vendor Registered Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('vendor.login')->with($notification);
    }// End Mehtod
}
