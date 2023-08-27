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
                var nombre = $('#numeroHabitacion').val().trim();
                var descripcion = $('#descripcion').val().trim();
                var precio = $('#precio').val().trim();

                if (
                    nombre === '' ||
                    descripcion === '' ||
                    categoria === ''
                ) {
                    return false;
                }

                return true;
            }

            $('#nombre').on('input', function() {
                var nombre = $(this).val();

                if (nombre.trim() === '') {
                    $('#nombreError').text('El nombre del servicio es requerido');
                } else {
                    $('#nombreError').text('');
                }
            });

            $('#descripcion').on('input', function() {
                var descripcion = $(this).val();

                if (descripcion.trim() === '') {
                    $('#descripcionError').text('La descripción del servicio es requerida');
                } else {
                    $('#descripcionError').text('');
                }
            });

            $('#precio').on('input', function() {
                var precio = $(this).val();

                if (precio.trim() === '') {
                    $('#precioSError').text('El precio del servicio es requerido');
                } else {
                    $('#precioSError').text('');
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
                    <form class="row g-3" method="POST" action="{{ route('servicios.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                            <span id="nombreError" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea type="text" class="form-control" name="descripcion" id="descripcion" required></textarea>
                            <span id="descripcionError" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precio"
                                placeholder="1000000" required>
                            <span id="precioSError" class="text-danger"></span>
                        </div>
                        <div>
                            <input type="hidden" class="form-control" name="estado" id="estado"
                                value="{{ \App\Models\Servicio::Activo }}">
                        </div>

                        <div>
                            <!-- input hidden donde el valor es un datatime de la fecha y hora actual -->
                            <input type="hidden" name="created_at" id="created_at" value="">
                            <script>
                                // Obtener el elemento del campo de fecha y hora actual
                                var createdAtField = document.getElementById('created_at');

                                // Obtener la fecha y hora actual
                                var currentDate = new Date();

                                // Formatear la fecha y hora actual en el formato deseado (YYYY-MM-DD HH:MM:SS)
                                var formattedDate = currentDate.toISOString().slice(0, 19).replace('T', ' ');

                                // Asignar el valor de la fecha y hora actual al campo oculto
                                createdAtField.value = formattedDate;
                            </script>

                        </div>
                        <div class="col-md-12" style="margin-right: 30px">
                            <button type="submit" class="btn btn-primary"
                                onclick="return confirm('¿Estás seguro de guardar el registro?')">Crear</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>
