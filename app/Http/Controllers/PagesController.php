<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

use App\Models\Main;

use App\Models\About;

use App\Models\Protfolio;

class PagesController extends Controller
{

    public function index()
    {
        $main=Main::first();

        $abouts=About::all();

        $protfolios=Protfolio::all();

        return view('pages.index', compact('main','abouts','protfolios'));
    }

   

}
