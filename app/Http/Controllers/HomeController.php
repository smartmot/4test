<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;

class HomeController extends Controller
{
    public function pdf(){

$html = "<div></div>";
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            "format" =>[148,210],
            'fontDir' => array_merge($fontDirs, [
                storage_path("fonts")
            ]),
            'fontdata' => $fontData + [
                    'KhmerOS' => [
                        'R' => 'KhmerOS.ttf',
                        'I' => 'KhmerOS.ttf',
                    ]
                ],
            'default_font' => 'KhmerOS',
            'margin_top' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_bottom' => 0,
            "orientation" => "P"
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output(storage_path("app/receipts/receipt1.pdf"));
    }
}
