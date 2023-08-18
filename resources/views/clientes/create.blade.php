<!-- MODAL  -->
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
                var nombre = $('#primernombre').val().trim();
                var nombre2 = $('#segundonombre').val().trim();
                var apellido = $('#primerapellido').val().trim();
                var segundoapellido = $('#segundoapellido').val();
                var tipoDocumento = $('#tipodocumento').val();
                var documento = $('#documento').val().trim();
                var celular = $('#celular').val().trim();
                var correo = $('#correo').val().trim();

                if (
                    nombre === '' ||
                    apellido === '' ||
                    tipoDocumento === '' ||
                    documento === '' ||
                    segundoapellido === '' ||
                    celular === '' ||
                    correo === ''
                ) {
                    return false;
                }

                return true;
            }
            $('#primernombre').on('input', function() {
                var nombre = $(this).val();
                var errorMensaje = $('#nombreError');

                if (nombre.trim() === '') {
                    errorMensaje.text('El nombre es requerido');
                } else if (nombre.includes(' ')) {
                    errorMensaje.text('El nombre no puede contener espacios');
                } else if (!validateAlphaNumeric(nombre)) {
                    errorMensaje.text('El nombre no puede contener caracteres especiales');
                } else {
                    errorMensaje.text(''); // Borrar el mensaje de error
                }
            });

            function validateAlphaNumeric(input) {
                var re = /^[a-zA-Z0-9]+$/;
                return re.test(input);
            }

            $('#segundonombre').on('input', function() {
                var nombre2 = $(this).val();
                var errorMensaje = $('#nombreSError');

                if (nombre2.trim() === '') {
                    errorMensaje.text('El nombre es requerido');
                } else if (nombre2.includes(' ')) {
                    errorMensaje.text('El nombre no puede contener espacios');
                } else if (!validateAlphaNumeric(nombre2)) {
                    errorMensaje.text('El nombre no puede contener caracteres especiales');
                } else {
                    errorMensaje.text(''); // Borrar el mensaje de error
                }

                if (nombre2.trim() === '') {
                    errorMensaje.text(''); // Borrar el mensaje de error si el campo está vacío
                }
            });

            function validateAlphaNumeric(input) {
                var re = /^[a-zA-Z0-9]+$/;
                return re.test(input);
            }


            $('#primerapellido').on('input', function() {
                var apellido = $(this).val();
                var errorMensaje = $('#apellidoError');

                if (apellido.trim() === '') {
                    errorMensaje.text('El apellido es requerido');
                } else if (apellido.includes(' ')) {
                    errorMensaje.text('El apellido no puede contener espacios');
                } else if (!validateLetters(apellido)) {
                    errorMensaje.text('El apellido no puede contener números ni caracteres especiales');
                } else {
                    errorMensaje.text(''); 
                }
            });

            function validateLetters(input) {
                var re = /^[a-zA-Z]+$/;
                return re.test(input);
            }

            $('#segundoapellido').on('input', function() {
                var segundoapellido = $(this).val();
                var errorMensaje = $('#apellidoSError');

                if (segundoapellido.trim() === '') {
                    errorMensaje.text('El segundo apellido es requerido');
                } else if (segundoapellido.includes(' ')) {
                    errorMensaje.text('El segundo apellido no puede contener espacios');
                } else if (!validateLetters(segundoapellido)) {
                    errorMensaje.text('El segundo apellido no puede contener números ni caracteres especiales');
                } else {
                    errorMensaje.text(''); 
                }
            });

            function validateLetters(input) {
                var re = /^[a-zA-Z]+$/;
                return re.test(input);
            }

            $('#tipodocumento').on('change', function() {
                var tipodoc = $(this).val();

                if (tipodoc === '') {
                    $('#tipodocError').text('Seleccione el tipo documento');
                } else {
                    $('#tipodocError').text('');
                }
            });

            $('#documento').on('input', function() {
                var documento = $(this).val();

                if (documento.trim() === '') {
                    $('#documentoError').text('El documento es requerido');
                } else if (documento.includes(' ')) {
                    $('#documentoError').text('El documento no puede contener espacios');
                } else if (documento.length < 6) {
                    $('#documentoError').text('El documento de identidad debe tener al menos 6 dígitos');
                } else {
                    $('#documentoError').text('');
                }
            });

            $('#celular').on('input', function() {
                var celular = $(this).val();

                if (celular.trim() === '') {
                    $('#celularError').text('El número de celular es requerido');
                } else if (celular.includes(' ')) {
                    $('#celularError').text('El número de celular no puede contener espacios');
                } else if (celular.length < 10) {
                    $('#celularError').text('El celular debe tener 10 dígitos');
                } else if (!/^\d+$/.test(celular)) {
                    $('#celularError').text('El número de celular debe contener solo dígitos');
                } else {
                    $('#celularError').text('');
                }
            });

            $('#correo').on('input', function() {
                var correo = $(this).val();

                if (correo.trim() === '') {
                    $('#correoError').text('El correo es requerido');
                } else if (!validateEmail(correo)) {
                    $('#correoError').text('El correo no tiene un formato válido');
                } else {
                    $('#correoError').text('');
                }
            });

            function validateEmail(email) {
                var re = /\S+@\S+\.\S+/;
                return re.test(email);
            }

            $('#submitButton').on('click', function(event) {
                if (!validarFormulario()) {
                    event.preventDefault();
                }
            });
        });
    </script>
