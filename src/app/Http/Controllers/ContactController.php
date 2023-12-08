<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
     return view('index');
    }

    public function confirm(ContactRequest $request){
        $confirm = $request->all();
        return view('confirm',compact('confirm'));
        
    }

    public function store(Request $request){
        $action =$request->get('action','back');
        if($action == 'back') {
            return redirect('/')->withInput();
        } else {
            $request['tel']=$request['firsttel'].=$request['middletel'].=$request['lasttel'];
            $contact = $request->only(['lastname','firstname','gender', 'email','tel','address','building','inquiry','detail']);
            Contact::create($contact);
            return view('thanks');
        }
    }

}
