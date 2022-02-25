<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * index para mostrar todas las personas
     * store para guardar una persona
     * update para actualizar una persona
     * destroy para eliminar una persona
     * edit para mostrar el formulario de edición
     */


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required | min:3',
            'email' => 'required | email | unique:personas',
            'telefono' => 'required',
            'informacionAdicional' => 'nullable',
        ]);

        $persona = new Persona();
        $persona->nombre = $request->nombre;
        $persona->email = $request->email;
        $persona->telefono = $request->telefono;
        $persona->informacionAdicional = $request->informacionAdicional;
        $persona->save();

        return redirect()->route('index')->with('success', 'Persona guardada correctamente');
    }
}
