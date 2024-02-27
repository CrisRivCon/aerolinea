<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVueloRequest;
use App\Http\Requests\UpdateVueloRequest;
use App\Models\Aeropuerto;
use App\Models\Companya;
use App\Models\User;
use App\Models\Vuelo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

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
                        ->paginate(6);

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

        //$this->authorize('create', Vuelo::class);
        //Storage::makeDirectory('public/uploads');
        //$imagen->storeAs('uploads', $nombre, 'public');

        $validate = $request->validated();

        $imagen = $validate['imagen'];
        $nombre = now('UTC')->format('d-m-Y-H:i:s') . '.jpg';

        /* $manager = ImageManager::gd();
        $imagen = $manager->read($imagen);
        $imagen->scale(200);
        $ruta = Storage::path('public/uploads/'. $nombre);
        $imagen->toJpeg()->save($ruta); */
        $this->guardar_imagen($imagen, $nombre);

        $validate['imagen'] = $nombre;

        Vuelo::create($validate);
        return redirect()->route('vuelos.index')->with('success', 'Vuelo creado correctamente!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Vuelo $vuelo, Request $request)
    {
        if ($request->user()->cannot('view', $vuelo)){
            return redirect()->route('vuelos.index');
        }

        return view('vuelos.show', [
            'vuelo' => $vuelo,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vuelo $vuelo, Request $request)
    {
        if ($request->user()->cannot('view', $vuelo)){
            return view('vuelos.show', [
                'vuelo' => $vuelo,
            ]);
        }
        return view('vuelos.edit', [
            'vuelo' => $vuelo,
            'companyas' => Companya::all(),
            'aeropuertos' => Aeropuerto::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVueloRequest $request, Vuelo $vuelo)
    {
        if ($request->user()->cannot('update', $vuelo)){
            return view('vuelos.show', [
                'vuelo' => $vuelo,
            ]);
        }
        $validate = $request->validated();
        if(isset($validate['imagen'])) {
            $imagen = $validate['imagen'];
            $nombre = now('UTC')->format('d-m-Y-H:i:s') . '.jpg';

            $this->guardar_imagen($imagen, $nombre);
            $validate['imagen'] = $nombre;
        }

        $vuelo->update($validate);
        return redirect()->route('vuelos.show', [
            'vuelo' => $vuelo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vuelo $vuelo, Request $request)
    {
        if ($request->user()->cannot('delete', $vuelo)){
            return view('vuelos.show', [
                'vuelo' => $vuelo,
            ]);
        }

        $vuelo->delete();
        return redirect()->route('vuelos.index')->with('success', 'Se ha elimiando correctamente.');
    }

    public function guardar_imagen($imagen, $nombre)
    {
        $manager = ImageManager::gd();
        $imagen = $manager->read($imagen);
        $imagen->scale(200, 400);
        $ruta = Storage::path('public/uploads/'. $nombre);
        $imagen->toJpeg()->save($ruta);
    }
}
