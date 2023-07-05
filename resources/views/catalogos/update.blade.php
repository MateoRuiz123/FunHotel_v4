<!-- Modal -->
<div class="modal fade" id="modalUpdate{{ $catalogo->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLabel">Editar catalogo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="POST" action="{{ route('catalogos.update', $catalogo->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="{{ $catalogo->nombre }}">
                    </div>
                    <div class="col-md-12">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion">{{ $catalogo->descripcion }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Servicio</label>
                        <select class="form-control" name="idServicio" id="idServicio">
                            <option disabled value="">Seleccione</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}" @if ($servicio->id == $catalogo->idServicio) selected @endif>
                                    {{ $servicio->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" name="estado" id="estado">
                            <option value="{{\App\Models\Catalogo::Activo}}" {{ $catalogo->estado == \App\Models\Catalogo::Activo ? 'selected' : '' }}>Activo</option>
                            <option value="{{\App\Models\Catalogo::Inactivo}}" {{ $catalogo->estado == \App\Models\Catalogo::Inactivo ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
