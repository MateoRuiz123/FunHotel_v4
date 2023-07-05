@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title">Detalles de Venta</h4>
                        <div class="table-responsive col-md-12 scrollable-table">
                            <table class="table" id="detalleVenta">
                                <thead>
                                    <tr>
                                        <th id="campo">Cliente</th>
                                        <th id="campo">ID de venta</th>
                                        <th id="campo">Servicios</th>
                                        <th id="campo">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($venta->servicios as $servicio)
                                        <tr>
                                            <td>
                                                @foreach ($clientes as $cliente)
                                                    @if ($cliente->id == $venta->cliente_id)
                                                        {{ $cliente->primerNombre }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $venta->id }}</td>
                                            <td>
                                                @foreach ($venta->servicios as $servicio)
                                                    {{ $servicio->nombre }}
                                                    <!-- Agrega aquí cualquier otra información del servicio que deseas mostrar -->
                                                @endforeach
                                            </td>
                                            <td> @foreach ($venta->servicios as $servicio)
                                                    {{ $servicio->precio }}
                                                    <!-- Agrega aquí cualquier otra información del servicio que deseas mostrar -->
                                                @endforeach</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-11 text-center"  title="total">
                                    <label for="" class="form-control-label">Precio total</label>

                                    <p>
                                        {{$venta->total}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted" title="Volver a las Ventas">
                        <a href="/ventas" class="btn btn-primary float-right">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
