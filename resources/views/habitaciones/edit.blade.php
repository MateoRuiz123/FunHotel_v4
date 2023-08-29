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
                text: '¿Estás seguro de editar la habitación?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#12B901',
                cancelButtonColor: '#E41919'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('Updateform').submit();
                }
            });
        }
    </script>
</head>
<body>
    <div class="modal fade" id="modalUpdate{{ $habitacion->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCreateLabel">Editar habitación</h1><br>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div><br>
                <div class="modal-body">
                    <form id="Updateform" action="{{ route('habitaciones.update', $habitacion->id) }}" method="post" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="numeroHabitacion">Número de Habitación</label>
                                <input class="form-control" type="text" name="numeroHabitacion" id="numeroHabitacion"
                                    value="{{ $habitacion->numeroHabitacion }}">
                            </div>
                            <div class="col-md-6">
                                <label for="descripcion">Descripción</label>
                                <input class="form-control" type="text" name="descripcion" id="descripcion"
                                    value="{{ $habitacion->descripcion }}">
                            </div>
                            <div class="col-md-6"><br>
                                <label for="idCategoria">Categoría</label>
                                <select class="form-select" name="idCategoria" id="idCategoria">
                                    <option value="" selected disabled>Seleccione</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            @if ($categoria->id == $habitacion->idCategoria) selected @endif>
                                            {{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6"><br>
                                <label for="estado">Estado</label>
                                <select class="form-select" name="estado" id="estado">
                                    <option value="{{ \App\Models\Habitacion::Disponible }}"
                                        @if ($habitacion->estado == \App\Models\Habitacion::Disponible) selected @endif>Disponible</option>
                                    <option value="{{ \App\Models\Habitacion::Ocupado }}"
                                        @if ($habitacion->estado == \App\Models\Habitacion::Ocupado) selected @endif>Ocupado</option>
                                    <option value="{{ \App\Models\Habitacion::Mantenimiento }}"
                                        @if ($habitacion->estado == \App\Models\Habitacion::Mantenimiento) selected @endif>Mantenimiento</option>
                                </select>
                            </div>
    
                            <br>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="mostrarConfirmacion()" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
