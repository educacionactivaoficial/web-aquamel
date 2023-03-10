<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">

                    <form action="{{route('clientes.index')}}">
                        <td><input type="text" name="buscar" placeholder="Click" value={{ $buscar }}></td>
                        <button type="submit">
                            Buscar
                        </button>
                    </form>

                    <button><a href="{{ route("clientes.create") }}">Nuevo cliente</a></button>

                    @if(count($clientes)<=0)

                        <h4>No se han encontrado clientes</h4>

                    @else
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre y Apellido</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td><a href="{{ route('clientes.show',$cliente->id) }}">{{ $cliente->apellido.", ".$cliente->nombre }}</a></td>
                                        <td>{{$cliente->email}}</td>
                                        <td>{{$cliente->telefono}}</td>
                                        <td>
                                            <form action="{{route('clientes.edit', $cliente)}}" method="GET">
                                                @csrf
                                                <button type="submit">Editar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('clientes.destroy', $cliente)}}" method="POST">
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
