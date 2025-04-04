@extends('layouts.app')

@section('content')
    <main class="container">
        <a href="/posts">Volver</a>

        <h1>{{ $post->title }}</h1>

        <p>
            <b>Categoria:</b> {{ $post->category }}
        </p>

        <p>
            {{ $post->content }}
        </p>

        <a href="/posts/{{ $post->id }}/edit">Editar</a>

        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>
        </form>
    </main>
@endsection
