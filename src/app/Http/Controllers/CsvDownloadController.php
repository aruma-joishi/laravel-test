<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;


class CsvDownloadController extends Controller
{
    public function downloadCsv()
    {
        $contacts = Contact::all();
        $categories = Category::all();
        $csvHeader = [
            'category_id',
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'detail',
            'address',
            'building',
        ];

        $response = new StreamedResponse(function () use ($csvHeader, $contacts) {
            $handle = fopen('php://output', 'w');

            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOMを付けてUTF-8を明示
            fputcsv($handle, $csvHeader);

            foreach ($contacts as $contact) {
                $row = array_map(function ($value) {
                    return mb_convert_encoding($value, 'UTF-8', 'auto');
                }, $contact->toArray());

                foreach ($categories as $category) {
                    if ($category['id'] == $row['category_id']) {
                        $row['category_id'] = $category['content'];
                    }
                }

                if ($row['gender'] == '1') {
                    $row['gender'] = "男性";
                } elseif ($row['gender'] == '2') {
                    $row['gender'] = "女性";
                } elseif ($row['gender'] == '3') {
                    $row['gender'] = "その他";
                }

                fputcsv($handle, $row);
            }
            fclose($handle);
        }, Response::HTTP_OK, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }
}
