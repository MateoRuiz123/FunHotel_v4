<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

// modelos habitaciones, servicios, clientes
use App\Models\Habitacion;
use App\Models\Servicio;
use App\Models\Cliente;

class ReservaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:reserva-list|reserva-create|reserva-edit|reserva-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:reserva-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:reserva-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:reserva-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::all();
        $habitaciones = Habitacion::all();
        $servicios = Servicio::all();
        $clientes = Cliente::all();
        return view('reservas.index', compact('reservas', 'habitaciones', 'servicios', 'clientes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservas = new Reserva;
        $reservas->idHabitacion = $request->input('habitacion');
        $reservas->idServicio = $request->input('servicio');
        $reservas->idCliente = $request->input('cliente');
        $reservas->fecIngreso = $request->input('entrada');
        $reservas->fecSalida = $request->input('salida');
        // $reservas->estado=$request->input('estado');
        $reservas->estado = Reserva::Activo;
        // create_at
        $reservas->created_at = $request->input('created_at');
        $reservas->save();
        return redirect()->back()->with('success', 'Reserva creada exitosamente');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservas = Reserva::find($id);
        $reservas->idHabitacion = $request->input('habitacion');
        $reservas->idServicio = $request->input('servicio');
        $reservas->idCliente = $request->input('cliente');
        $reservas->fecEntrada = $request->input('entrada');
        $reservas->fecSalida = $request->input('salida');
        $reservas->estado = $request->input('estado');
        $reservas->update();
        return redirect()->back()->with('success', 'Reserva actualizada exitosamente');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservas = Reserva::find($id);
        $reservas->delete();
        return redirect()->back()->with('success', 'Reserva eliminada exitosamente');
        //
    }
}
