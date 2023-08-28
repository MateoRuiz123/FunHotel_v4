<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function validarFormulario() {
                var numero = $('#numeroHabitacion').val().trim();
                var descripcion = $('#descripcion').val().trim();
                var categoria = $('#idCategoria').val().trim();

                if (
                    numero === '' ||
                    descripcion === '' ||
                    categoria === '' 
                ) {
                    return false;
                }

                return true;
            }
            $('#numeroHabitacion').on('input', function() {
                var numero = $(this).val();

                if (numero.trim() === '') {
                    $('#numeroSError').text('El número de la habitación es requerido');
                } else if (numero.includes(' ')) {
                    $('#numeroSError').text('El número de la habitación no puede contener espacios');
                } else if (numero.length < 3) {
                    $('#numeroSError').text('El número de la habitación debe tener al menos 3 dígitos');
                } else if (numero.length >= 20) {
                    $('#numeroSError').text('El número de la habitación debe tener 20 digitos o menor');
                } else if (!/^\d+$/.test(numero)) {
                    $('#numeroSError').text('El número de la habitación debe contener solo dígitos');
                } else {
                    $('#numeroSError').text('');
                }
            });

            $('#descripcion').on('input', function() {
                var descripcion = $(this).val();

                if (descripcion.trim() === '') {
                    $('#descripcionError').text('La descripción de la habitación es requerida');
                } else {
                    $('#descripcionError').text('');
                }
            });
            
            $('#idCategoria').on('change', function() {
                var categoria = $(this).val();

                if (categoria === '') {
                    $('#categoriaError').text('Seleccione la categoria de la habitación');
                } else {
                    $('#categoriaError').text('');
                }
            });

            $('#submitButton').on('click', function(event) {
                if (!validarFormulario()) {
                    event.preventDefault();
                }
            });
        });
    </script>
</head>
<body>

<div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLabel">Registrar nuevo servicio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('habitaciones.store') }}" method="post" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label for="">Numero de Habitacion</label>
                        <input class="form-control" type="text" name="numeroHabitacion" id="numeroHabitacion" required >
                        <span id="numeroSError" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="">Descripcion</label>
                        <input class="form-control" type="text" name="descripcion" id="descripcion" required>
                        <span id="descripcionError" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <!-- Select idCategoria -->
                        <label for="">Categoria</label>
                        <select class="form-select" name="idCategoria" id="idCategoria" required>
                            <option value="" >Seleccione</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <span id="categoriaError" class="text-danger"></span>
                    </div>
                    <div>
                        <input type="hidden" id="estado" name="estado" value="{{ \App\Models\Habitacion::Disponible}}">
                    </div>
                    <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>