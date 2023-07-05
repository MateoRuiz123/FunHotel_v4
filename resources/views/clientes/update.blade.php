<!-- Actualiza y elimina -->
<!-- Modal -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarAlerta() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Deseas actualizar el registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                customClass: {
                    icon: 'swal2-icon-alert',
                },
                buttonsStyling: false,
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    document.getElementById('edit-form').submit();
                }
            });
        }
    </script>

</head>

<body>
    <div class="modal fade" id="EDITAR{{ $cliente->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDITAR CLIENTE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit-form" action="{{ route('clientes.update', $cliente->id) }}" method="post"
                    enctype="multipart/form-data" onsubmit="event.preventDefault(); mostrarAlerta();">

                    @csrf
                    <!--Clave evita error -->
                    @method('PUT')
                    <!-- Metodo para actualizar -->
                    <div class="modal-body">
                        <!--BS5-form-input -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="primernombre" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->primerNombre }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" name="segundonombre" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->segundoNombre }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" name="primerapellido" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->primerApellido }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" name="segundoapellido" id=""
                                        aria-describedby="helpId" placeholder=""
                                        value="{{ $cliente->segundoApellido }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Tipo documento</label>
                                    <select class="form-control" name="documento" id="tipodocumento" required>
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
                                    <input type="text" class="form-control" name="numeroDocumento" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->numeroDocumento }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Celular</label>
                                    <input type="text" class="form-control" name="celular" id=""
                                        aria-describedby="helpId" placeholder="" value="{{ $cliente->celular }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustomUsername" class="form-label">Correo</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="email" placeholder="Correo" class="form-control"
                                        id="validationCustomUsername" name="correo"
                                        aria-describedby="inputGroupPrepend" value="{{ $cliente->correo }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Estado</label>
                                <select class="form-select" name="estado" id="estado">
                                    <option value="{{ \App\Models\Cliente::Activo }}"
                                        @if ($cliente->estado == \App\Models\Cliente::Activo) selected @endif>Activo</option>
                                    <option value="{{ \App\Models\Cliente::Inactivo }}"
                                        @if ($cliente->estado == \App\Models\Cliente::Inactivo) selected @endif>Inactivo</option>
                                </select>

                            </div>
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary"
                                onclick="mostrarAlerta()">Actualizar</button>

                        </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
