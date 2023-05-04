<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcion;
use App\Models\Pelicula;
use App\Models\Sala;

class FuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $funciones = Funcion::orderBy('id')->paginate(10);
        return view('funcion.index', compact('funciones'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $peliculas = Pelicula::where('habilitado',true);
        $salas = Sala::where('habilitado',true);
        return view('funcion.create', compact('peliculas'), compact('salas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idPelicula' => 'exists:pelicula',
            'idSala' => 'exists:sala',
            //NINGUNA FUNCION EN ESA SALA A ESA FECHA Y HORA --> Hacer una consulta a la BD, si existe no validar
        ]);
        Funcion::agregarFuncion($request);
        return redirect()->route('funcion.index')->with('Success','Funcion has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Funcion $funcion)
    {
        //
        return view('funcion.show',compact('funcion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Funcion $funcion)
    {
        return view('funcion.edit',compact('funcion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Funcion $funcion)
    {
        $validated = $request->validate([
            'id' => 'exists:funcion',
        ]);
        if ($validated){
            Funcion::habilitarFuncion($request);
        }
        return redirect()->route('funcion.index')->with('Success','Funcion has been enabled successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'id' => 'exists:funcion',
        ]);
        if ($validated){
            Funcion::quitarFuncion($request);
        }
        return redirect()->route('funcion.index')->with('Success','Funcion has been disabled successfully');
    }
}
