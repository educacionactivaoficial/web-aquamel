<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar proveedor
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-800">
                    {{-- preguntar sobre que ruta va aquí, POR QUÉ VA proveedores.update en lugar de proveedores.edit --}}
                    <form action="{{route('proveedores.update', $proveedor)}}" method="POST">
                        @csrf
                        @method('put') <!--Aquí indicamos que vamos a usar el método "put"-->
                        <table>
                           <tbody>
                             <tr>
                                 <td><label for="cuit">CUIT: </label></td>
                                 <td> <input type="text" name="cuit" placeholder="Ingresar cuit" value="{{old('cuit', $proveedor->cuit)}}"></td>
                                 <td>
                                     @error('cuit')
                                     <small>*{{$message}}</small>
                                     <br>  
                                     @enderror
                                 </td>
                             </tr>

                             <tr>
                                 <td><label for="razon_social">Razon Social: </label> </td>
                                 <td><input type="text" name="razon_social" placeholder="Ingresar razon_social" value="{{old('razon_social', $proveedor->razon_social)}}"></td>
                                 <td>    
                                     @error('razon_social')
                                     <small>*{{$message}}</small>
                                     <br>  
                                     @enderror
                                 </td>
                             </tr>
                             <tr>
                                 <td><label for="contacto_nombre">Nombre: </label></td>
                                 <td><input type="text" name="contacto_nombre" placeholder="Ingresar nombre" value="{{old('contacto_nombre', $proveedor->contacto_nombre)}}"></td>
                                 <td>
                                     @error('contacto_nombre')
                                     <small>*{{$message}}</small>
                                     <br>  
                                     @enderror
                                 </td>
                             </tr>
                             <tr>
                                 <td><label for="contacto_telefono">Telefono: </label></td>
                                 <td><input type="text" name="contacto_telefono" placeholder="Ingresar telefono" value="{{old('contacto_telefono', $proveedor->contacto_telefono)}}"></td>
                                 <td>    
                                     @error('contacto_telefono')
                                     <small>*{{$message}}</small>
                                     <br>  
                                     @enderror
                                 </td>
                             </tr>
                             <tr>
                                 <td><label for="direccion">Direccion: </label></td>
                                 <td><input type="text" name="direccion" placeholder="Ingresar dirección" value="{{old('direccion', $proveedor->direccion)}}"></td>
                                 <td>    
                                     @error('direccion')
                                     <small>*{{$message}}</small>
                                     <br>  
                                     @enderror
                                 </td>
                             </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-blue" type="submit">Actualizar</button> <br>
                        <button><a href="{{route('proveedores.index')}}">Cancelar</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
