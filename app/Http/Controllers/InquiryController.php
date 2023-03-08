<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Mail;
// use App\Mail\InquiryMail;
use App\Mail\SendingMail;

class InquiryController extends Controller
{
    use HttpResponse;

    function inquiry(Request $request){
        $request->validate([
            'name' => 'required',  
            'lastname' => 'required',
            'email' => 'required|email',
            'inquiry' => 'required',
            'phonenumber' => 'required'
        ]);

        
        $data = $request->all();
        Mail::to($request->input('email'))->send(new SendingMail($data));
        $inquiry = Inquiry::create([
            'name' => $data['name'],
            'last_name' => $data['lastname'],
            'email' => $data['email'],
            'inquiry' => $data['inquiry'],
            'phone_number' => $data['phonenumber'],
        ]);


        return $this->success([
            'inquiry' => $inquiry,
        ]);

        
    }
}
