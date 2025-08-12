<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\About;

class AboutController extends Controller
{
    public function viewAbout() 
    {
       $data['countAbout'] = About::count();
       // dd($data['countAbout']);
       $data['alldata'] = About::all();

         return view('admin.about.view-about',$data);
    }


    public function addAbout()
    {

         return view('admin.about.add-about');
    }





    public function storeAbout(Request $request)
    {

       $data = new About();

       $data->description = $request->description;
       $data->created_by = Auth::user()->id;

        $data->save();

         return redirect()->route('abouts.view')->with('success','Data Insert Successfully');
    }



    public function editAbout($id)
    {
       $edit_about = About::find($id);

         return view('admin.about.edit-about',compact('edit_about'));
    }



    public function updateAbout(Request $request, $id)
    {
       $data = About::find($id);

       $data->description = $request->description;
       $data->updated_by = Auth::user()->id;
        $data->save();
       return redirect()->route('abouts.view')->with('success','Data Update Successfully');
    }





    public function deleteAbout($id)
    {
       $about = About::find($id);

       $about->delete();
         return redirect()->route('abouts.view')->with('success','Data Delete Successfully');
    }
}
