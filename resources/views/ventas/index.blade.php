@extends('layouts.app')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Datos Ventas</h6>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="/venta-create" class="btn btn-primary">Registrar <i class="bi bi-plus-circle"></i></a>
                </div>
            </div>
        </div>
    </div>
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Botones</h4>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de Venta</th>
                            <th>ID Cliente</th>
                            <th>ID Servicio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->fecha_venta }}</td>
                                <td>{{ $venta->reserva->idCliente}}</td>
                                <td>{{ $venta->reserva->idServicio }}</td>
                                <td>{{ $venta->estado_texto }}</td>
                                <td>
                                    <a href="{{ route('ventas.edit', ['venta' => $venta->id]) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete{{ $venta->id }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('ventas.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
