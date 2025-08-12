<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Slider;

class SliderController extends Controller
{
    
    public function viewSlider()
    {
       $data['alldata'] = Slider::all();

         return view('admin.slider.view-slider',$data);
    }




    public function addSlider()
    {

         return view('admin.slider.add-slider');
    }





    public function storeSlider(Request $request)
    {

       $data = new Slider();

       $data->short_title = $request->short_title;
       $data->long_title = $request->long_title;
       $data->created_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'),$filename);
            $data['image']= $filename;
        }

        $data->save();

         return redirect()->route('sliders.view')->with('success','Data Insert Successfully');
    }



    public function editSlider($id)
    {
       $edit_slider = Slider::find($id);

         return view('admin.slider.edit-slider',compact('edit_slider'));
    }



    public function updateSlider(Request $request, $id)
    {
       $data = Slider::find($id);

       $data->short_title = $request->short_title;
       $data->long_title = $request->long_title;
       $data->updated_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/slider_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/slider_images'),$filename);
            $data['image']= $filename;
        }
        $data->save();
       return redirect()->route('sliders.view')->with('success','Data Update Successfully');
    }





    public function deleteSlider($id)
    {
       $slider = Slider::find($id);

       if (file_exists('public/upload/slider_images/' . $slider->image) AND ! empty($slider->image)) {
          
          unlink('public/upload/slider_images/' . $slider->image);
       }
       $slider->delete();
         return redirect()->route('sliders.view')->with('success','Data Delete Successfully');
    }


}
