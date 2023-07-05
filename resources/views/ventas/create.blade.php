@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body">
                <h1 class="card-title fs-5">Crear Venta</h1>
                <form class="row g-7 needs-validation" method="POST" action="{{ route('ventas.store') }}"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="cliente_id">Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-control">
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->primerNombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="validationCustom01" class="form-label">Fecha de la venta</label>
                        <input type="date" class="form-control" name="fecha_venta" id="validationCustom01" required>
                        <div class="valid-feedback">
                            Correcto!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, ingrese la fecha (Gracias).
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" value="Activo" disabled class="form-control">
                        <input type="hidden" class="form-control" name="estado" id="estado" value="{{\App\Models\Venta::Activo}}">
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="form-label">Id servicio</label>
                        <select class="form-control" name="servicios[]" id="idServicio" multiple>
                            <option selected disabled>Seleccione</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}" data-precio="{{ $servicio->precio }}"
                                    @if (in_array($servicio->id, old('servicios', []))) selected @endif>{{ $servicio->id }} -
                                    {{ $servicio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" name="total" id="total" readonly>
                    </div>
                    <div>
                        <input type="hidden" name="estado" id="estado" value="{{app\models\Venta::Activo}}">
                    </div>
                    <td>
                        <button type="submit" class="btn btn-primary">Guardar <i class="bi bi-plus-circle"></i></button>
                    </td>

                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title fs-5">Servicios Elegidos</h1>
                    <hr>
                    <ul id="serviciosElegidos"></ul>

                    <div class="mb-4">
                        <hr>
                        <label for="precio" class="form-label">Precio del servicio</label>
                        <input type="text" class="form-control" name="precio" id="precio" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const selectServicio = document.getElementById('idServicio');
        const precioInput = document.getElementById('precio');
        const totalInput = document.getElementById('total');
        const serviciosElegidosList = document.getElementById('serviciosElegidos');
        const fechaVentaInput = document.getElementById('validationCustom01');

        // PONER LA FECHA AUTOMATICAMENTE
        document.addEventListener('DOMContentLoaded', function() {
            const fechaVentaInput = document.getElementById('validationCustom01');
            const fechaActual = new Date().toISOString().split('T')[0];
            fechaVentaInput.value = fechaActual;
        });
        document.addEventListener('DOMContentLoaded', function() {
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        // Validación adicional para campos vacíos
                        var inputs = form.querySelectorAll('input[required], select[required]');
                        Array.prototype.slice.call(inputs).forEach(function(input) {
                            if (input.value.trim() === '') {
                                input.setCustomValidity('Este campo es requerido');
                            } else {
                                input.setCustomValidity('');
                            }
                        });

                        // Validación adicional para el campo "Elegir Servicio"
                        var selectServicio = document.getElementById('idServicio');
                        if (selectServicio.value === '') {
                            selectServicio.setCustomValidity('Debe seleccionar un servicio');
                        } else {
                            selectServicio.setCustomValidity('');
                        }
                    }

                    form.classList.add('was-validated');
                });
            });
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
        let serviciosElegidos = [];

        selectServicio.addEventListener('change', function() {
            const selectedOption = selectServicio.options[selectServicio.selectedIndex];

            if (selectedOption.value !== '') {
                // Obtener el precio del servicio seleccionado
                const precio = selectedOption.dataset.precio;

                // Actualizar el campo de precio
                precioInput.value = precio;

                // Calcular el total actual sumando el precio del servicio
                const totalActual = parseFloat(totalInput.value) || 0;
                const nuevoTotal = totalActual + parseFloat(precio);

                // Actualizar el campo de total
                totalInput.value = nuevoTotal;

                // Agregar el servicio elegido a la lista de servicios elegidos
                const servicioElegido = {
                    id: selectedOption.value,
                    nombre: selectedOption.textContent,
                    precio: parseFloat(precio)
                };

                serviciosElegidos.push(servicioElegido);

                // Mostrar los servicios elegidos en la lista
                mostrarServiciosElegidos();
            }
        });

        function mostrarServiciosElegidos() {
            serviciosElegidosList.innerHTML = '';

            serviciosElegidos.forEach(function(servicio) {
                const li = document.createElement('li');
                li.textContent = servicio.nombre;

                const eliminarser = document.createElement('button');
                eliminarser.textContent = 'x';
                eliminarser.classList.add('btn', 'btn-danger', 'btn-sm', 'ms-2');
                eliminarser.addEventListener('click', function() {
                    eliminarServicioElegido(servicio);
                });

                li.appendChild(eliminarser);
                serviciosElegidosList.appendChild(li);
            });
        }

        function eliminarServicioElegido(servicio) {
            const index = serviciosElegidos.findIndex(function(elegido) {
                return elegido.id === servicio.id;
            });

            if (index > -1) {
                // Restar el precio del servicio eliminado del total
                const totalActual = parseFloat(totalInput.value) || 0;
                const nuevoTotal = totalActual - servicio.precio;
                totalInput.value = nuevoTotal;

                // Eliminar el servicio de la lista de servicios elegidos
                serviciosElegidos.splice(index, 1);

                // Volver a mostrar los servicios elegidos en la lista
                mostrarServiciosElegidos();

                // Vaciar el campo de precio
                precioInput.value = '';
            }
        }
    </script>
@endsection
