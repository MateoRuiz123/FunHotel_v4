<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\VentaControlador;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PagoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to the
| "api" middleware group. Start building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/clientes', ClienteController::class);
    Route::apiResource('/servicios', ServicioController::class);
    Route::apiResource('/catalogos', CatalogoController::class);
    Route::apiResource('/ventas', VentaControlador::class);
    Route::apiResource('/categorias', CategoriaController::class);
    Route::apiResource('/habitaciones', HabitacionController::class);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/reservas', ReservaController::class);
    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/groups', GroupController::class);
    Route::apiResource('/checkins', CheckinController::class);
    Route::apiResource('/checkouts', CheckoutController::class);
    Route::apiResource('/pagos', PagoController::class);

    Route::get('/ventas-obtener-informacion-reserva/{id}', [VentaControlador::class, 'obtenerInformacionReserva']);
    Route::get('/venta-create', [VentaControlador::class, 'create'])->name('ventas.create');
    Route::get('/venta-update/{venta}', [VentaControlador::class, 'edit'])->name('ventas.edit');

    // Ruta para añadir usuarios a un grupo
    Route::post('/groups/{group}/add-user', [GroupController::class, 'addUser'])->name('groups.addUser');
    // Ruta para eliminar usuarios de un grupo
    Route::delete('/groups/{group}/users/{user}', [GroupController::class, 'removeUser'])->name('groups.users.remove');

    Route::get('users/assign-roles', [UserController::class, 'show'])->name('users.assign-roles');
    Route::post('users/save-roles', [UserController::class, 'saveRoles'])->name('users.save-roles');

    Route::post('/groups/{group}/assign-roles', [GroupController::class, 'assignRoles'])->name('groups.assignRoles');
    Route::post('/groups/{group}/users/{user}/assign-role', [GroupController::class, 'assignUserRole'])->name('groups.assignUserRole');
    Route::post('/groups/{group}/assign-group-role', [GroupController::class, 'assignGroupRole'])->name('groups.assignGroupRole');
    Route::post('/groups/{group}/revoke-group-role', [GroupController::class, 'revokeGroupRole'])->name('groups.revokeGroupRole');
});


use App\Http\Controllers\API\AuthController;

Route::post('/login', [AuthController::class, 'login']);
