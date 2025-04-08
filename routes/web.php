<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Phone;
use App\Models\User;

Route::get('/', [HomeController::class, 'index']);

Route::resource('posts', PostController::class)
    // ->parameters(['posts' => 'post'])
    ->names('posts');

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/prueba', function () {
    // User::create([
    //     'name' => 'Prueba',
    //     'email' => 'prueba@prueba',
    //     'password' => bcrypt('12345678')
    // ]);

    // Phone::create([
    //     'number' => '987654321',
    //     'user_id' => 1
    // ]);

    // $user = User::where('id', 1)->with('phone')->first();

    // return $user;

    $phone = Phone::find(1);

    return $phone->user;
});
