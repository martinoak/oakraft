<?php

namespace App\Http\Controllers;

use App\Models\Livery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogueController extends Controller
{
    public function index(Request $request): View
    {
        $query = Livery::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        $liveries = $query->latest()->limit(4)->get();
        $categories = Livery::distinct()->pluck('category')->filter();

        return view('catalogue.index', compact('liveries', 'categories'));
    }
}
