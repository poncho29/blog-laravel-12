@extends('layouts.app')

@section('content')
    <main class="container">
        <a href={{ route('posts.index') }}>Volver</a>

        <h1>{{ $post->title }}</h1>

        <p>
            <b>Categoria:</b> {{ $post->category }}
        </p>

        <p>
            {{ $post->content }}
        </p>

        <a href="{{ route('posts.edit', $post->id) }}">Editar</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>
        </form>
    </main>
@endsection
