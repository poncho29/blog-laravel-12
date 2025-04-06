<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Mail\PostCreateMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function index() {
        // Obtner varios registros con condiciones y filtros
        // $posts = Post::where('id', '>=', '2')
        //     ->orderBy('id', 'desc')
        //     ->select('id', 'title', 'category')
        //     ->take(2)
        //     ->get();

        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create () {
        return view('posts.create');
    }

    public function store (StorePostRequest $request) {
        $post = Post::create($request->all());

        Mail::to('prueba@prueba.com')->send(new PostCreateMail($post));

        return redirect()->route('posts.index');
    }

    public function show ($id) {
        // Obtener el primero que cumpla el where
        // $post = Post::where('title', 'Titulo de prueba 1')->first();

        // Obtener un registro por un campo especifico
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function edit ($id) {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update (Request $request, $id) {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'slug' => "required|unique:posts,slug,{$id}",
            'category' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($id);

        $post->update($request->all());

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy ($id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
