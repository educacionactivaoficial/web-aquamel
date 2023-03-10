<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">
                    <form action="{{route('productos.store')}}" method="POST">
                        @csrf
                        <table>
                           <tbody>
                                <tr>
                                    <td><label for="nombre">Nombre: </label></td>
                                    <td> <input type="text" name="nombre" placeholder="Ingresar nombre" value="{{old('nombre')}}"></td>
                                    <td>
                                        @error('nombre')
                                        <small>*{{$message}}</small>
                                        <br>  
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label for="marca">Marca: </label> </td>
                                    <td><input type="text" name="marca" placeholder="Ingresar marca" value="{{old('marca')}}"></td>
                                    <td>    
                                        @error('marca')
                                        <small>*{{$message}}</small>
                                        <br>  
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tamano">Tamaño: </label></td>
                                    <td><input type="text" name="tamano" placeholder="Ingresar tamaño" value="{{old('tamano')}}"></td>
                                    <td>
                                        @error('tamano')
                                        <small>*{{$message}}</small>
                                        <br>  
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="descripcion">Descripción: </label></td>
                                    <td><input type="text" name="descripcion" placeholder="Ingresar descripción" value="{{old('descripcion')}}"></td>
                                    <td>    
                                        @error('descripcion')
                                        <small>*{{$message}}</small>
                                        <br>  
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-blue" type="submit">
                            Guardar
                        </button>
                        <button><a href="{{route('productos.index')}}">Cancelar</a></button>
                        {{-- <button type="submit">Guardar</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
