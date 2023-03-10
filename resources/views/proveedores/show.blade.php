<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Información del proveedor "{{$proveedor->contacto_nombre}}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">
                    Id: {{ $proveedor->id }}<br>
                    CUIT:{{$proveedor->cuit}}<br>
                    Razon social: {{ $proveedor->razon_social }}<br>
                    Nombre: {{ $proveedor->contacto_nombre }}<br>
                    Telefono: {{ $proveedor->contacto_telefono }}<br>
                    Direccion: {{ $proveedor->direccion }}<br>
                    <br>&nbsp;
                    <a href="{{route('proveedores.index')}}">Volver</a>
                    <a href="{{route('proveedores.edit', $proveedor)}}">Editar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
