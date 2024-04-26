@extends('layouts.app')

@section('content')
    @vite(['resources/js/diagramador.js', 'resources/js/custom-modal.js', 'resources/js/modal-link.js'])

    <main>
        <x-custom-modal></x-custom-modal>
        <x-modal-link></x-modal-link>

        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <div class="flex justify-center">
                <div class="flex space-x-4">
                    <button id="bt_abrir_modal"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full text-center">
                        Add Artefact
                    </button>

                    <form action="#" method="GET" class="text-center">
                        <select name="language" onchange="if (this.value !== '') window.location.href=this.value" class="font-bold py-2 px-8 rounded-full text-center">
                            <option value="" selected disabled>Seleccione el lenguaje a exportar</option>
                            <option value="{{ route('codeJava', $diagramador->id) }}">codeJava</option>
                            <option value="{{ route('codePy', $diagramador->id) }}">codePy</option>
                            <option value="{{ route('codePhp', $diagramador->id) }}">codePhp</option>
                        </select>
                    </form>
                    
                    

                    <form action="{{ route('exportarCase', $diagramador->id) }}" method="POST" class="inline">
                        @csrf
                        @method('POST')
                        <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full text-center">Export EA</button>
                    </form>
                    
                    <button id="btn_guardar" class=" bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full hidden">
                        GUARDAR
                    </button>
                    
                </div>

                <div class="flex items-center text-gray-500 text-sm">
                    <input type="text" id="id_diagrama_actual" value="{{ $diagramador->id }}" class="hidden">
                    <input type="text" id="artefactos" name="artefactos" value="{{ $artefactos }}" class="hidden">
                    <input type="text" id="enlaces" name="enlaces" value="{{ $enlaces }}" class="hidden">
                    <input type="text" id="grupos" name="grupos" value="{{ $grupos }}" class="hidden">
                    {{-- <input type="text" id="gr" name="gr" value="{{ $gr }}" class="hidden"> --}}
                    <input type="text" id="max" name="max" value="{{ $max }}" class="hidden">
                    <input type="text" id="id_user" value="{{ $user->id }}" class="hidden">
                    @forelse ($invitadosArray as $i)
                        {{-- <span>{{ $i['invitado'] }}</span> --}}
                    @empty
                    @endforelse
                    {{-- <p>Cantidad de usuarios conectados: <span id="userCount"></span></p> --}}
                </div>
            </div>

        </div>
    </main>

    <div id="diagramador"
        style="border: 0px solid black; width: 100%; height: 570px; position: relative; -webkit-tap-highlight-color: rgba(255, 255, 255, 0); cursor: auto;">
    </div>
    
@endsection
