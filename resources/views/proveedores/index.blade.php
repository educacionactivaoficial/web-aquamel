<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proveedores
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">

                    <form action="{{route('proveedores.index')}}">
                        {{-- <td><label for="buscar">Buscar: </label> </td> --}}
                        <td><input type="text" name="buscar" placeholder="Click" value={{ $buscar }}></td>
                        <button type="submit">
                            Buscar
                        </button>
                    </form>

                    <button><a href="{{ route("proveedores.create") }}">Nuevo proveedor</a></button>

                    @if(count($proveedores)<=0)

                        <h4>No se han encontrado proveedores</h4>

                    @else
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>CUIT</th>
                                    <th>Razon Social</th>
                                    <th>Contacto Nombre</th>
                                    <th>Contacto Telefono</th>
                                    <th>Direccion</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $proveedor->cuit }}</td>
                                        <td><a href="{{ route('proveedores.show',$proveedor->cuit) }}">{{ $proveedor->razon_social}}</a></td>
                                        <td>{{ $proveedor->contacto_nombre}}</td>
                                        <td>{{$proveedor->contacto_telefono}}</td>
                                        <td>{{$proveedor->direccion}}</td>
                                        <td><a href="{{ route('proveedores.edit', $proveedor) }}">Editar</a></td>
                                        <td>
                                            <form action="{{route('proveedores.destroy', $proveedor)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
