<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all(); 
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable|string|max:255', 
            'intercomunicadores' => 'nullable|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        Cliente::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,  
            'intercomunicadores' => $request->intercomunicadores,
            'lat' => str_replace(',', '.', $request->lat),  
            'lng' => str_replace(',', '.', $request->lng),  
        ]);

        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'nullable|string|max:255', 
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'intercomunicadores' => 'nullable|string',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,  
            'lat' => str_replace(',', '.', $request->lat),  
            'lng' => str_replace(',', '.', $request->lng),  
            'intercomunicadores' => $request->intercomunicadores,
        ]);

        if ($request->has('intercomunicadores')) {
            $intercomunicadores = explode(',', $request->intercomunicadores);
            $cliente->intercomunicadores = implode(',', $intercomunicadores);
    
            $cliente->save();
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete(); 
    
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}
