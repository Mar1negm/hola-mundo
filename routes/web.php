<?php

use App\Http\Controllers\HolaMundoController;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('\\/', function () {
    return view('welcome');
});

Route::get('/hola', [HolaMundoController::class, 'index']);

Route::view('/register', 'auth.register')->name('register');

Route::get('/users', function () {
    $search = trim((string) request()->query('search', ''));

    $users = User::query()
        ->when($search !== '', function (Builder $query) use ($search) {
            $query->where(function (Builder $query) use ($search): void {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->latest()
        ->paginate(5)
        ->withQueryString();

    return view('users.index', compact('users', 'search'));
})->name('users.index');

Route::get('/profile/edit', function () {
    return view('users.edit', ['user' => Auth::user() ?? new User]);
})->name('profile.edit');
