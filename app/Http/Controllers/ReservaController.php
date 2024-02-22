<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Reserva;
use App\Models\Vuelo;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Reserva::class);
        return view('reservas.index', [
            'reservas' => Auth::user()->reservas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Vuelo $vuelo)
    {
        $this->authorize('create', Reserva::class);

        if ($vuelo->completo()) {
            return redirect()->route('/');
        }

        return view('reservas.create', [
            'vuelo' => $vuelo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservaRequest $request)
    {
        $this->authorize('create', Reserva::class);

        $validate = $request->validated();
        Reserva::create($validate);

        return redirect()->route('reservas');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
