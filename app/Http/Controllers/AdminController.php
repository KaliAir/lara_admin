<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Inquiry;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    use HttpResponse;

    function index(Request $request){
        
        $pending = Inquiry::where('pending','==',0)->get();
        
       return $this->success([
        'pending'=> $pending
        
       ]); 
    }

    function logout(Request $request, $id){
        
        if (Auth::check()) {
           Auth::user()->tokens()->where('tokenable_id', $id)->delete();
         }

        return $this->success('', 'Successfully logout', 200);
    }

    function edit($id){
        $editValue = Inquiry::where('id',$id)->first();

        return $this->success([
            'editValue' => $editValue,
        ]);
    }

    function update(Request $request,$id){
        $request->validate([
            'name'=> 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'inquiries'=> 'required',
            'phonenumber' => 'required',
        ]);

        Inquiry::where('id',$id)->update([
            'name' => $request->name,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'inquiry' => $request->inquiries,
            'phone_number' => $request->phonenumber,
            'pending' => $request->pendingInquiry
        ]);

        return $this->success([
            'message' => 'Successfully Updated'
        ]);
    }

    function search(Request $request){

        //$length = Str::length($request->search);

        $inquiry = Inquiry::where('name', 'like', "%{$request->search}%")
        ->orWhere('last_name', 'like', "%{$request->search}%")
        ->orWhere('email', 'like', "%{$request->search}%")
        ->orWhere('inquiry', 'like', "%{$request->search}%")
        ->orWhere('phone_number', 'like', "%{$request->search}%")
        ->orderBy('id', 'desc')->get();
        
        return $this->success([
            'inquiry' => $inquiry,
            //'string' => $length
        ]);
    }

    function delete($id){
        Inquiry::where('id',$id)->delete();

    }

    function showDeletes(){
        $inquiryTrash = Inquiry::onlyTrashed()->orderBy('created_at','desc')->get();

        return $this->success([
            'trash' => $inquiryTrash
        ]);
    }

    function forceDelete($id){
        Inquiry::where('id',$id)->withTrashed()->forceDelete();

        return $this->success([
            'message'=>'Successfully Remove From Trash'
        ]);
    }

    function restore($id){
        Inquiry::where('id',$id)->withTrashed()->restore();

        return $this->success([
            'message'=>'Inquiry Successfully Restore'
        ]);
    }
}
