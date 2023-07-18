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

                    <div class="col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="estado">
                            <option value="{{ \App\Models\Venta::Activo }}"
                                {{ $venta->estado == \App\Models\Venta::Activo ? 'selected' : '' }}>Activo</option>
                            <option value="{{ \App\Models\Venta::Inactivo }}"
                                {{ $venta->estado == \App\Models\Venta::Inactivo ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    
                    <td>
                        <button type="submit" class="btn btn-primary" id="editarVenta">Editar <i
                                class="bi bi-pencil"></i></button>
                    </td>
                </form>
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
