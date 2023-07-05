<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Servicio;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Carbon\Carbon;

class VentaControlador extends Controller
{
    function __construct()
    {
        $this->middleware('permission:venta-list|venta-create|venta-edit|venta-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:venta-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:venta-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:venta-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        $serviciosElegidos = []; // Inicializar la variable

        return view('ventas.index', compact('ventas', 'serviciosElegidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $servicios = Servicio::all();
        $clientes = Cliente::all();

        return view('ventas.create', compact('servicios', 'clientes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->fecha_venta = $request->input('fecha_venta');
        // $venta->estado = $request->input('estado');
        $venta->estado = Venta::Activo;
        $venta->total = $request->input('total');
        $venta->cliente_id = $request->input('cliente_id');

        $venta->save();

        $servicios = $request->input('servicios');
        $venta->servicios()->attach($servicios);

        $serviciosElegidos = [];
        if ($request->filled('servicios')) {
            foreach ($request->input('servicios') as $servicioId) {
                $servicio = Servicio::find($servicioId);
                $serviciosElegidos[] = $servicio;
            }
        }

        $ventas = Venta::with('cliente')->get();

        return redirect()->route('ventas.index')->with('mensaje', 'Venta creada con éxito');
        // return redirect()->back()->with('error', 'Hubo un error al guardar la venta');
    }


    public function show(Venta $venta, Request $request)
    {
        $servicios = Servicio::all();
        $clientes = Cliente::all();
        return view('ventas.show', compact('venta', 'servicios', 'clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        $clientes = Cliente::all();
        $servicios = Servicio::all();
        return view('ventas.update', compact('venta', 'servicios', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        $venta->estado = $request->input('estado');
        $venta->save();
        return redirect()->route('ventas.index')->with('mensaje', 'Venta Actualizar con éxito');
        return redirect()->back()->with('error', 'Hubo un error al Actualizar la venta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->servicios()->detach(); // Eliminar las relaciones con los servicios
        $venta->delete();
        return redirect()->back()->with('mensaje', 'Venta eliminada con éxito');
    }
}
