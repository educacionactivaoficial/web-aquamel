<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar=trim($request->get('buscar'));

        $productos = Producto::select('id','proveedor_id','marca_id',
                    'nombre','descripcion','stock','tamano_litros','ultimo_precio_compra','alicuota_iva',
                    'ultima_fecha_actualizacion_precio')
                        ->where('nombre','LIKE','%'.$buscar.'%')
                        ->orWhere('descripcion','LIKE','%'.$buscar.'%')
                        ->orderBy('nombre','asc','descripcion','asc')
                        ->paginate();

        return view('productos.index', compact('productos','buscar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nombre'=>['required'],
            'marca'=>['required'],
            'tamano'=>['bail','required','numeric','gt:0','lt:9999'], /* GreaterThan gt:55 LessThan lt:9999 */
            'descripcion'=>['required']
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->tamano_litros = $request->tamano;
        $producto->descripcion = $request->descripcion;

        $producto->save();

        return redirect()->route('productos.show', $producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    // 
    public function show(Producto $producto)
    {
        // existe un objeto de tipo Producto llamado $producto
        // que contiene toda la información del registro de la tabla cuyo id es el del parámetro
        // dump($producto);

        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre'=>['required'],
            'marca'=>['required'],
            'tamano'=>['bail','required','numeric','gt:0','lt:9999'],
            'descripcion'=>['required']
        ]);

        $producto->nombre = $request->nombre;
        $producto->marca = $request->marca;
        $producto->tamano_litros = $request->tamano;
        $producto->descripcion = $request->descripcion;

        $producto->save();

        return view('productos.show', compact('producto'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
