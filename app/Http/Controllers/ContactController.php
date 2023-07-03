<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
   public function contact(){
    return view('pages.contact-us');
   }

   public function sendEmail(Request $request)
   {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,

        ];

        // return $details;

        Mail::to('pascalikechukwu@gmail.com')->send(new ContactMail($details));
        Alert::success('Sent!', 'message sent successfuly!');    
        return back();
   }
}
