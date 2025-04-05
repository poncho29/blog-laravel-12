<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

    public function store (Request $request) {
        // $post = new Post();

        // $post->title = $request->title;
        // $post->slug = $request->slug;
        // $post->category = $request->category;
        // $post->content = $request->content;

        // $post->save();

        Post::create($request->all());

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
        $post = Post::find($id);

        $post->update($request->all());

        // $post->title = $request->title;
        // $post->slug = $request->slug;
        // $post->category = $request->category;
        // $post->content = $request->content;

        // $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy ($id) {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
