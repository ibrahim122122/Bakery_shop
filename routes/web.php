<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/homepage');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function (Request $request) {
    $attributes = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'confirmed', 'min:8'],
        'address' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string', 'max:25'],
        'age' => ['required', 'string', 'max:3'],
    ]);

    $attributes['password'] = Hash::make($attributes['password']);

    $user = User::create($attributes);
    Auth::login($user);

    return redirect('/homepage');
});

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Password Reset Routes
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    // Send reset link
    // For simplicity, just show a message
    return back()->with('status', 'We have emailed your password reset link!');
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    // Reset password logic
    return redirect('/login')->with('status', 'Password reset successfully!');
})->middleware('guest')->name('password.update');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::get('/logout', function () {
    return view('logout');
})->middleware('auth')->name('logout.page');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Settings
Route::get('/settings', function () {
    return view('settings');
})->middleware('auth')->name('settings');

Route::post('/settings', function (Request $request) {
    $user = $request->user();

    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'phone' => ['nullable', 'string', 'max:25'],
        'address' => ['nullable', 'string', 'max:255'],
        'age' => ['nullable', 'integer', 'min:13', 'max:120'],
        'current_password' => ['nullable', 'string'],
        'new_password' => ['nullable', 'string', 'min:8', 'confirmed'],
        'confirm_password' => ['nullable', 'string', 'min:8'],
    ]);

    // Basic profile update
    $user->fill([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'] ?? null,
        'address' => $data['address'] ?? null,
        'age' => $data['age'] ?? null,
    ])->save();

    // Optional password change
    if (!empty($data['new_password'])) {
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.'])->withInput();
        }

        $user->password = Hash::make($data['new_password']);
        $user->save();
    }

    return back()->with('status', 'Settings updated successfully.');
})->middleware('auth')->name('settings.update');

Route::get('/orders', function () {
    return view('orders');
})->middleware('auth')->name('orders');

