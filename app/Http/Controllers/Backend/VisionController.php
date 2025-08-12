<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Vision;

class VisionController extends Controller
{
    
     public function viewVision()
    {
       $data['countVision'] = Vision::count();
       $data['alldata'] = Vision::all();

         return view('admin.vision.view-vision',$data);
    }




    public function addVision()
    {

         return view('admin.vision.add-vision');
    }





    public function storeVision(Request $request)
    {

       $data = new Vision();

       $data->title = $request->title;
       $data->created_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_images'),$filename);
            $data['image']= $filename;
        }

        $data->save();

         return redirect()->route('visions.view')->with('success','Data Insert Successfully');
    }



    public function editVision($id)
    {
       $edit_vision = Vision::find($id);

         return view('admin.vision.edit-vision',compact('edit_vision'));
    }



    public function updateVision(Request $request, $id)
    {
       $data = Vision::find($id);

       $data->title = $request->title;
       $data->updated_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/vision_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_images'),$filename);
            $data['image']= $filename;
        }
        $data->save();
       return redirect()->route('visions.view')->with('success','Data Update Successfully');
    }





    public function deleteVision($id)
    {
       $vision = Vision::find($id);

       if (file_exists('public/upload/vision_images/' . $vision->image) AND ! empty($vision->image)) {
          
          unlink('public/upload/vision_images/' . $vision->image);
       }
       $vision->delete();
         return redirect()->route('visions.view')->with('success','Data Delete Successfully');
    }


}
