<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\ValidateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function register(): View
    {
        return view('auth.register');
    }

    public function newUser(NewUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return to_route('login')->with('success', 'Your account has been created. Please sign in.');
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(ValidateUserRequest $request): RedirectResponse
    {
        if (auth()->attempt($request->only('email', 'password'))) {

            return match (auth()->user()->role) {
                Role::ADMIN->value => to_route('admin.dashboard')->with('success', 'You are now logged in.'),
                Role::USER->value => to_route('user-profile')->with('success', 'You are now logged in.'),
            };
        }

        return back()->with('error', 'Invalid credentials.');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return to_route('login')->with('success', 'You are now logged out.');
    }
}
