<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información del producto "{{$producto->nombre}}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">
                    ID: {{ $producto->id }}<br>
                    Nombre: {{ $producto->nombre }}<br>
                    Marca: {{ $producto->marca }}<br>
                    Tamaño/Litros: {{ $producto->tamano_litros }}<br>
                    Descripción: {{ $producto->descripcion }}<br>
                    <br>&nbsp;
                    <a href="{{route('productos.index')}}">Volver</a>
                    <a href="{{route('productos.edit', $producto)}}">Editar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
