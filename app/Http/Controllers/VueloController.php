<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVueloRequest;
use App\Http\Requests\UpdateVueloRequest;
use App\Models\Aeropuerto;
use App\Models\Companya;
use App\Models\Vuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $order = $request->query('order', 'vuelos.codigo');

        $order_dir = $request->query('order_dir', 'asc');
        $vuelos = Vuelo::with(['aeropuertoOrigen', 'aeropuertoDestino', 'companya'])
                        ->selectRaw('vuelos.*, companyas.nombre, aeropuertos.codigo as aero_cod,
                                     (vuelos.plazas - (SELECT COUNT(reservas.id)
                                                        FROM reservas
                                                        WHERE reservas.vuelo_id = vuelos.id)) as disponibles')
                        ->leftJoin('aeropuertos', 'vuelos.origen_id', '=', 'aeropuertos.id')
                        ->leftJoin('companyas', 'vuelos.companya_id', '=', 'companyas.id')
                        ->orderBy($order, $order_dir)
                        ->orderBy('vuelos.codigo')
                        ->paginate(5);

        return view('vuelos.index', [
            'vuelos' => $vuelos,
            'order' => $order,
            'order_dir' => $order_dir,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()){
            return redirect()->route('login');
        };

        $this->authorize('create', Vuelo::class);

        return view('vuelos.create', [
            'companyas' => Companya::all(),
            'aeropuertos' => Aeropuerto::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVueloRequest $request)
    {
        if ($request->user()->cannot('create', Vuelo::class)){
            return redirect('login');
        };

        $this->authorize('create', Vuelo::class);

        $validate = $request->validated();
        Vuelo::create($validate);
        return redirect()->route('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vuelo $vuelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vuelo $vuelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVueloRequest $request, Vuelo $vuelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vuelo $vuelo)
    {
        //
    }
}
