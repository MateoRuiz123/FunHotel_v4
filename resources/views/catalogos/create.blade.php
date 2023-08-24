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
                var nombre = $('#nombre').val().trim();
                var descripcion = $('#descripcion').val().trim();
                var id = $('#idServicio').val().trim();

                if (
                    nombre === '' ||
                    descripcion === '' 
                ) {
                    return false;
                }

                return true;
            }
            
            $('#nombre').on('input', function() {
                var nombre = $(this).val();

                if (nombre.trim() === '') {
                    $('#nombreError').text('El nombre del catálogo es requerido');
                } else {
                    $('#nombreError').text('');
                }
            });
            
            $('#descripcion').on('input', function() {
                var descripcion = $(this).val();

                if (descripcion.trim() === '') {
                    $('#descripcionError').text('La descripción del catálogo es requerida');
                } else {
                    $('#descripcionError').text('');
                }
            });

            $('#idServicio').on('change', function() {
                var id = $(this).val();

                if (id === '') {
                    $('#idError').text('Seleccione el servicio');
                } else {
                    $('#idError').text('');
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
                <h1 class="modal-title fs-5" id="modalCreateLabel">Registrar nuevo catálogo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="{{ route('catalogos.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                        <span id="nombreError" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion" required></textarea>
                        <span id="descripcionError" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Id servicio</label>
                        <select class="form-control" name="idServicio" id="idServicio" required>
                            <option value="">Seleccione</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <span id="idError" class="text-danger"></span>
                    </div>
                    <div>
                        <input type="hidden" class="form-control" name="estado" id="estado"
                            value="{{ \App\Models\Catalogo::Activo }}">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Crear</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>