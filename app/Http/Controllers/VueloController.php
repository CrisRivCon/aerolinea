<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVueloRequest;
use App\Http\Requests\UpdateVueloRequest;
use App\Models\Aeropuerto;
use App\Models\Companya;
use App\Models\Vuelo;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vuelos = Vuelo::all();
        return view('vuelos.index', [
            'vuelos' => $vuelos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $this->authorize('create', Vuelo::class);
        $vuelo = new Vuelo();
        $vuelo->create($request);
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
