<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Mission;
use App\Models\Vision;
use App\Models\NewsEvent;
use App\Models\Service;
use App\Models\About;
use App\Models\UserMessage;
use Mail;


class FrontendController extends Controller
{

    public function index() 
    {
        $data['logo'] = Logo::first();
    	$data['sliders'] = Slider::all();
        $data['contact'] = Contact::first();
        $data['mission'] = Mission::first();
        $data['vision'] = Vision::first();
        $data['news_event'] = NewsEvent::orderBy('id','desc')->get();
        $data['services'] = Service::all();


        return view('frontend.layouts.home',$data);
    }


    public function aboutUs()
    {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
    	
        return view('frontend.single_page.about-us',$data);
    }

    public function contactUs()
     {
    	$data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        return view('frontend.single_page.contact-us',$data);
     }

    public  function NewsDetails($id)
     {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['news'] = NewsEvent::find($id);
        // dd($news);
        return view('frontend.single_page.NewsEventDetails',$data);

     } 

     public function mission()
     {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['mission'] = Mission::first();

        
        return view('frontend.single_page.mission',$data);
     }

     public function vision()
     {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['vision'] = Vision::first();
        
        return view('frontend.single_page.vision',$data);
     }


     public function newsEvents()
     {
        $data['logo'] = Logo::first();
        $data['contact'] = Contact::first();
        $data['news_event'] = NewsEvent::orderBy('id','desc')->get();
        
        return view('frontend.single_page.news-events',$data);
     }



     public function userMsgContactStore(Request $request)
     {
        $data = new UserMessage();

       $data->name = $request->name;
       $data->email = $request->email;
       $data->contact_no = $request->contact_no;
       $data->address = $request->address;
       $data->message = $request->message;
       // $data->created_by = Auth::user()->id;

        $data->save();

        $emailData = array(
            'Name' => $request->name,
            'Email' => $request->email,
            'ContactNo' => $request->contact_no,
            'Address' => $request->address,
            'Message' => $request->message
        );

        Mail::Send('frontend.email.contact',$emailData, function($message) use($emailData){
            $message->from('muhammadshakil.dev@gmail.com','4DimondTech');
            $message->to($emailData['Email']);
            $message->subject('Thanks for contact Us');

        });

         // return redirect()->route('contacts.view')->with('success','Data Insert Successfully');
         return redirect()->back()->with('success','Your Message Successfully Sent');
        //dd('tests');
        // $data['logo'] = Logo::first();
        // $data['contact'] = Contact::first();
        // $data['news_event'] = NewsEvent::orderBy('id','desc')->get();
        
     }
}
