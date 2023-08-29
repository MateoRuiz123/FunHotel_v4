<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function mostrarConfirmacion() {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Estás seguro de editar el cliente?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#12B901',
                cancelButtonColor: '#E41919'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('edit-form').submit();
                }
            });
        }
    </script>
     <script>
        $(document).ready(function() {
            function validarFormulario() {
                var nombre5 = $('#nombre12').val().trim();
                var segundo = $('#nombresegundo').val().trim();
                var documento = $('#documen').val().trim();
                var apellido = $('#apellidouno').val().trim();
                var apellido2 = $('#apelli').val().trim();
                var tipo = $('#tdocu').val().trim();
                var celular = $('#celur').val().trim();

                if (
                    nombre5 === ''  ||
                    documento === ''  ||
                    apellido === ''  ||
                    tipo === ''  ||
                    celular === '' 

                ) {
                    return false;
                }

                return true;
            }

            $('#nombre12').on('input', function() {
                var nombre5 = $(this).val();
                var errorMensaje = $('#nombreUpError');

                if (nombre5.trim() === '') {
                    errorMensaje.text('El nombre es requerido');
                } else if (nombre5.includes(' ')) {
                    errorMensaje.text('El nombre no puede contener espacios');
                } else if (!validateAlphaNumeric(nombre5)) {
                    errorMensaje.text('El nombre no puede contener caracteres especiales');
                } else {
                    errorMensaje.text(''); // Borrar el mensaje de error
                }
            });


            function validateAlphaNumeric(input) {
                var re = /^[a-zA-Z0-9]+$/;
                return re.test(input);
            }

            $('#nombresegundo').on('input', function() {
                var nombresegundo = $(this).val();
                var errorMensaje = $('#segundoNError');

                if (nombresegundo.trim() === '') {
                    errorMensaje.text('Este campo no es requerido');
                } else if (nombresegundo.includes(' ')) {
                    errorMensaje.text('El nombre no puede contener espacios');
                } else if (!validateAlphaNumeric(nombresegundo)) {
                    errorMensaje.text('El nombre no puede contener caracteres especiales');
                } else {
                    errorMensaje.text(''); // Borrar el mensaje de error
                }
            });

            function validateAlphaNumeric(input) {
                var re = /^[a-zA-Z0-9]+$/;
                return re.test(input);
            }

            $('#documen').on('input', function() {
                var documen = $(this).val();

                if (documen.trim() === '') {
                    $('#documentoUpError').text('El documento es requerido');
                } else if (documen.includes(' ')) {
                    $('#documentoUpError').text('El documento no puede contener espacios');
                } else if (documen.length < 6) {
                    $('#documentoUpError').text('El documento de identidad debe tener al menos 6 dígitos');
                } else {
                    $('#documentoUpError').text('');
                }
            });

            $('#apellidouno').on('input', function() {
                var apellidouno = $(this).val();
                var errorMensaje = $('#apellidoUError');

                if (apellidouno.trim() === '') {
                    errorMensaje.text('El apellido es requerido');
                } else if (apellidouno.includes(' ')) {
                    errorMensaje.text('El apellido no puede contener espacios');
                } else if (!validateLetters(apellidouno)) {
                    errorMensaje.text('El apellido no puede contener números ni caracteres especiales');
                } else {
                    errorMensaje.text(''); 
                }
            });

            function validateLetters(input) {
                var re = /^[a-zA-Z]+$/;
                return re.test(input);
            }

            $('#apelli').on('input', function() {
                var apelli = $(this).val();
                var errorMensaje = $('#apelliSError');

                if (apelli.trim() === '') {
                    errorMensaje.text('Este campo no es requerido');
                } else if (apelli.includes(' ')) {
                    errorMensaje.text('El segundo apellido no puede contener espacios');
                } else if (!validateLetters(apelli)) {
                    errorMensaje.text('El segundo apellido no puede contener números ni caracteres especiales');
                } else {
                    errorMensaje.text(''); 
                }
            });

            function validateLetters(input) {
                var re = /^[a-zA-Z]+$/;
                return re.test(input);
            }

            
            $('#celur').on('input', function() {
                var celur = $(this).val();

                if (celur.trim() === '') {
                    $('#celuRError').text('El número de celular es requerido');
                } else if (celur.includes(' ')) {
                    $('#celuRError').text('El número de celular no puede contener espacios');
                } else if (celur.length < 10) {
                    $('#celuRError').text('El celular debe tener 10 dígitos');
                } else if (!/^\d+$/.test(celur)) {
                    $('#celuRError').text('El número de celular debe contener solo dígitos');
                } else {
                    $('#celuRError').text('');
                }
            });

            $('#corr').on('input', function() {
                var corr = $(this).val(); 

                if (corr.trim() === '') { 
                    $('#cooRError').text('El correo es requerido');
                } else if (!validateEmail(corr)) {
                    $('#cooRError').text('El correo no tiene un formato válido');
                } else {
                    $('#cooRError').text('');
                }
            });

            function validateEmail(email) {
                var re = /\S+@\S+\.\S+/;
                return re.test(email);
            }

        });
    </script>
