<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;



class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(Request $request)
    {
        $contacts = Contact::KeywordSearch($request->keyword)->CategorySearch($request->category_id)->GenderSearch($request->gender)->DateSearch($request->date)->get();
        $categories = Category::all();

        foreach ($contacts as $contact) {
            foreach ($categories as $category) {
                if ($category['id'] == $contact['category_id']) {
                    $contact['category_id'] = $category['content'];
                }
            }

            if ($contact['gender'] == '1') {
                $contact['gender'] = "男性";
            } elseif ($contact['gender'] == '2') {
                $contact['gender'] = "女性";
            } elseif ($contact['gender'] == '3') {
                $contact['gender'] = "その他";
            };
        }

        return $contacts;
    }
}