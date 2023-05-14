<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompraAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CompraCollection(Compra::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DetallesCompra::agregarDetallesCompra($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new CompraResource(Compra::where('id',$id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'Compra' => 'exists:compra,id',
        ]);
        if ($validated){
            //Para todos detalles compra asociados
                //DetallesCompra::quitarDetallesCompra($request);
            Compra::quitarCompra($request);
        }
    }
}
