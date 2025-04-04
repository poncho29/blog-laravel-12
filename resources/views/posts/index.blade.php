@extends('layouts.app')

@section('content')
    <main class="container mx-auto">
        <h1 class="text-3xl">Todos los posts</h1>

        <a href="/posts/create">Nuevo post</a>

        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </li>
            @endforeach

            {{ $posts->links() }}
        </ul>
    </main>
@endsection
