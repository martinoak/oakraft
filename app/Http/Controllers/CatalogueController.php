<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CatalogueController extends Controller
{
    public function index(): View
    {
        return view('catalogue.index');
    }
}
