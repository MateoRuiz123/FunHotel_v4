@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Datos categorías</h6>
            </div>

            <div class="col-md-4">
                <div class="float-end d-none d-md-block">

                    @can('categoria-create')
                        @include('categorias.create')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
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

                <h4 class="card-title"></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Fecha de creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                <td>{{ $categoria->descripcion }}</td>
                                <td>{{ $categoria->estado_texto }}</td>
                                <td>{{ $categoria->created_at }}</td>
                                <td>
                                    @can('categoria-edit')
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#modalUpdate{{ $categoria->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    @endcan
                                    @can('categoria-delete')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete{{ $categoria->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    @endcan
                                </td>
                            </tr>
                            @include('categorias.update')
                            {{-- @include('categorias.delete') --}}
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->


    <!-- Modal -->
    <div class="modal fade" id="modalDelete{{ $categoria->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!--Clave evita error -->
                    @method('Delete')
                    <div class="modal-body">
                        ¡¿Estas seguro de eliminar a <strong> {{ $categoria->nombre }} ?!</strong>
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
