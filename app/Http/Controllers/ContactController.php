<?php

namespace App\Http\Controllers;
use App\Auth;
use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request) {
       $this->validate($request,[
           'email'=>'required|email',
           'comments'=>'required',
           ]);
           Mail::to('administrator@example.com')->send(new ContactUs($request));
           return redirect('/')->with('success', 'Thanks! for contacting us');
    }
}
 