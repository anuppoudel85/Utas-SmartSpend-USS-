<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function details(): View
    {
        return view('details');
    }
}
