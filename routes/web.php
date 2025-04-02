<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

use function Laravel\Prompts\select;

Route::get('/', [HomeController::class, 'index']);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::post('posts/create', [PostController::class, 'store']);
Route::get('posts/{post}', [PostController::class, 'show']);

Route::get('prueba', function () {
    // Crear un post
    // $post = new Post;

    // $post->title = 'TitUlo DE pruEba 5';
    // $post->slug = 'titulo-de-prueba-5';
    // $post->category = 'Categoria de prueba 5';
    // $post->content = 'Contenido de prueba 5';

    // $post->save();

    // Actualizar un post
    $post = Post::find(1);
    // $post = Post::where('title', 'Titulo de prueba 1')->first();

    // $post->category = 'Desarrollo web';
    // $post->save();

    // Obtner varios registros
    // $posts = Post::all();
    // $posts = Post::where('id', '>=', '2')
    //     ->orderBy('id', 'desc')
    //     ->select('id', 'title', 'category')
    //     ->take(2)
    //     ->get();

    // return $posts;


    // Eliminar un post
    // $post = Post::find(1);
    // $post->delete();

    return $post->is_active;
});
