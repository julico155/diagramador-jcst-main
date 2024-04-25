@extends('layouts.app') <!-- Asegúrate de que estés utilizando la plantilla de Laravel que deseas -->

@section('content')
    <style>
        .color-ivana {
            --tw-bg-opacity: 1;
            background-color: #B78ABE
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
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-semibold my-4">Mis Diagramas</h1>
                </div>
                <div class="text-right w-full">
                    <form action="{{ route('diagramador.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="flex justify-center mb-8">
                            <input type="text" name="titulo" placeholder="Ingrese un Titulo" required
                                class="border border-gray-300 px-4 py-2 rounded-l-md w-64">
                            <button class="bg-purple-600 text-white px-4 py-2 rounded-r-md">Crear</button>
                        </div>
                    </form>
                </div>

                <div class="flex">
                    @foreach ($arrayDiagramas as $diagrama)
                        <div class="max-w-screen-md w-96 bg-purple-100 p-8 rounded-md shadow-md m-2">
                            <!-- Imagen -->
                            <img src="https://corporate-assets.lucid.co/chart/ab2608a0-d145-4f8d-a33b-85a7ae1186be.png"
                                alt="Imagen" class="w-full h-60 object-cover mb-4 rounded-md">

                            <!-- Título -->
                            <h2 class="flex text-xl font-semibold mb-2">{{ $diagrama['titulo'] }}
                                <form action="{{ route('diagramador.destroy', $diagrama['id_diagrama']) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg></button>
                                </form>
                            </h2>



                            <!-- Autor -->
                            <p class="text-gray-600 mb-4">Autor: {{ $diagrama['autornombre'] }}</p>

                            <!-- Botones -->
                            {{-- <div class="flex space-x-4">
                                 <a href="{{ route('diagramador.edit', $diagrama['id_diagrama']) }}"
                                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Editar</a>
                                <a href="{{ route('invitar', $diagrama['id_diagrama']) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Invitar</a>
                                <a href="{{ route('diagramador.show', $diagrama['id_diagrama']) }}"
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">Trabajar</a>

                                    <form action="{{ route('diagramador.destroy', $diagrama['id_diagrama']) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Eliminar</button>
                                </form>  --}}


                            <div class="inline-flex rounded-md shadow-sm">
                                <a href="{{ route('diagramador.edit', $diagrama['id_diagrama']) }}" aria-current="page"
                                    class="px-4 py-2 text-sm font-medium text-white bg-rose-300 border border-gray-200 rounded-s-lg hover:bg-rose-400 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                    Editar
                                </a>

                                <a href="{{ route('invitar', $diagrama['id_diagrama']) }}"
                                    class="px-4 py-2 text-sm font-medium text-white bg-purple-300 border-t border-b border-gray-200 hover:bg-purple-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                    Invitar
                                </a>

                                <a href="{{ route('diagramador.show', $diagrama['id_diagrama']) }}"
                                    class="px-4 py-2 text-sm font-medium text-white color-ivana  border-t border-b border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                    Trabajar
                                </a>

                                {{-- <a href="#" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                      Messages
                                    </a>
                                     --}}
                                {{-- <form action="{{ route('diagramador.destroy', $diagrama['id_diagrama']) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-purple-600 border border-gray-200 rounded-e-lg hover:bg-purple-700 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        Eliminar</button>
                                    </form> --}}

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
