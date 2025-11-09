<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {
    Route::get('/login', fn () => Inertia::render('auth/Login'))->name('login');

    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = (bool) $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('works.index', 'book'));
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    })->name('login.store');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

