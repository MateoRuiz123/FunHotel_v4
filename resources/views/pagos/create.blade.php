<!-- Modal -->
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Metodo de pago</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="row g-3" action="{{route('pagos.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <label for="" class="form-label"> Nombre</label>
            <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="">
          </div>
          <div>
            <input type="hidden" name="estado" id="estado" value="{{\app\models\pago::Activo}}">
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
