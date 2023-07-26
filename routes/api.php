<?php

use App\Http\Controllers\api\userApiController;
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

Route::prefix('api')->group(function () {
    Route::get('/users', [userApiController::class, 'index']);
});

