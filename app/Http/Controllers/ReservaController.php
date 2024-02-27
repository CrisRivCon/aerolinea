<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Mail\VueloReservado;
use App\Models\Reserva;
use App\Models\Vuelo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Reserva::class);

        $reservas = Reserva::where('user_id', '=', Auth::user()->id)
                            ->paginate(5);

        return view('reservas.index', [
            'reservas' => $reservas,
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

        $vuelo = Vuelo::find($request->vuelo_id);

        if($vuelo->completo()) {
            return redirect()->route('/');
        }

        $validate = $request->validated();
        $reserva = Reserva::create($validate);

        $this->crear_pdf($reserva);


        Mail::to($request->user())->send(new VueloReservado($reserva));

        return redirect()->route('reservas')->with('success', 'Reserva creada correctamente!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', [
            'reserva' => $reserva,
        ]);
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

    public function crear_pdf($reserva)
    {
        Storage::makeDirectory('public/pdf');
        $pdf = Pdf::loadView('pdf.reserva', ['reserva' => $reserva]);
        $nombre = $reserva->id.'.pdf';
        $ruta = Storage::path('public/pdf/'. $nombre);
        $pdf->save($ruta);
    }
}
