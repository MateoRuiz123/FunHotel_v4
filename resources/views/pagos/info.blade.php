<!-- Modal Edit -->
<div class="modal fade" id="edit{{ $pago->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Metodo de pago</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('pagos.update', $pago->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="" class="form-label"> Nombre Metodo de pago</label>
                        <input type="text" class="form-control" name="nombre" id=""
                            aria-describedby="helpId" placeholder="" value="{{ $pago->nombre }}">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label"> Estado</label>
                        <select class="form-select" name="estado" id="estado">
                            <option value="{{\app\models\pago::Activo}}" @if ($pago->estado == \app\models\pago::Activo) selected @endif>Activo</option>
                            <option value="{{\app\models\pago::Inactivo}}" @if ($pago->estado == \app\models\pago::Inactivo) selected @endif>Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>

            </div>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>


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
