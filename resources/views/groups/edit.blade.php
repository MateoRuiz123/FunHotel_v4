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
        function fiCVen() {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Estás seguro de editar la ficha?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#12B901',
                cancelButtonColor: '#E41919'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('FichaForm').submit();
                }
            });
        }
    </script>
</head>
<body>
    <div class="modal fade" id="modalEdit{{ $group->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCreateLabel">Editar nombre de la ficha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><br>
                <div class="modal-body">
                    <form action="{{ route('groups.update', $group) }}" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')
    
                        <div class="col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $group->name }}" required>
                        </div>
                    </form><br>
                    <div class="modal-footer">
                        <button type="submit" onclick="fiCVen()" class="btn btn-primary">Actualizar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

