<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function Reve() {
        Swal.fire({
            title: 'Confirmación',
            text: '¿Estás seguro de editar la reserva?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Estoy seguro',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#12B901',
            cancelButtonColor: '#E41919'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('ReservaUpForm').submit();
            }
        });
    }
</script>
<div class="modal fade" id="edit{{ $reserva->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar reserva</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row">
                <form id="ReservaUpForm" class="row g-3" action="{{ route('reservas.update', $reserva->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="" class="form-label">Nro. Habitación</label>
                        <input type="text" class="form-control" name="habitacion" id=""
                            aria-describedby="helpId" placeholder="" value="{{ $reserva->idHabitacion }}">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Servicio</label>
                        <input type="text" class="form-control" name="servicio" id=""
                            aria-describedby="helpId" placeholder="" value="{{ $reserva->idServicio }}">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Nro. doc cliente</label>
                        <input type="text" class="form-control" name="cliente" id=""
                            aria-describedby="helpId" placeholder="" value="{{ $reserva->idCliente }}">
                    </div>

                    <div class="col-md-6"><br>
                        <label for="" class="form-label">Cliente</label>
                        <input type="text" class="form-control" name="cliente" id=""
                            aria-describedby="helpId" placeholder="" value="{{ $reserva->idCliente }}">
                    </div>
                    <div class="col-md-6"><br>
                        <label for="" class="form-label">De:</label>
                        <input type="date" class="form-control" name="entrada" id="entrada"
                            aria-describedby="helpId" placeholder="" value="{{ $reserva->FecEntrada }}">
                    </div>
                    <div class="col-md-6"><br>
                        <label for="" class="form-label">Hasta:</label>
                        <input type="date" class="form-control" name="salida" id="salida"
                            aria-describedby="helpId" placeholder="" value="{{ $reserva->FecSalida }}">
                    </div>
                    <div class="col-md-6"><br>
                        <label for="" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="estado">
                            <option value="{{\app\models\Reserva::Activo}}" @if ($reserva->estado == \app\models\Reserva::Activo) selected @endif>Activo</option>
                            <option value="{{\app\models\Reserva::Inactivo}}" @if ($reserva->estado == \app\models\Reserva::Inactivo) selected @endif>Inactivo</option>
                        </select>
                    </div>
                </form>
            </div><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" onclick="Reve()" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>


{{-- <!-- Modal Delete -->
<div class="modal fade" id="delete{{ $reserva->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar reserva</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <!--Clave evita error -->
                @method('Delete')
                <div class="modal-body">
                    ¡¿Estas seguro de eliminar a <strong> {{ $reserva->nombre }} ?!</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
