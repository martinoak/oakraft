<?php

namespace App\Http\Controllers;

use App\Models\Livery;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomepageController extends Controller
{
    public function index(Request $request): View
    {
        $liveries = Livery::where('featured', true)->get();

        return view('home', compact('liveries'));
    }

    public function download(): BinaryFileResponse
    {
        return response()->download(public_path('liveries/delta-a319.png'));
    }
}
