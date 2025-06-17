<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLiveryRequest;
use App\Models\Livery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LiveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $liveries = Livery::all();

        return view('admin.liveries.index', compact('liveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.liveries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLiveryRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        if ($file && $file->isValid()) {
            $filename = Str::slug($request->IATA . '-' . $request->aircraft) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('liveries'), $filename);
            $path = '/liveries/' . $filename;
        } else {
            return back()->withErrors(['file' => 'Soubor nebyl nahrán nebo je neplatný.']);
        }

        Livery::create([
            'aircraft' => $request->aircraft,
            'airline' => $request->airline,
            'IATA' => $request->IATA,
            'type' => $request->type,
            'path' => $path,
            'price_jpg' => $request->price_jpg,
            'price_png' => $request->price_png,
            'category' => $request->type ?? null,
            'featured' => $request->has('featured'),
            'on_sale' => $request->has('discount'),
            'discount_jpg' => $request->discount_jpg,
            'discount_png' => $request->discount_png,
        ]);

        return redirect()->route('admin.liveries.index')->with('success', 'Livery byla úspěšně přidána.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        return view('admin.liveries.show', ['livery' => Livery::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        return view('admin.liveries.edit', ['livery' => Livery::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Livery::destroy($id);

        return to_route('admin.dashboard')->with('success', 'Livery byla úspěšně smazána.');
    }
}
