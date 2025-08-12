<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{


     public function viewUser()
    {
       $data['alldata'] = User::all();

        // dd($alldata->toArray());

         return view('admin.user.view-user',$data);
    }




    public function addUser()
    {
       // $data['alldata'] = User::all();

        // dd('okay');

         return view('admin.user.add-user');
    }





    public function storeUser(Request $request)
    {
       $this->validate($request,[

        'name'=>'required',
        'email'=>'required|unique:users,email',
       ]);


       $data = new User();

        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

         // return redirect()->route('users.view');
         return redirect()->route('users.view')->with('success','Data Insert Successfully');
    }



    public function editUser($id)
    {
       $editData = User::find($id);

        // dd($editData);

         return view('admin.user.edit-user',compact('editData'));
    }



    public function updateUser(Request $request, $id)
    {
       $data = User::find($id);

        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

         // return redirect()->route('users.view');
       return redirect()->route('users.view')->with('success','Data Update Successfully');
    }





    public function deleteUser($id)
    {
       $user = User::find($id);

       if (file_exists('public/upload/user_images/' . $user->image) AND ! empty($user->image)) {

       	  unlink('public/upload/user_images/' . $user->image);
       }
       $user->delete();
        // return redirect()->route('users.view');
         return redirect()->route('users.view')->with('success','Data Delete Successfully');
    }
}
