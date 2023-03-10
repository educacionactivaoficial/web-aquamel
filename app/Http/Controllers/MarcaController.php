<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class marcaController extends Controller
{
    public function index(Request $request)
    {
        $buscar=trim($request->get('buscar'));

        $marcas = Marca::select('id','nombre','descripcion')
                    ->where('nombre','LIKE','%'.$buscar.'%')
                    ->orWhere('descripcion','LIKE','%'.$buscar.'%')
                    ->orderBy('nombre','asc','descripcion','asc')
                    ->paginate();

        return view('marcas.index', compact('marcas','buscar'));
    }


    public function create()
    {
        return view ('marcas.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required'],
            'descripcion'=>['required']
        ]);

        $marca = new marca();
        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;

        $marca->save();

        return redirect()->route('marcas.show', $marca);
    }

    public function show(marca $marca)
    {
        return view('marcas.show', compact('marca'));
    }


    public function edit(marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }


    public function update(Request $request, marca $marca)
    {
        $request->validate([
            'nombre'=>['required'],
            'descripcion'=>['required']
        ]);

        $marca->nombre = $request->nombre;
        $marca->descripcion = $request->descripcion;

        $marca->save();

        return view('marcas.show', compact('marca'));
    }


    public function destroy(marca $marca)
    {
        $marca->delete();

        return redirect()->route('marcas.index');
    }
}
