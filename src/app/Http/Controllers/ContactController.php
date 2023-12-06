<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
     return view('index');
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return $contact;
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request){
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact);
        return view('thanks');
    }


//↓あとでけす
    public function viewindex(){
     return view('index');
    }
    public function viewadmin(){
     return view('admin');
    }
    public function viewlogin(){
     return view('login');
    }
    public function viewregister(){
     return view('register');
    }
    public function viewthanks(){
     return view('thanks');
    }
    public function viewconfirm(){
     return view('confirm');
    }
}