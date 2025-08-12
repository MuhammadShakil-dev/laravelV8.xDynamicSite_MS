<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Service;

class ServiceController extends Controller
{

      public function viewService() 
    {
       $data['alldata'] = Service::all();

         return view('admin.service.view-service',$data);
    }




    public function addService()
    {

         return view('admin.service.add-service');
    }





    public function storeService(Request $request)
    {

       $data = new Service();

       $data->short_title = $request->short_title;
       $data->long_title = $request->long_title;
       $data->created_by = Auth::user()->id;

        $data->save();

         return redirect()->route('services.view')->with('success','Data Insert Successfully');
    }



    public function editService($id)
    {
       $edit_service = Service::find($id);

         return view('admin.service.edit-service',compact('edit_service'));
    }



    public function updateService(Request $request, $id)
    {
       $data = Service::find($id);

       $data->short_title = $request->short_title;
       $data->long_title = $request->long_title;
       $data->updated_by = Auth::user()->id;
        $data->save();
       return redirect()->route('services.view')->with('success','Data Update Successfully');
    }





    public function deleteService($id)
    {
       $service = Service::find($id);

       $service->delete();
         return redirect()->route('services.view')->with('success','Data Delete Successfully');
    }
}
