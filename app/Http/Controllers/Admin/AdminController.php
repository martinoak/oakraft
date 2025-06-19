<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use http\Exception\BadConversionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        Gate::allowIf(auth()->user()->role === Role::ADMIN->value);

        return view('admin.index');
    }

    public function stats(): void
    {
        abort(404);
    }

    public function tasks(): View
    {
        $tasks = file_get_contents(storage_path('app/private/tasks.txt'));

        return view('admin.tasks', compact('tasks'));
    }

    public function saveTask(Request $request): RedirectResponse
    {
        $file = storage_path('app/private/tasks.txt');

        file_put_contents($file, $request->input('tasks'));

        return back()->with('success', 'Seznam úkolů byl aktualizován.');
    }

    public function templates(): View
    {
        $path = storage_path('app/private/templates');

        $templates = array_diff(scandir($path), ['..', '.']);

        return view('admin.templates', compact('templates'));
    }

    public function downloadTemplate(string $filename): BinaryFileResponse|RedirectResponse
    {
        $file = storage_path('app/private/templates/' . $filename);

        return file_exists($file) ? response()->download($file, $filename) : back()->with('error', 'Šablona neexistuje.');
    }

    public function wishlist(): View
    {
        $wishes = Wishlist::all();

        return view('admin.wishlist', compact('wishes'));
    }
}
