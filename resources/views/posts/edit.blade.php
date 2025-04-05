@extends('layouts.app')

@section('title', 'Editar post -')

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="mb-4">Formulario para crear post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- @if ($errors->any())
                <div>
                    <h2>Errores:</h2>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <label for="title">
                Título
                <input
                    id="title"
                    type="text"
                    name="title"
                    value="{{ $post->title }}"
                >
            </label>

            @error('title')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <br><br>

            <label for="slug">
                Slug
                <input
                    id="slug"
                    type="text"
                    name="slug"
                    value="{{ $post->slug }}"
                >
            </label>

            @error('slug')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <br><br>

            <label for="category">
                Categoría
                <input
                    id="category"
                    type="text"
                    name="category"
                    value="{{ $post->category }}"
                >
            </label>

            @error('category')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <br><br>

            <label for="content"></label>
                Contenido
                <textarea
                    id="content"
                    name="content"
                >
                    {{ $post->content }}
                </textarea>
            </label>

            @error('content')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <br><br>

            <button type="submit">Actualizar post</button>
            <button type="button">
                <a href={{ route('posts.index') }}>Cancelar</a>
            </button>
        </form>
    </div>
@endsection
