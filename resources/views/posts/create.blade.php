@extends('layouts.app')

@section('title', 'Crear post -')

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="mb-4">Formulario para crear post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

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
                    value="{{ old('title') }}"
                >
            </label>

            @error('title')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <br><br>

            {{-- <label for="slug">
                Slug
                <input
                    id="slug"
                    type="text"
                    name="slug"
                    value="{{ old('slug') }}"
                >
            </label>

            @error('slug')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <br> --}}

            <label for="category">
                Categoría
                <input
                    id="category"
                    type="text"
                    name="category"
                    value="{{ old('category') }}"
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
                    {{ old('content') }}
                </textarea>
            </label>

            @error('content')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <br><br>

            <button type="submit">Crear post</button>
            <button type="button">
                <a href="/posts">Volver</a>
            </button>
        </form>
    </div>
@endsection
