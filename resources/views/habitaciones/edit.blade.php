<div class="modal fade" id="modalUpdate{{ $habitacion->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCreateLabel">Editar habitación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('habitaciones.update', $habitacion->id) }}" method="post" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <label for="numeroHabitacion">Numero de Habitacion</label>
                            <input class="form-control" type="text" name="numeroHabitacion" id="numeroHabitacion"
                                value="{{ $habitacion->numeroHabitacion }}">
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion">Descripcion</label>
                            <input class="form-control" type="text" name="descripcion" id="descripcion"
                                value="{{ $habitacion->descripcion }}">
                        </div>
                        <div class="col-md-6">
                            <!-- Select idCategoria -->
                            <label for="idCategoria">Categoria</label>
                            <select class="form-select" name="idCategoria" id="idCategoria">
                                <option value="" selected disabled>Seleccione</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        @if ($categoria->id == $habitacion->idCategoria) selected @endif>
                                        {{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
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
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
