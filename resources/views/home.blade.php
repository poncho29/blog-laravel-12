@extends('layouts.app')

@section('title', 'Home -')

@push('css')
    <style>
        body {
            background-color: #FDFDFC;
        }
    </style>
@endpush

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="mb-4">Bienvenido al Home con blade</h1>

        <x-alert
            type="success"
            title="Titulo de alerta"
            class="mb-4"
        >
            {{-- <x-slot name="title">Titulo de alerta</x-slot> --}}

            Esto es un alerta
        </x-alert>

        <p>Esto es un parrafo</p>
    </div>
@endsection
