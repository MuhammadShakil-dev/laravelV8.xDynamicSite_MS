<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Mission;

class MissionController extends Controller
{


     public function viewMission()
    {
       $data['countMission'] = Mission::count();
       $data['alldata'] = Mission::all();

         return view('admin.mission.view-mission',$data);
    }




    public function addMission()
    {

         return view('admin.mission.add-mission');
    }





    public function storeMission(Request $request)
    {

       $data = new Mission();

       $data->title = $request->title;
       $data->created_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_images'),$filename);
            $data['image']= $filename;
        }

        $data->save();

         return redirect()->route('missions.view')->with('success','Data Insert Successfully');
    }



    public function editMission($id)
    {
       $edit_mission = Mission::find($id);

         return view('admin.mission.edit-mission',compact('edit_mission'));
    }



    public function updateMission(Request $request, $id) 
    {
       $data = Mission::find($id);

       $data->title = $request->title;
       $data->updated_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/mission_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_images'),$filename);
            $data['image']= $filename;
        }
        $data->save();
       return redirect()->route('missions.view')->with('success','Data Update Successfully');
    }





    public function deleteMission($id)
    {
       $mission = Mission::find($id);

       if (file_exists('public/upload/mission_images/' . $mission->image) AND ! empty($mission->image)) {

          unlink('public/upload/mission_images/' . $mission->image);
       }
       $mission->delete();
         return redirect()->route('missions.view')->with('success','Data Delete Successfully');
    }
}
