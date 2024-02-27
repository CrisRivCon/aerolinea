<x-app-layout>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium"> {{session('success')}}</span>
              </div>
            @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'vuelos.codigo', 'order_dir' => order_dir($order == 'vuelos.codigo', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Código vuelo {{order_dir_arrow($order == 'vuelos.codigo', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'companyas.nombre', 'order_dir' => order_dir($order == 'companyas.nombre', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Compañia {{order_dir_arrow($order == 'companyas.nombre', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'aero_cod', 'order_dir' => order_dir($order == 'aero_cod', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Aeropuerto destino {{order_dir_arrow($order == 'aero_cod', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'origen_id', 'order_dir' => order_dir($order == 'origen_id', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Aeropuerto origen {{order_dir_arrow($order == 'origen_id', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'plazas', 'order_dir' => order_dir($order == 'plazas', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Plazas totales {{order_dir_arrow($order == 'plazas', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'disponibles', 'order_dir' => order_dir($order == 'disponibles', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Plazas disponibles {{order_dir_arrow($order == 'disponibles', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'precio', 'order_dir' => order_dir($order == 'precio', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Precio {{order_dir_arrow($order == 'precio', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'salida', 'order_dir' => order_dir($order == 'salida', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Hora salida {{order_dir_arrow($order == 'salida', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index', ['order' => 'llegada', 'order_dir' => order_dir($order == 'llegada', $order_dir)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Hora llegada {{order_dir_arrow($order == 'llegada', $order_dir)}}
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center" colspan="3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $vuelo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{route('vuelos.show', ['vuelo' => $vuelo])}}">
                                {{$vuelo->codigo}}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vuelo->companya->nombre}}
                        </th><th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vuelo->aeropuertoDestino->codigo}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vuelo->aeropuertoOrigen->codigo}}

                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vuelo->plazas}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vuelo->plazasDisponibles()}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vuelo->precio}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{fecha_hora($vuelo->salida)}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{fecha_hora($vuelo->llegada)}}
                        </th>
                        @if (!$vuelo->completo())

                        <td class="px-6 py-4">
                            <a href="{{ route('reservar', ['vuelo' => $vuelo]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Reservar
                                </x-primary-button>
                            </a>
                        </td>
                        @else
                        <td class="px-6 py-4">
                                <x-primary-button disabled>
                                    COMPLETO
                                </x-primary-button>
                        </td>
                        @endif
                        <td class="px-6 py-4">
                            <a href="{{ route('vuelos.edit', ['vuelo' => $vuelo]) }}">
                                <x-primary-button class="bg-emerald-500 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300">
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>

                        <td class="px-6 py-4">
                            <form action="{{ route('vuelos.destroy', ['vuelo' => $vuelo]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @can('create', App\Models\Vuelo::class)
        <form action="{{ route('vuelos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-cyan-500 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300">Insertar un nuevo vuelo</x-primary-button>
        </form>
        @endcan
        {{ $vuelos->links() }}
    </div>
</x-app-layout>
