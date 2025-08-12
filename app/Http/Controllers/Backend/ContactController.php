<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Contact;
use App\Models\UserMessage;

class ContactController extends Controller 
{
    public function viewContact() 
    {
       $data['countContact'] = Contact::count();
       // dd($data['countContact']);
       $data['alldata'] = Contact::all();

         return view('admin.contact.view-contact',$data);
    }




    public function addContact()
    {

         return view('admin.contact.add-contact');
    }





    public function storeContact(Request $request)
    {

       $data = new Contact();

       $data->address = $request->address;
       $data->contact_no = $request->contact_no;
       $data->email = $request->email;
       $data->linkedin = $request->linkedin;
       $data->facebook = $request->facebook;
       $data->twitter = $request->twitter;
       $data->youtube = $request->youtube;
       $data->google_plus = $request->google_plus;
       $data->created_by = Auth::user()->id;

        $data->save();

         return redirect()->route('contacts.view')->with('success','Data Insert Successfully');
    }



    public function editContact($id)
    {
       $edit_contact = Contact::find($id);

         return view('admin.contact.edit-contact',compact('edit_contact'));
    }



    public function updateContact(Request $request, $id)
    {
       $data = Contact::find($id);

       $data->address = $request->address;
       $data->contact_no = $request->contact_no;
       $data->email = $request->email;
       $data->linkedin = $request->linkedin;
       $data->facebook = $request->facebook;
       $data->twitter = $request->twitter;
       $data->youtube = $request->youtube;
       $data->google_plus = $request->google_plus;
       $data->updated_by = Auth::user()->id;
        $data->save();
       return redirect()->route('contacts.view')->with('success','Data Update Successfully');
    }





    public function deleteContact($id)
    {
       $contact = Contact::find($id);

       $contact->delete();
         return redirect()->route('contacts.view')->with('success','Data Delete Successfully');
    }

    public function userMsgView()
    {
       // $alldata = UserMessage::all();
       $alldata = UserMessage::orderBy('id','desc')->get();
       // dd($alldata);    
         return view('admin.contact.view-user-messag',compact('alldata'));
    }


    public function deleteUserMsg($id)
    {
       $contact = UserMessage::find($id);

       $contact->delete();
         return  redirect()->back()->with('success','Data Delete Successfully');
    }
}
