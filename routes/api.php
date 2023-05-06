<?php

use App\Http\Controllers\CuponesController;
use App\Http\Controllers\SanctumAuthController;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("registro",[SanctumAuthController::class, "registro"]);
Route::post("login",[SanctumAuthController::class,"login"]);

//Funciones que se ejecutarán cuando el usuario este logeado
Route::middleware('auth:sanctum')->group(function(){
    Route::get("obtenerCupon",[CuponesController::class,"ObtenerCupon"]);
    Route::put("canjearCupon",[CuponesController::class,"CanjearCupon"]);
});
