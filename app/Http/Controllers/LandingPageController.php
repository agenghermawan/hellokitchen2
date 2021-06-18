<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class LandingPageController extends Controller
{
       public function index(Request $request)
    {
        $data = Menu::all()->take(3);
        return view('pages.Home')->with([
            'data' => $data
        ]);
    }
}
