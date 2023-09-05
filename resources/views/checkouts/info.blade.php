<!-- Modal Edit -->
<div class="modal fade" id="edit{{$checkout->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar check-out</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{route('checkouts.update',$checkout->id)}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="" class="form-label"> Fecha de salida</label>
                        <input type="date" class="form-control" name="salida" id="" aria-describedby="helpId"
                            placeholder="" value="{{$checkout->fecSalida}}">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Id Check-in</label>
                        <input type="number" class="form-control" name="checkin" id="" aria-describedby="helpId"
                            placeholder="" value="{{$checkout->idCheckin}}">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Id Reserva</label>
                        <input type="number" class="form-control" name="reserva" id="" aria-describedby="helpId"
                            placeholder="" value="{{$checkout->idReserva}}">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Nro. doc</label>
                        <input type="text" class="form-control" name="cliente" id="" aria-describedby="helpId"
                            placeholder="" value="{{$checkout->cliente->numeroDocumento}}">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Nombre cliente</label>
                        <input type="text" class="form-control" name="reserva" id="" aria-describedby="helpId"
                            placeholder="" value="{{$checkout->cliente->primerNombre}}">
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Metodo de pago</label>
                        <input type="text" class="form-control" name="metpago" id="" aria-describedby="helpId"
                            placeholder="" value="{{$checkout->metpago->nombre}}">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="" class="form-label">Id Venta</label>
                        <input type="number" class="form-control" name="venta" id="" aria-describedby="helpId"
                            placeholder="" value="{{$checkout->idVenta}}">
                    </div>
                    <div class="col-md-4">
                        <label for="">Estado</label>
                        <select class="form-select" name="estado" id="estado">
                            <option value="{{\App\Models\Checkout::Activo}}" {{ $checkout->estado == \App\Models\Checkout::Activo ? 'selected' : '' }}>Activo</option>
                            <option value="{{\App\Models\Checkout::Inactivo}}" {{ $checkout->estado == \App\Models\Checkout::Inactivo ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Delete -->
<div class="modal fade" id="delete{{$checkout->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar check-out</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('checkouts.destroy',$checkout->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <!--Clave evita error -->
                @method('Delete')
                <div class="modal-body">
                    ¡¿Estas seguro de eliminar el check-out #<strong> {{ $checkout->id }} </strong> de la fecha {{ $checkout->fecSalida}}?!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>