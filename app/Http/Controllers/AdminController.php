<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        Gate::allowIf(auth()->user()->role === Role::ADMIN->value);

        return view('admin.index');
    }
}
