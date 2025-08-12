<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{


    public function viewProfile()
    {
    	$U_id = Auth::user()->id;
    	$user = User::find($U_id);

    	// dd($user);

    	return view('admin.user.view-profile',compact('user'));
    }


    public function editProfile()
    {
    	$U_id = Auth::user()->id;
    	$editData = User::find($U_id);

    	// dd($user);

    	return view('admin.user.edit-profile',compact('editData'));
    }


    public function updateProfile(Request $request)
    {
    	$data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile; 
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('image')) {
        	$file = $request->file('image');
        	@unlink(public_path('upload/user_images/'.$data->image));
        	$filename = date('YmdHi').$file->getClientOriginalName();
        	$file->move(public_path('upload/user_images'),$filename);
        	$data['image']= $filename;
        }

        $data->save();

         return redirect()->route('profiles.view');
    }



    public function passwordView()
    {

    	return view('admin.user.edit-password');
    }



     public function passwordUpdate(Request $request)
    {

    	if (Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])) {
    	 	  // dd('okay');
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('success','Password changed successfully');

    	 } else{
            // dd('error');
    	 	return redirect()->back()->with('error','Sorry! your current password dos not match');
    	 }
    	// return view('admin.user.edit-password');
    }

}
