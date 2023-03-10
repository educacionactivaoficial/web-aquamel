<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Marcas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">

                    <form action="{{route('marcas.index')}}">
                        <td><input type="text" name="buscar" placeholder="Click" value={{ $buscar }}></td>
                        <button type="submit">
                            Buscar
                        </button>
                    </form>

                    <button><a href="{{ route("marcas.create") }}">Nueva marca</a></button>

                    @if(count($marcas)<=0)

                        <h4>No se han encontrado marcas</h4>

                    @else
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($marcas as $marca)
                                    <tr>
                                        <td>{{ $marca->id }}</td>
                                        <td><a href="{{ route('marcas.show',$marca->id) }}">{{ $marca->nombre}}</a></td>
                                        <td>{{$marca->descripcion}}</td>
                                        <td>
                                            <form action="{{route('marcas.edit', $marca)}}" method="GET">
                                                @csrf
                                                <button type="submit">Editar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{route('marcas.destroy', $marca)}}" method="POST">
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
