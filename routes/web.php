<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
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

Route::get('/relation-one-to-one', function () {
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

Route::get('/relation-one-to-many', function () {
    // Post::create([
    //     'title' => 'Post 2',
    //     'slug' => 'post-2',
    //     'category' => 'Categoria 2',
    //     'content' => 'Contenido 2'
    // ]);

    // Comment::create([
    //     'content' => 'Comentario 5',
    //     'post_id' => 111
    // ]);

    // return 'Comentario creado';

    // Obtener post
    // $post = Post::find(111);

    // Obtener comentarios del posts
    // return $post->comments;

    // Relacion inversa
    $comment = Comment::find(1);

    return $comment->post;
});

Route::get('/relation-many-to-many', function () {
    // Obtener post y añadirle tags
    $post = Post::find(111);
    // $post->tags()->attach([1, 2]);
    // return 'tags añadidos';

    // Quitar tag de un post
    // $post->tags()->detach([1]);
    // return 'tag quitado';

    // Agregar mas etiquetas a un post sin que duplique
    // si una etiquete ya esta agregada al post
    $post->tags()->sync([1, 2, 3]);
    return $post->tags;

    // Obtener tags del post
    // $post->tags;
    // return $post->tags;
});
