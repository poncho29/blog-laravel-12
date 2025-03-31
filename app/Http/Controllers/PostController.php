<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts.index');
    }

    public function create () {
        return view('posts.create');
    }

    public function store (Request $request) {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'slug' => 'required|unique:posts',
            'category' => 'required',
            'content' => 'required'
        ]);

        return $request->all();
    }

    public function show ($post) {
        // Funcion compact('post) = ['post' => $post]
        return view('posts.show', compact('post'));
    }

    // public function show ($post, $category = null) {
    //     if ($category) {
    //         return 'Post ' . $post . ' de la categoria ' . $category;
    //     }

    //     return 'Post ' . $post;
    // }
}