</head>
<body>
    <div class="modal fade" id="EDITAR{{ $cliente->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">EDITAR CLIENTE</h6>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-form" action="{{ route('clientes.update', $cliente->id) }}" method="post"
                    enctype="multipart/form-data" onsubmit="event.preventDefault(); mostrarAlerta();">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="primernombre" id="nombre12"
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->primerNombre }}" required>
                                        <span id="nombreUpError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" name="segundonombre" id="nombresegundo" aria-describedby="helpId" placeholder="" value="{{ $cliente->segundoNombre }}">
                                    <span id="segundoNError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" name="primerapellido" id="apellidouno"
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->primerApellido }}"
                                        required>
                                    <span id="apellidoUError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" name="segundoapellido" id="apelli"
                                        aria-describedby="helpId" placeholder=""
                                        value="{{ $cliente->segundoApellido }}">
                                    <span id="apelliSError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Tipo documento</label>
                                    <select class="form-control" name="documento" id="" required>
                                        <option selected value="{{ $cliente->documento }}">
                                            {{ $cliente->documento }}</option>
                                        <option value="CC">Cédula ciudadana</option>
                                        <option value="CE">Cédula extranjera</option>
                                        <option value="TI">Tarjeta Identidad</option>
                                        <option value="NIT">Nit</option>
                                        <option value="PA">Pasaporte</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Documento</label>
                                    <input type="number" class="form-control" name="numeroDocumento" id="documen"
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->numeroDocumento }}"
                                        required>
                                    <span id="documentoUpError" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Celular</label>
                                    <input type="number" class="form-control" name="celular" id="celur"
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->celular }}"
                                        required>
                                    <span id="celuRError" class="text-danger"></span>
                                </div>
                            </div><br>
                            <div class="col-md-6">
                                <label for="validationCustomUsername" class="form-label">Correo</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" placeholder="Correo" id="corr" class="form-control"
                                        id="validationCustomUsername" name="correo" id="corr" aria-describedby="inputGroupPrepend"
                                        value="{{ $cliente->correo }}" required> <br>
                                </div>                            <span id="cooRError" class="text-danger"></span>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Estado</label>
                                <select class="form-select" name="estado" id="estado">
                                    <option value="{{ \App\Models\Cliente::Activo }}" @if ($cliente->estado ==
                                        \App\Models\Cliente::Activo) selected @endif>Activo</option>
                                    <option value="{{ \App\Models\Cliente::Inactivo }}" @if ($cliente->estado ==
                                        \App\Models\Cliente::Inactivo) selected @endif>Inactivo</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" onclick="mostrarConfirmacion()">Actualizar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
