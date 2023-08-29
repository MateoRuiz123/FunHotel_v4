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
        function mostrarConfirmacion() {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Estás seguro de editar el servicio?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#12B901',
                cancelButtonColor: '#E41919'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('EditForm').submit();
                }
            });
        }
    </script>
</head>
<body>
    <div class="modal fade" id="modalUpdate{{ $servicio->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCreateLabel">Editar servicio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <div class="row">
                    <form id="EditForm" class="row g-3" method="POST" action="{{ route('servicios.update', $servicio->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ $servicio->nombre }}">
                        </div>
                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" class="form-control" name="precio" id="precio"
                                value="{{ $servicio->precio }}">
                        </div>
                        <div class="col-md-6"><br>
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ $servicio->descripcion }}</textarea>
                        </div>
                        <div class="col-md-6"><br>
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="{{\App\Models\Servicio::Activo}}" {{ $servicio->estado == \App\Models\Servicio::Activo ? 'selected' : '' }}>Activo</option>
                                <option value="{{\App\Models\Servicio::Inactivo}}" {{ $servicio->estado == \App\Models\Servicio::Inactivo ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </form>
                </div></div><br>
                <div class="modal-footer">
                    <button type="submit" onclick="mostrarConfirmacion()" class="btn btn-primary" >Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div> 
            </div>
        </div>
        </div>
    </div>
</body>
</html>
