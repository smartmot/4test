<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class HomeController extends Controller
{
    public function pdf(){
        dd("Hello");
        Browsershot::html("<div style='color: red'>Hello</div>")
            ->save("save_me.png");
    }
}
