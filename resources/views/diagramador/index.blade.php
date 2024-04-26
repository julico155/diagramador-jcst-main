@extends('layouts.app') <!-- Asegúrate de que estés utilizando la plantilla de Laravel que deseas -->

@section('content')
    <style>
        .color-ivana {
            --tw-bg-opacity: 1;
            background-color: #4e4250
        }
    </style>
    @if (session('success'))
        <div class="animate-bounce fixed top-4 right-1/3 z-50" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            <div id="toast-default"
                class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                </div>
                <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
            </div>
        </div>
    @endif

    <div>
        <div class="container mx-auto mt-8">
            <div class="w-full bg-white rounded-lg shadow-md p-4">
                
                <div class="text-center w-full">
                    <div class="flex justify-center items-center">
                        <h1 class="text-2xl font-bold my-4">Crea un Diagrama</h1>
                    </div>
                    <form action="{{ route('diagramador.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="titulo" placeholder="Titulo" required
                                class="border border-blue-300 px-4 py-2 rounded-md w-64">
                        </div>
                        <div>
                            <button class="bg-blue-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-700 transition-colors duration-300">Crear</button>
                        </div>
                    </form>
                </div>
                

                <div class="flex">
                    @foreach ($arrayDiagramas as $diagrama)
                    <div class="max-w-screen-md w-96 p-8 rounded-md shadow-md m-2">
                        <h2 class="text-xl font-semibold mb-2">{{ $diagrama['titulo'] }}</h2>
                        <p class="text-gray-600 mb-4">Creador: {{ $diagrama['autornombre'] }}</p>
                        <div class="flex justify-center mb-4">
                            <a href="{{ route('invitar', $diagrama['id_diagrama']) }}" class="px-4 py-2 text-sm font-medium text-white bg-yellow-600 border border-gray-200 rounded-l-md hover:bg-yellow-700 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                Invite
                            </a>
                            <a href="{{ route('diagramador.edit', $diagrama['id_diagrama']) }}" aria-current="page" class="px-4 py-2 text-sm font-medium text-white bg-red-800 border-t border-b border-gray-200 hover:bg-red-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                Edit
                            </a>
                            <a href="{{ route('diagramador.show', $diagrama['id_diagrama']) }}" class="px-4 py-2 text-sm font-medium text-white bg-green-500 border border-gray-200 hover:bg-green-600 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                Enter
                            </a>
                            <form action="{{ route('diagramador.destroy', $diagrama['id_diagrama']) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-gray-200 rounded-r-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>



    @if ($diagramasInvitados != null)
        <div>
            <div class="container mx-auto mt-8">
                <div class="w-full bg-white rounded-lg shadow-md p-4">
                    <h1 class="text-3xl font-semibold my-4">Trabajos en colaboración</h1>
                    {{-- <table class="min-w-full border border-collapse border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Título</th>
                                <th class="border border-gray-300 px-4 py-2">Autor</th>
                                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diagramasInvitados as $diagrama)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $diagrama['id'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $diagrama['titulo'] }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $diagrama['autornombre'] }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <div class="flex items-center justify-center">
                                            <a href="{{ route('diagramador.show', $diagrama['id']) }}"
                                                class="text-green-500 hover:text-green-700 mr-2">Trabajar</a>
                                            <form action="{{ route('invitadoDelete') }}" method="POST" class="inline">
                                                @csrf
                                                @method('POST')
                                                <input type="text" name="id_diagrama" value="{{ $diagrama['id'] }}"
                                                    class="hidden">
                                                <input type="text" name="id_invitado" value="{{ $email }}"
                                                    class="hidden">
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700">Abandonar</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    @foreach ($diagramasInvitados as $diagrama)
                        <div class="max-w-md bg-white p-8 rounded-md shadow-md m-2">
                            <!-- Imagen -->
                            <img src="https://corporate-assets.lucid.co/chart/ab2608a0-d145-4f8d-a33b-85a7ae1186be.png"
                                alt="Imagen" class="w-full h-32 object-cover mb-4 rounded-md">

                            <!-- Título -->
                            <h2 class="text-xl font-semibold mb-2">{{ $diagrama['titulo'] }}</h2>

                            <!-- Autor -->
                            <p class="text-gray-600 mb-4">Autor: {{ $diagrama['autornombre'] }}</p>

                            <!-- Botones -->
                            <div class="flex space-x-4">
                                <a href="{{ route('diagramador.show', $diagrama['id']) }}"
                                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Trabajar</a>
                                <form action="{{ route('invitadoDelete') }}" method="POST" class="inline">
                                    @csrf
                                    @method('POST')
                                    <input type="text" name="id_diagrama" value="{{ $diagrama['id'] }}" class="hidden">
                                    <input type="text" name="id_invitado" value="{{ $email }}" class="hidden">
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Abandonar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


@endsection
