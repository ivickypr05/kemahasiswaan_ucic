<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailContact;

class ContactController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Contact";
        return view('frontend.contact.contact', $data);
    }

    public function sendMail(Request $request)
    {
        $data = [
            'name' => $request->name,
            'subject' => $request->subject,
            'msg' => $request->msg,
            'email' => $request->email,
        ];
        Mail::to($request->email)->send(new MailContact($data));

        return redirect()->route('contact')->with(['success' => 'Email sent successfully!']);
    }
}
