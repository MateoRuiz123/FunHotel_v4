<!-- Modal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function ckConfirmacion() {
        var salida = $('#salida').val().trim();
        var checkin = $('#checkin').val().trim();
        var metpago = $('#metpago').val().trim();
        var venta = $('#venta').val().trim();

        if (salida === '' ||  checkin === '' ||  metpago === '' ||  venta === '') {
            Swal.fire({
                title: 'Campos vacíos',
                text: 'Por favor, completa todos los campos antes de continuar.',
                icon: 'error',
                confirmButtonColor: '#d33'
            });
        } else {
            Swal.fire({
                title: 'Confirmación',
                text: '¿Estás seguro de crear el checkout?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Estoy seguro',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#12B901',
                cancelButtonColor: '#E41919'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('chform').submit();
                }
            });
        }
    }
</script>
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar check-out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="chform" class="row g-3" action="{{ route('checkouts.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label"> Fecha de salida</label>
                        <input type="date" class="form-control" name="salida" id="salida"
                            aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Id Check-in</label>
                        <select name="checkin" id="checkin" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($checkins as $checkin)
                                <option value="{{ $checkin->id }}">{{ $checkin->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Id Metodo pago</label>
                        <select name="metpago" id="metpago" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($metodos as $metodo)
                                <option value="{{ $metodo->id }}">{{ $metodo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Id Venta</label>
                        <select name="venta" id="venta" class="form-select">
                            <option value="">Seleccione</option>
                            @foreach ($ventas as $venta)
                                <option value="{{ $venta->id }}">{{ $venta->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <input type="hidden" name="estado" id="estado" value="{{ app\models\Checkout::Activo }}">
                    </div>
                </form>
            </div><br>
            <div class="modal-footer">
                <button type="submit" onclick="ckConfirmacion()" class="btn btn-primary">Crear</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
