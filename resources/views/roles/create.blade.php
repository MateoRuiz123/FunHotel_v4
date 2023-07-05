@extends('layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Crear rol</h6>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}">Volver</a>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('roles.store') }}" class="row g-3">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="name" placeholder="Nombre" class="form-control" required>
            </div>
        </div>
        <div>
            <input type="hidden" name="estado" id="estado" value="{{ Spatie\Permission\Models\Role::Activo }}"
                class="form-control">
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <strong>Permisos:</strong>
                <br>
                <div class="row">
                    @php $columnSize = ceil(count($permission) / 3); @endphp
                    @foreach ($permission->chunk($columnSize) as $column)
                        <div class="col-md-12">
                            <div class="permission-group">
                                <div class="row">
                                    @foreach ($column as $index => $value)
                                        <div class="col-md-3">
                                            <label>
                                                <input type="checkbox" name="permission[]" value="{{ $value->id }}"
                                                    class="name">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                        @if (($index + 1) % 4 == 0 && !$loop->last)
                                            <div class="w-100"></div> <!-- Nueva fila -->
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>

    <style>
        .permission-group {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .permission-group .row {
            margin-right: 0;
            margin-left: 0;
        }

        .permission-group .col-md-3 {
            padding-right: 0;
            padding-left: 0;
        }
    </style>
@endsection
