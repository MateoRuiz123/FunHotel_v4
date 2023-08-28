<!-- Modal -->
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar check-in</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('checkins.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label"> Fecha de ingreso</label>
                        <input type="date" class="form-control" name="ingreso" id="ingreso"
                            aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Id Reserva</label>
                        <select class="form-select" name="reserva" id="reserva" required>
                            <option value="">Seleccione</option>
                            @foreach ($reservas as $reserva)
                                <option value="{{ $reserva->id }}">{{ $reserva->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <input type="hidden" name="estado" id="estado" value="{{ app\models\Checkin::Activo }}">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
