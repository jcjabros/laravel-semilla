<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberWelcome;
use Validator;
class SubscribersController extends Controller
{
    public function postSubscribeAjax(Request $request) {
        // Validation
        $this->validate($request, [
            'subscribe_email' => 'email|unique:subscribers,email',
        ]);
        $subscriber        = new Subscriber;
        $subscriber->email = $request->input('subscribe_email');
        $subscriber->save();
        Mail::to($subscriber->email)->send(new SubscriberWelcome());
        return redirect('/')->with('success', 'Thank You For Subscribing!');
    }
    public function delete($id){
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return redirect('/dashboard/subscribers')->with('success', 'Subscriber Removed');
    }
}
