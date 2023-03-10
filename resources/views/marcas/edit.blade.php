<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar marca
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">
                    {{-- preguntar sobre que ruta va aquí, POR QUÉ VA clientes.update en lugar de clientes.edit --}}
                    <form action="{{route('marcas.update', $marca)}}" method="POST">
                        @csrf
                        @method('put') <!--Aquí indicamos que vamos a usar el método "put"-->
                        <table>
                           <tbody>
                                <tr>
                                    <td><label for="nombre">Nombre: </label></td>
                                    <td> <input type="text" name="nombre" placeholder="Ingresar nombre" value="{{ old('nombre', $marca->nombre) }}"></td>
                                    <td>
                                        @error('nombre')
                                        <small>*{{$message}}</small>
                                        <br>  
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="descripcion">Descripcion: </label> </td>
                                    <td><input type="text" name="descripcion" placeholder="Ingresar descripcion" value="{{  old('descripcion',$marca->descripcion) }}"></td>
                                    <td>    
                                        @error('descripcion')
                                        <small>*{{$message}}</small>
                                        <br>  
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-blue" type="submit">Actualizar</button> <br>
                        <button><a href="{{route('marcas.index')}}">Cancelar</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
