<?php

namespace App\Http\Controllers;

use App\Models\Livery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AirlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $airlines = Livery::all()->unique('airline')->sortByDesc(fn($group) => $group->count());

        return view('airlines.index', compact('airlines'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $iata): View
    {
        $liveries = Livery::where('IATA', $iata)->get();
        $airline = $liveries->first()->airline;

        return view('airlines.show', compact('liveries', 'airline'));
    }
}
