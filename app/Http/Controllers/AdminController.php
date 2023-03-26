<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function admin_dashboard(){
    return view('admin.index');

  }

  public function AdminLogin(){
    return view('admin.login');

  }

  public function AdminLogout(Request $request){

    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/admin/login');
  }

 public function ChangePassword(){

        return view('admin.change_password');

    }// End Method

 public function AdminUpdatePassword(Request $request){

      $validateData = $request->validate([
          'oldpassword' => 'required',
          'newpassword' => 'required',
          'confirm_password' => 'required|same:newpassword',

      ]);

      $hashedPassword = Auth::user()->password;
      if (Hash::check($request->oldpassword,$hashedPassword )) {
          $users = User::find(Auth::id());
          $users->password = bcrypt($request->newpassword);
          $users->save();

          $notification = array(
            'message' => 'password update Successfully', 
            'alert-type' => 'success'
        );

          return redirect('/admin/dashboard')->with($notification);
      } else{
         
            $notification = array(
             'message' => 'password update failed', 
              'alert-type' => 'error'
           );
          return redirect()->back()->with($notification);
      }
  }
  public function admin_profile(){
    $id = Auth::user()->id;
    $admindata = User::find($id);
    // dd($admindata);
    return view('admin.admin_profile_view',compact('admindata'));
  }

  public function store_profile(Request $request){
   
    $id = Auth::user()->id;
    $data = User::find($id);
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;

    if ($request->file('photo')) {
       $file = $request->file('photo');

        if (!empty($data->photo)) {
           @unlink(public_path('upload/admin_images/'.$data->photo));
        }

       $filename = date('YmdHi').$file->getClientOriginalName();
       $file->move(public_path('upload/admin_images'),$filename);
       $data['photo'] = $filename;
    }
    $data->save();
    //return redirect()->route('admin.profile');

    $notification = array(
        'message' => 'Admin Profile Updated Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->route('admin.profile')->with($notification);

 
  }

 
}
