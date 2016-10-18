<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use App\Http\Requests;

class ContactController extends Controller
{
    public function showContactForm() {
    	return view('contact.form');
    }

    public function sendMessage(Requests\SendContactMessage $request) {
        Mail::to(env('CONTACT_EMAIL_TO'))->send(new ContactMessage(
            $request->get('name'),
            $request->get('email'),
            $request->get('message')
        ));

    	\Session::flash('success', true);
        
    	return back();
    }
}
