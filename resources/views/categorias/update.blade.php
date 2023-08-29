<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarConfirmacion() {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Estás seguro de editar esta categoría?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#12B901',
                cancelButtonColor: '#E41919'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('CategoriaUpForm').submit();
                }
            });
        }
    </script>
</head>
<body>
    <div class="modal fade" id="modalUpdate{{ $categoria->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCreateLabel">Editar categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <form id="CategoriaUpForm" class="row g-3" method="POST" action="{{ route('categorias.update', $categoria->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ $categoria->nombre }}">
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ $categoria->descripcion }}</textarea>
                        </div>
                        <div class="col-md-5">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" name="estado" id="estado">
                                <option value="{{\App\Models\Categoria::Activo}}" {{ $categoria->estado == \App\Models\Categoria::Activo ? 'selected' : '' }}>Activo</option>
                                <option value="{{\App\Models\Categoria::Inactivo}}" {{ $categoria->estado == \App\Models\Categoria::Inactivo ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </form>
                </div><br>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" onclick="mostrarConfirmacion()">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
