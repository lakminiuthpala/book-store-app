<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Reader;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredReaderController extends Controller
{
    public function create(): View
    {
        return view('auth.reader-register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        

        $reader = Reader::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_type' => 'reader',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'user_type' => 'reader',
            'password' => Hash::make($request->password),
            'code' => $reader->id,
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        return redirect()->route('reader.dashboard')
            ->with('success', "You're logged in!");
    }
}
