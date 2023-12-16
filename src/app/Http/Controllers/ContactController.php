<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $categories = Category::all();
        $confirm = $request->all();
        return view('confirm',compact('confirm','categories'));
    }

    public function store(Request $request){
        $action =$request->get('action','back');
        if($action == 'back') {
            return redirect('/')->withInput();
        } else {
            $request['tel']=$request['firsttel'].=$request['middletel'].=$request['lasttel'];
            $contact = $request->only(['lastname','firstname','gender', 'email','tel','address','building','category_id','detail']);
            Contact::create($contact);
            return view('thanks');
        }
    }

}
