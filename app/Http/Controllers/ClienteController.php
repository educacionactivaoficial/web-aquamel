<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $buscar=trim($request->get('buscar'));

        $clientes = Cliente::select('id','nombre','apellido','email','telefono')
                    ->where('nombre','LIKE','%'.$buscar.'%')
                    ->orWhere('apellido','LIKE','%'.$buscar.'%')
                    ->orderBy('nombre','asc','apellido','asc')
                    ->paginate();

        return view('p_clientes.index', compact('clientes','buscar'));
    }


    public function create()
    {
        return view('p_clientes.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required'],
            'apellido'=>['required'],
            'email'=>['bail','required','email'], 
            'telefono'=>['required','numeric','gt:0','lt:9999']/* GreaterThan gt:55 LessThan lt:9999 */
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;

        $cliente->save();

        return redirect()->route('clientes.show', $cliente);
    }


    public function show(Cliente $cliente)
    {
        return view('p_clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('p_clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre'=>['required'],
            'apellido'=>['required'],
            'email'=>['bail','required','email',],
            'telefono'=>['bail','required','numeric','gt:0','lt:9999']
        ]);

        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;

        $cliente->save();

        return view('p_clientes.show', compact('cliente'));
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
