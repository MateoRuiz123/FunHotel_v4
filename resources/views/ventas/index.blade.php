@extends('layouts.app')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Datos Ventas</h6>
            </div>
            <div class="col-md-4">
                @can('venta-create')
                    <div class="float-end d-none d-md-block">
                        <a href="/venta-create" class="btn btn-primary">Registrar</a>
                    </div>
                @endcan
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
                            <th>Id del Cliente</th>
                            <th>Nombre de Cliente</th>
                            <th>Fecha de Venta</th>
                            <th>Id servicio</th>
                            <th>Nombre del servicio</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->cliente ? $venta->cliente->id : 'N/A' }}</td>
                                <td>{{ $venta->cliente->primerNombre }}</td>
                                <td>{{ $venta->fecha_venta }}</td>
                                <td>
                                    @foreach ($venta->servicios as $servicio)
                                        <span>{{ $servicio->id }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($venta->servicios as $servicio)
                                        <span>{{ $servicio->nombre }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $venta->total }}</td>
                                <td>{{ $venta->estado_texto }}</td>
                                <td>
                                    <a href="{{ route('ventas.show', ['venta' => $venta->id]) }}" class="btn btn-primary">
                                        <i class="bi bi-search"></i>
                                    </a>
                                    @can('venta-edit')
                                        <a href="{{ route('ventas.edit', ['venta' => $venta->id]) }}" class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    @endcan
                                    @can('venta-delete')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $venta->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                            @include('ventas.delete')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- @foreach ($ventas as $venta)
        <div class="modal fade" id="serviciosSeleccionados{{ $venta->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalServiciosSeleccionados{{ $venta->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalServiciosSeleccionados{{ $venta->id }}">Servicios Seleccionados
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            @foreach ($venta->servicios as $servicio)
                                <li>{{ $servicio->nombre }}</li>
                                <!-- Agrega aquí cualquier otra información del servicio que deseas mostrar -->
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
@endsection
