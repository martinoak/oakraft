<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

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
        return view('admin.tasks');
    }

    public function wishlist(): View
    {
        $wishes = Wishlist::all();

        return view('admin.wishlist', compact('wishes'));
    }
}
