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
                var nombre = $('#name').val().trim();

                if (
                    nombre === ''

                    ) {
                    return false;
                }

                return true;
            }
            $('#name').on('input', function() {
                var name = $(this).val();

                if (name.trim() === '') {
                    $('#nameError').text('El número de la ficha es requerida');
                } else if (name.includes(' ')) {
                    $('#nameError').text('El número de la ficha no puede contener espacios');
                } else if (name.length < 3) {
                    $('#nameError').text('El número de la ficha debe tener al menos 5 dígitos');
                } else if (!/^\d+$/.test(name)) {
                    $('#nameError').text('El número de la ficha debe contener solo números');
                } else {
                    $('#nameError').text('');
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLabel">Registrar nueva ficha</h1><br>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('groups.store') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control">
                        <span id="nameError" class="text-danger"></span>
                    </div>
                    <div class="col-md-12"><br>
                        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>


