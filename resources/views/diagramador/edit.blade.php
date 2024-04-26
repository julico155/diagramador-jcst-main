@extends('layouts.app')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Editar Diagrama</h1>

    <form action="{{ route('diagramador.update', $diagramador->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Nuevo Título:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $diagramador->titulo }}" class="w-full p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">Guardar</button>
            <a href="{{ route('diagramador.index') }}" class="text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</div>

@endsection
