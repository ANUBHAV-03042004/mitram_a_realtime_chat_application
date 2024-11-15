<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        // Quick validation first - fail fast principle
        $request->validate([
            'name' => 'required|max:70',
            'email' => 'required|email|max:255',
            'username' => 'required|max:20|alpha_dash',
            'password' => 'required|confirmed',
        ]);

        try {
            // Check for unique constraints separately to avoid deadlocks
            if (User::where('email', $request->email)->exists()) {
                return back()
                    ->withInput($this->getFilteredInput($request))
                    ->withErrors(['email' => 'This email is already registered.']);
            }

            if (User::where('username', $request->username)->exists()) {
                return back()
                    ->withInput($this->getFilteredInput($request))
                    ->withErrors(['username' => 'This username is already taken.']);
            }

            // Create user without any extra overhead
            $user = new User([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            $user->save();

            // Fire event without waiting for listeners
            event(new Registered($user), [], false);

            return redirect('login')->with('success', 'Registration successful!');

        } catch (\Exception $e) {
            return back()
                ->withInput($this->getFilteredInput($request))
                ->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    private function getFilteredInput(Request $request): array
    {
        return $request->only(['name', 'username', 'email']);
    }
}