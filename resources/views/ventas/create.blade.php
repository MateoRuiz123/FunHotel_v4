@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function ventasConfirmacion() {
        Swal.fire({
            title: 'Confirmación',
            text: '¿Estás seguro de crear esta venta?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Estoy seguro',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#12B901',
            cancelButtonColor: '#E41919'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('Ventasform').submit();
            }
        });
    }
</script>
<div class="row">
    <div class="col-lg-6">
        <div class="card-body">
            <h1 class="card-title fs-5">Crear Venta</h1>
            <form id="Ventasform" class="row g-7 needs-validation" method="POST" action="{{ route('ventas.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="idReserva">Reserva:</label>
                    <select name="idReserva" class="form-control">
                        <option selected disabled>Seleccione</option>
                        @foreach ($reservas as $reserva)
                        <option value="{{ $reserva->id }}">{{ $reserva->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control" name="cliente" id="cliente" readonly>
                </div>
                <div class="mb-4">
                    <label for="servicio" class="form-label">Servicio</label>
                    <input type="text" class="form-control" name="servicio" id="servicio" readonly>
                </div>

                <div class="mb-4">
                    <label for="validationCustom01" class="form-label">Fecha de la venta</label>
                    <input type="date" class="form-control" name="fecha_venta" id="validationCustom01" required>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese la fecha.
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="ventasConfirmacion()">Crear <i class="bi bi-plus-circle"></i></button>
                <a class="btn btn-light" href="{{ route('roles.index') }}">Volver</a>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Cuando se seleccione una reserva
            $('select[name="idReserva"]').on('change', function() {
                var idReserva = $(this).val();

                // Realizar la solicitud AJAX
                $.ajax({
                    url: '/ventas-obtener-informacion-reserva/' + idReserva,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Actualizar el campo de cliente con el ID del cliente
                        $('#cliente').val(response.cliente.primerNombre);

                        // Actualizar el campo de servicio con el nombre del servicio
                        $('#servicio').val(response.servicio.nombre);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#agregarProductos').on('change', function() {
                var option = $(this).val();
                if (option === 'si') {
                    $('#productosNuevos').show();
                } else {
                    $('#productosNuevos').hide();
                }
            });
        });


        const fechaVentaInput = document.getElementById('validationCustom01');

        // PONER LA FECHA AUTOMATICAMENTE
        document.addEventListener('DOMContentLoaded', function() {
            const fechaVentaInput = document.getElementById('validationCustom01');
            const fechaActual = new Date().toISOString().split('T')[0];
            fechaVentaInput.value = fechaActual;
        });
        fechaVentaInput.addEventListener('input', function() {
            if (!fechaVentaInput.checkValidity()) {
                fechaVentaInput.classList.add('is-invalid');
                fechaVentaInput.classList.remove('is-valid');
            } else {
                fechaVentaInput.classList.add('is-valid');
                fechaVentaInput.classList.remove('is-invalid');
            }
        }); 
    </script>
    @endsection   