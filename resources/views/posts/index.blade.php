@extends('layouts.app')

@section('content')
    <h1>Todos los posts</h1>

    <a href="/posts/create">Nuevo post</a>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
