<!-- Modal -->
<div class="modal fade" id="modalUpdate{{ $servicio->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLabel">Editar servicio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="{{ route('servicios.update', $servicio->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ $servicio->nombre }}">
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ $servicio->descripcion }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio" id="precio"
                            value="{{ $servicio->precio }}">
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="estado">
                            <option value="{{\App\Models\Servicio::Activo}}" {{ $servicio->estado == \App\Models\Servicio::Activo ? 'selected' : '' }}>Activo</option>
                            <option value="{{\App\Models\Servicio::Inactivo}}" {{ $servicio->estado == \App\Models\Servicio::Inactivo ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" onclick="return confirm('¿Estás seguro de guardar los cambios?')">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
            </div>
        </div>
    </div>
</div>
