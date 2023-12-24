<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\StreamedResponse;


class CsvDownloadController extends Controller
{
    public function downloadCsv()
    {
        $header = [
            '名',
            '住所'
        ];
        $csvDatas = [
            '0' => [
                '花子','東京都',
            ],
            '1' => [
                '太郎',
                '大阪府',
            ],
        ];

        $callback = function () use ($header) {
            $handle = fopen('php://output', 'w');
            mb_convert_variables('SJIS-win', 'UTF-8', $header);
            fputcsv($handle, $headers);

                foreach ($csvDatas as $csvData) {
                    mb_convert_variables('SJIS-win', 'UTF-8', $csvData);
                    fputcsv($handle, $csvData);
                }
            fclose($handle);
        };

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=顧客データ_' . date('YmdHis') . '.csv'
        ];

        return response()->stream($callback, 200, $headers);
    }
}
