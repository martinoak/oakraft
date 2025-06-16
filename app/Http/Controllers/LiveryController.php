<?php

namespace App\Http\Controllers;

use App\Models\Livery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LiveryController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $identifier): View
    {
        $livery = Livery::findOrFail(explode('-', $identifier)[0]);

        return view('livery.show', compact('livery'));
    }
}
