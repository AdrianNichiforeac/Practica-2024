<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contacts()
    {
        return view('frontend.contacts');
    }

    public function contactPost(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => ''
        ]);

        $details = array([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
        ]);

        $email_trimitere = trans("link.email_administrativ");

        Mail::to($email_trimitere)->send(new ContactForm($details));

        return back()->with('success', 'Thanks for contacting me, I will get back to you soon!');

    }
}
