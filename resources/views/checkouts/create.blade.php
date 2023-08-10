<!-- Modal -->
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
                <form class="row g-3" action="{{ route('checkouts.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="" class="form-label"> Fecha de salida</label>
                        <input type="date" class="form-control" name="salida" id=""
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
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
