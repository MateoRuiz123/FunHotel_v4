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
        function VentanaPg() {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Estás seguro de editar el método de pago?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#12B901',
                cancelButtonColor: '#E41919'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('Updform').submit();
                }
            });
        }
    </script>
</head>
<body>
    <div class="modal fade" id="edit{{ $pago->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Método de pago</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><br>
                <div class="modal-body">
                    <form id="Updform" class="row g-3" action="{{ route('pagos.update', $pago->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="" class="form-label">Nombre Método de pago</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{ $pago->nombre }}" >
                            <span id="metodoError" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label"> Estado</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="{{\app\models\pago::Activo}}" @if ($pago->estado == \app\models\pago::Activo) selected @endif>Activo</option>
                                <option value="{{\app\models\pago::Inactivo}}" @if ($pago->estado == \app\models\pago::Inactivo) selected @endif>Inactivo</option>
                            </select>
                        </div>
                </div>
            </form><br>
            <div class="modal-footer">
                <button type="submit" id="submitButton" onclick="VentanaPg()" class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</body>
</html>

<!-- Modal Delete -->
<div class="modal fade" id="delete{{ $pago->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Metodo de pago</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('pagos.destroy', $pago->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <!--Clave evita error -->
                @method('Delete')
                <div class="modal-body">
                    ¡¿Estas seguro de eliminar el pago por<strong> {{ $pago->nombre }} ?!</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
