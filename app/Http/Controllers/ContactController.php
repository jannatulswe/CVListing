<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('front-end.contact.contact');
    }

    public function saveContact(Request $request){
        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with('message','contact added Successfully');

    }
}
