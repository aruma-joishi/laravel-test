<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(){
        $contacts = Contact::Paginate(10);
        $categories = Category::all();
        $queryParameters = null;
        return view('admin', compact('contacts', 'categories', 'queryParameters'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request){
        $contacts=Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->date)->Paginate(10);
        $categories = Category::all();
        $queryParameters = $request->query();
        return view('admin', compact('contacts', 'categories','queryParameters'));
    }
}