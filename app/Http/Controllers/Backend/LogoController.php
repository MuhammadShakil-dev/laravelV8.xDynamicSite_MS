<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Logo;

class LogoController extends Controller
{
    

    public function viewLogo()
    {
       $data['countLogo']= Logo::count();
       // dd($data['countLogo']);
       $data['alldata'] = Logo::all();

         return view('admin.logo.view-logo',$data);
    }




    public function addLogo()
    {

         return view('admin.logo.add-logo');
    }





    public function storeLogo(Request $request)
    {

       $data = new Logo();

       $data->created_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'),$filename);
            $data['image']= $filename;
        }

        $data->save();

         return redirect()->route('logos.view')->with('success','Data Insert Successfully');
    }



    public function editLogo($id)
    {
       $edit_logo = Logo::find($id);

        // dd($editData);

         return view('admin.logo.edit-logo',compact('edit_logo'));
    }



    public function updateLogo(Request $request, $id)
    {
       $data = Logo::find($id);

       $data->updated_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/logo_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'),$filename);
            $data['image']= $filename;
        }
        $data->save();
       return redirect()->route('logos.view')->with('success','Data Update Successfully');
    }





    public function deleteLogo($id)
    {
       $logo = Logo::find($id);

       if (file_exists('public/upload/logo_images/' . $logo->image) AND ! empty($logo->image)) {
          
          unlink('public/upload/logo_images/' . $logo->image);
       }
       $logo->delete();
         return redirect()->route('logos.view')->with('success','Data Delete Successfully');
    }


}
