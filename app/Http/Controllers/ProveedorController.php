<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $buscar=trim($request->get('buscar'));

        $proveedores = Proveedor::select('id','cuit','razon_social','contacto_nombre','contacto_telefono','direccion')
                    ->where('contacto_nombre','LIKE','%'.$buscar.'%')
                    ->orWhere('cuit','LIKE','%'.$buscar.'%')
                    ->orderBy('contacto_nombre','asc','razon_social','asc')
                    ->paginate();

        return view('proveedores.index', compact('proveedores','buscar'));
    }


    public function create()
    {
        return view ('proveedores.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'cuit'=>['required'],
            'razon_social'=>['required'],
            'contacto_nombre'=>['required'],
            'contacto_telefono'=>['required','numeric','gt:0']/* GreaterThan gt:55 LessThan lt:9999 */,
            'direccion'=>['required']
        ]);

        $proveedor = new proveedor();
        $proveedor->cuit = $request->cuit;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->contacto_nombre = $request->contacto_nombre;
        $proveedor->contacto_telefono = $request->contacto_telefono;
        $proveedor->direccion = $request->direccion;

        $proveedor->save();

        return redirect()->route('proveedores.show', $proveedor);
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }


    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }


    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'cuit'=>['required','lt:9999999999999'],
            'razon_social'=>['required'],
            'contacto_nombre'=>['required'],
            'contacto_telefono'=>['required','numeric','gt:0']/* GreaterThan gt:55 LessThan lt:9999 */,
            'direccion'=>['required']
        ]);


        $proveedor->cuit = $request->cuit;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->contacto_nombre = $request->contacto_nombre;
        $proveedor->contacto_telefono = $request->contacto_telefono;
        $proveedor->direccion = $request->direccion;

        $proveedor->save();

        return view('proveedores.show', compact('proveedor'));
    }


    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index');
    }
}
