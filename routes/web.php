<?php

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\VueloController;
use App\Models\Reserva;
use App\Models\Vuelo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('vuelos.index', [
        'vuelos' => Vuelo::with(['aeropuertoDestino', 'aeropuertoOrigen', 'companya'])
                            ->orderBy('codigo')
                            ->get(),
        'order' => 'vuelos.codigo',
        'order_dir' => 'asc',
    ]);
})
->name('/');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('vuelos', VueloController::class);

Route::get('/reservas/{vuelo}', [ReservaController::class, 'create'])
->name('reservar')
->middleware('auth');

Route::post('/reservas/{vuelo}', [ReservaController::class, 'store'])
->name('guardar_reserva')
->middleware('auth');

Route::get('/reservas', [ReservaController::class, 'index'])
->name('reservas')
->middleware('auth');

Route::get('/reserva/{reserva}', [ReservaController::class, 'show'])
->name('reserva')
->middleware('auth');

require __DIR__.'/auth.php';
