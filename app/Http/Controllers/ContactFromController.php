<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\contactfromMail;

class ContactFromController extends Controller
{
    public function store()
    {
        $contact_from=request()->all();
        Mail::to('mehedituhsar@gmail.com')->send(new contactfromMail($contact_from));
        return redirect()->route('home','/#contact')->with('success','Your message has been submitted successfully');
    }
}
