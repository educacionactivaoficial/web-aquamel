<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">

                    <form action="{{route('productos.index')}}">
                        {{-- <td><label for="buscar">Buscar: </label> </td> --}}
                        <td><input type="text" name="buscar" placeholder="Click" value={{ $buscar }}></td>
                        <button type="submit">
                            Buscar
                        </button>
                    </form>

                    <button><a href="{{ route("productos.create") }}">Nuevo producto</a></button>

                    @if(count($productos)<=0)

                        <h4>No se han encontrado productos</h4>

                    @else
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Proveedor</th>
                                    <th>Marca</th>
                                    <th>Tamaño</th>
                                    <th>Descripción</th>
                                    <th>Ultimo precio de compra</th>
                                    <th>Alicuota IVA</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productos as $prod)
                                    <tr>
                                        <td>{{ $prod->id }}</td>
                                        <td><a href="{{ route('productos.show',$prod->id) }}">{{ $prod->nombre }}</a></td>
                                        <td>{{ $prod->proveedor_id }}</td>
                                        <td>{{ $prod->marca_id}}</td>
                                        <td>{{ $prod->stock }}</td>
                                        <td>{{$prod->tamano_litros}}</td>
                                        <td>{{$prod->descripcion}}</td>
                                        <td>{{ $prod->ultimo_precio_compra }}</td>
                                        <td>{{ $prod->alicuota_iva }}</td>
                                        <td><a href="{{ route('productos.edit', $prod) }}">Editar</a></td>
                                        <td>
                                            <form action="{{route('productos.destroy', $prod)}}" method="POST">
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
