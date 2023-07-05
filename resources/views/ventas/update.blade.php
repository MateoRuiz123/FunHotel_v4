@extends('layouts.app')
@section('content')
    <div class="row" id="edit{{ $venta->id }}">
        <div class="col-lg-6">
            <div class="card-body">
                <h1 class="card-title fs-5">Editar Venta</h1>

                <form class="row g-7 needs-validation" method="POST"
                    action="{{ route('ventas.update', ['venta' => $venta->id]) }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="cliente_id" class="form-label">Cliente</label>
                        <select class="form-control" name="cliente_id" id="cliente_id" disabled>
                            <option value="{{ $venta->cliente->id }}">{{ $venta->cliente->primerNombre }}</option>
                        </select>
                        <input type="hidden" name="cliente_id" value="{{ $venta->cliente->id }}">
                    </div>
                    <div class="mb-4">
                        <label for="fecha_venta" class="form-label">Fecha de la venta</label>
                        <input type="date" class="form-control" name="fecha_venta" id="validationCustom01"
                            value="{{ $venta->fecha_venta }}" disabled>
                    </div>
                    {{-- <div class="mb-4">
                        <label for="estado" class="form-label">Estado:</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="activo" {{ $venta->estado === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $venta->estado === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div> --}}
                    <!-- Estado -->
                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="estado">
                            <option value="{{ \App\Models\Venta::Activo }}"
                                {{ $venta->estado == \App\Models\Venta::Activo ? 'selected' : '' }}>Activo</option>
                            <option value="{{ \App\Models\Venta::Inactivo }}"
                                {{ $venta->estado == \App\Models\Venta::Inactivo ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" name="total" id="total" readonly
                            value="{{ $venta->total }}">
                    </div>
                    <td>
                        <button type="submit" class="btn btn-primary" id="editarVenta">Editar <i
                                class="bi bi-pencil"></i></button>
                    </td>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title fs-5">Servicios Elegidos</h1>
                    <hr>
                    <ul id="serviciosElegidos">
                        @foreach ($venta->servicios as $servicio)
                            <li>{{ $servicio->nombre }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editarVentaBtn = document.getElementById('editarVenta');

            editarVentaBtn.addEventListener('click', function() {
                if (confirm('¿Estás seguro de que deseas editar la venta?')) {
                    window.location.href = '/ventas';
                }
            });
        });
    </script>
@endsection
