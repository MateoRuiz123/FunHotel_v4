@extends('home')
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Datos reservas</h6>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    @can('reserva-create')
                        @include('reservas.create')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                            Registrar <i class="bi bi-plus-circle"></i>
                        </button>
                    @endcan
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
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
                            <th>Id</th>
                            <th>Nro Habitacion</th>
                            <th>Nro. doc cliente</th>
                            <th>Nombre cliente</th>
                            <th>Servicio</th>
                            <Th>De:</Th>
                            <Th>Hasta:</Th>
                            <th>Creacion de reserva</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->id }}</td>
                                <td>{{ $reserva->habitacion->numeroHabitacion }}</td>
                                <td>{{ $reserva->cliente->numeroDocumento }}</td>
                                <td>{{ $reserva->cliente->primerNombre }} {{ $reserva->cliente->primerApellido }} </td>
                                <td>{{ $reserva->servicio->nombre }}</td>
                                <td>{{ $reserva->fecIngreso }}</td>
                                <td>{{ $reserva->fecSalida }}</td>
                                <td>{{ $reserva->created_at }}</td>
                                <td>{{ $reserva->estado_texto }}</td>
                                <td>
                                    @can('reserva-edit')
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $reserva->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    @endcan
                                    @can('reserva-delete')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $reserva->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                            @include('reservas.info')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Delete -->
    <div class="modal fade" id="delete{{ $reserva->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar reserva</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!--Clave evita error -->
                    @method('Delete')
                    <div class="modal-body">
                        ¡¿Estas seguro de eliminar a <strong> {{ $reserva->nombre }} ?!</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
