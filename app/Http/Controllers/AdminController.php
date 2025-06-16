<?php

namespace App\Http\Controllers;

use App\Enums\Role;
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

    public function team(): void
    {
        abort(404);
    }

    public function invoice(): void
    {
        abort(404);
    }

    public function statistics(): void
    {
        abort(404);
    }
}
