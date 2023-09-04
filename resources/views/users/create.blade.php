@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function usuario() {
                var nombre = $('#name').val().trim();
                var apellido = $('#surname').val().trim();
                var birthday = $('#birthday').val().trim();
                var email = $('#email').val().trim();
                var password = $('#password').val().trim();
                var confirm = $('#confirm-password').val().trim();
                var roles = $('#roles').val();
        
            if (nombre === '' ||  apellido === '' ||  birthday === '' || email === '' || password  === '' || confirm === '' || roles === '' ) {
                    Swal.fire({
                        title: 'Campos vacíos',
                        text: 'Por favor, completa todos los campos antes de continuar.',
                        icon: 'error',
                        confirmButtonColor: '#d33'
                    });
                } else {
                    Swal.fire({
                        title: 'Confirmación',
                        text: '¿Estás seguro de crear el usuario?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Estoy seguro',
                        cancelButtonText: 'Cancelar',
                        confirmButtonColor: '#12B901',
                        cancelButtonColor: '#E41919'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('usuarioForm').submit();
                        }
                    });
                }
            }
        </script>
    <script>
            $(document).ready(function() {
                function validarFormulario() {
                    var nombre = $('#name').val().trim();
                    var nombrese = $('#second_name').val().trim();
                    var apellido = $('#surname').val().trim();
                    var apellidose = $('#second_surname').val().trim();
                    var birthday = $('#birthday').val().trim();
                    var email = $('#email').val().trim();
                    var password = $('#password').val().trim();
                    var confirm = $('#confirm-password').val().trim();
                    var roles = $('#roles').val();

                    if (
                        nombre === '' ||
                        apellido === '' ||
                        email === '' ||
                        password === '' ||
                        confirm === '' ||
                        roles === ''
                    ) {
                        return false;
                    }

                    return true;
                }

                $('#name').on('input', function() {
                    var nombre = $(this).val();

                    if (nombre.trim() === '') {
                        $('#nombreError').text('El nombre es requerido');
                    } else if (nombre.includes(' ')) {
                        $('#nombreError').text('El nombre no puede contener espacios');
                    } else {
                        $('#nombreError').text('');
                    }
                });

                $('#second_name').on('input', function() {
                    var nombrese = $(this).val();

                    if (nombrese.trim() === '') {
                        $('#nombreseError').text('Este campo no es requerido');
                    } else if (nombrese.includes(' ')) {
                        $('#nombreseError').text('El segundo nombre no puede contener espacios');
                    } else {
                        $('#nombreseError').text('');
                    }
                });

                $('#surname').on('input', function() {
                    var apellido = $(this).val();

                    if (apellido.trim() === '') {
                        $('#apellidoError').text('El primer apellido es requerido');
                    } else if (apellido.includes(' ')) {
                        $('#apellidoError').text('El primer apellido no puede contener espacios');
                    } else {
                        $('#apellidoError').text('');
                    }
                });

                $('#second_surname').on('input', function() {
                    var apellidose = $(this).val();

                    if (apellidose.trim() === '') {
                        $('#apellidoseError').text('Este campo no es requerido');
                    } else if (apellidose.includes(' ')) {
                        $('#apellidoseError').text('El segundo apellido no puede contener espacios');
                    } else {
                        $('#apellidoseError').text('');
                    }
                });

                $('#email').on('input', function() {
                    var email = $(this).val();
                    if (email.trim() === '') {
                        $('#emailError').text('El email es requerido');
                    } else if (!validateEmail(email)) {
                        $('#emailError').text('El email no tiene un formato válido');
                    } else {
                        $('#emailError').text('');
                    }
                });

                $('#password').on('input', function() {
                    var password = $(this).val();

                    if (password.trim() === '') {
                        $('#passwordError').text('La contraseña es requerida');
                    } else if (password.length < 8) {
                        $('#passwordError').text('La contraseña debe tener al menos 8 caracteres');
                    } else if (!/[a-zA-Z]/.test(password)) {
                        $('#passwordError').text('La contraseña debe contener al menos una letra');
                    } else if (!/\d/.test(password)) {
                        $('#passwordError').text('La contraseña debe contener al menos un número');
                    } else {
                        $('#passwordError').text('');
                    }
                });

                $('#confirm-password').on('input', function() {
                    var password = $('#password').val();
                    var confirm = $(this).val();

                    if (confirm.trim() === '') {
                        $('#confirmpasswordError').text('Debes confirmar la contraseña');
                    } else if (password !== confirm) {
                        $('#confirmpasswordError').text('Las contraseñas no coinciden');
                    } else {
                        $('#confirmpasswordError').text('');
                    }
                });

                $('#roles').on('change', function() {
                    var roles = $(this).val();

                    if (roles === '') {
                        $('#rolesError').text('Seleccione el rol');
                    } else {
                        $('#rolesError').text('');
                    }
                });

                $('#birthday').on('change', function() {
                    var birthday = $(this).val();

                    if (birthday === '') {
                        $('#birthdayError').text('Seleccione una fecha del calendario');
                    } else {
                        $('#birthdayError').text('');
                    }
                });

                function validateEmail(email) {
                    var re = /\S+@\S+\.\S+/;
                    return re.test(email);
                }

                $('#submitButton').on('click', function(event) {
                    if (!validarFormulario()) {
                        event.preventDefault();
                    }
                });
            });
        </script>
    </head>

    <body>
        <div class="container">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Crear nuevo usuario</h2>
                </div>

            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>¡Ups!</strong> Hubo algunos problemas con tus datos de entrada.
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>
        <div class="container">
            <form id="usuarioForm" action="{{ route('users.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" id="name" name="name" placeholder="Nombre" class="form-control">
                        <span id="nombreError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Segundo Nombre:</strong>
                        <input type="text" id="second_name" name="second_name" placeholder="Segundo Nombre"
                            class="form-control">
                        <span id="nombreseError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Apellido:</strong>
                        <input type="text" id="surname" name="surname" placeholder="Apellido" class="form-control">
                        <span id="apellidoError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Segundo Apellido:</strong>
                        <input type="text" id="second_surname" name="second_surname" placeholder="Segundo Apellido"
                            class="form-control">
                        <span id="apellidoseError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha de nacimiento:</strong>
                        <input type="date" id="birthday" name="birthday" placeholder="Fecha de nacimiento"
                            class="form-control">
                        <span id="birthdayError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                        <span id="emailError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Contraseña:</strong>
                        <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control">
                        <span id="passwordError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Confirmar Contraseña:</strong>
                        <input type="password" id="confirm-password" name="confirm-password"
                            placeholder="Confirmar Contraseña" class="form-control">
                        <span id="confirmpasswordError" class="text-danger"></span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Rol:</strong>
                        <select id="roles" name="roles[]" class="form-control">
                            {{-- <option value="">Seleccione un rol</option> --}}
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <span id="rolesError" class="text-danger"></span>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="estado" id="estado" value="{{app\models\User::Activo}}">
                </div>
            </form>
            <div class="col-12">
                <button type="submit" onclick="usuario()" class="btn btn-primary">Crear</button>
                <a class="btn btn-primary" href="{{ route('users.index') }}">Volver</a>
            </div>
        </div>
    @endsection
</body>

</html>
