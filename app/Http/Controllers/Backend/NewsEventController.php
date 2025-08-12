<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\NewsEvent;

class NewsEventController extends Controller
{
    public function viewNewsEvent()
    {
       $data['alldata'] = NewsEvent::all();

         return view('admin.news_event.view-news-event',$data);
    }




    public function addNewsEvent()
    {

         return view('admin.news_event.add-news-event');
    }





    public function storeNewsEvent(Request $request)
    {

       $data = new NewsEvent();

       $data->date = date('y-m-d',strtotime($request->date));
       $data->short_title = $request->short_title;
       $data->long_title = $request->long_title;
       $data->created_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/newsEvent_images'),$filename);
            $data['image']= $filename;
        }

        $data->save();

         return redirect()->route('news_events.view')->with('success','Data Insert Successfully');
    }



    public function editNewsEvent($id)
    {
       $edit_newsEvent = NewsEvent::find($id);

         return view('admin.news_event.edit-news-event',compact('edit_newsEvent'));
    }



    public function updateNewsEvent(Request $request, $id)
    {
       $data = NewsEvent::find($id);

       $data->date = date('y-m-d',strtotime($request->date));
       $data->short_title = $request->short_title;
       $data->long_title = $request->long_title;
       $data->updated_by = Auth::user()->id;

      if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/newsEvent_images/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/newsEvent_images'),$filename);
            $data['image']= $filename;
        }
        $data->save();
       return redirect()->route('news_events.view')->with('success','Data Update Successfully');
    }





    public function deleteNewsEvent($id)
    {
       $edit_news = NewsEvent::find($id);

       if (file_exists('public/upload/newsEvent_images/' . $edit_news->image) AND ! empty($edit_news->image)) {
          
          unlink('public/upload/newsEvent_images/' . $edit_news->image);
       }
       $edit_news->delete();
         return redirect()->route('news_events.view')->with('success','Data Delete Successfully');
    }
}