</head>
<body>
<div class="modal fade" id="modalCre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR CLIENTE</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!--Clave evita error -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                         <label for="" class="form-label">Nombre</label>
                        <input type="text" placeholder="Nombre" class="form-control" id="primernombre" name="primernombre" required>
                            <span id="nombreError" class="text-danger"></span>
                     </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Segundo Nombre</label>
                        <input type="text" placeholder="Segundo Nombre" class="form-control" id="segundonombre" name="segundonombre">
                        <span id="nombreSError" class="text-danger"></span>
                     </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Primer Apellido</label>
                        <input type="text" placeholder="Primer Apellido" class="form-control" id="primerapellido" name="primerapellido" required>
                        <span id="apellidoError" class="text-danger"></span>
                     </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Segundo Apellido</label>
                        <input type="text" placeholder="Segundo Apellido" class="form-control" id="segundoapellido" name="segundoapellido">
                        <span id="apellidoSError" class="text-danger"></span>
                     </div>
                    <div class="col-md-6">
                        <label for="tipodocumento" class="form-label">Tipo documento</label>
                        <select name="tipodocumento" id="tipodocumento" class="form-control">
                             <option value="">Seleccione el tipo documento</option>
                             <option value="CC">Cédula ciudadana</option>
                             <option value="CE">Cédula extranjera</option>
                             <option value="T.I">Tarjeta Identidad</option>
                             <option value="N.T">Nit</option>
                             <option value="PA">Pasaporte</option>
                         </select>
                                <span id="tipodocError" class="text-danger"></span>
                      </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Documento</label>
                        <input type="number" placeholder="Documento" class="form-control" id="documento" name="documento" required>
                         <span id="documentoError" class="text-danger"></span>
                     </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Celular</label>
                        <input type="number" placeholder="Celular" class="form-control" id="celular" name="celular" required>
                        <span id="celularError" class="text-danger"></span>
                     </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Correo</label>
                    <div class="input-group has-validation">
                         <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" placeholder="Correo" class="form-control" id="correo" name="correo" aria-describedby="inputGroupPrepend" required>
                     </div>
                        <span id="correoError" class="text-danger"></span>
                     </div>
                    <div>
                         <input type="hidden" name="estado" id="estado" value="{{app\models\Cliente::Activo}}">
                      </div>
                    </div>
                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-primary" type="submit" id="submitButton">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
