<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información de la marca "{{$marca->nombre}}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">
                    ID: {{ $marca->id }}<br>
                    Nombre: {{ $marca->nombre }}<br>
                    Deescripcion: {{ $marca->descripcion }}<br>
                    <br>&nbsp;
                    <a href="{{route('marcas.index')}}">Volver</a>
                    <a href="{{route('marcas.edit', $marca)}}">Editar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
