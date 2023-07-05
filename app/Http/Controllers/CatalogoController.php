<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Servicio;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    function __construct(){
        $this->middleware('permission:catalogo-list|catalogo-create|catalogo-edit|catalogo-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:catalogo-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:catalogo-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:catalogo-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogos = Catalogo::all();
        // $servicios = Servicio::all();
        // servivios activos
        $servicios = Servicio::where('estado', Servicio::Activo)->get();
        return view('catalogos.index', compact('catalogos', 'servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // vista de crear catalogo
        // $servicios = Servicio::all();
        // return view('catalogos.create', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $catalogos = new Catalogo();
        $catalogos->nombre = $request->input('nombre');
        $catalogos->descripcion = $request->input('descripcion');
        $catalogos->idServicio = $request->input('idServicio');
        $catalogos->estado = Catalogo::Activo;
        $catalogos->save();
        return redirect()->back()->with('success', 'Catalogo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalogo $catalogo)
    {
        // return view('catalogos.show', compact('catalogo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalogo $catalogo)
    {
        // $servicios = Servicio::all();
        // return view('catalogos.edit', compact('catalogo', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catalogo $catalogo)
    {
        $catalogo = Catalogo::find($catalogo->id);
        $catalogo->nombre = $request->input('nombre');
        $catalogo->descripcion = $request->input('descripcion');
        $catalogo->idServicio = $request->input('idServicio');
        $catalogo->estado = $request->input('estado');
        $catalogo->update();
        return redirect()->back()->with('success', 'Catalogo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalogo $catalogo)
    {
        $catalogo = Catalogo::find($catalogo->id);
        $catalogo->delete();
        return redirect()->back()->with('success', 'Catalogo eliminado exitosamente');
    }
}
