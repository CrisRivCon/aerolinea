<x-app-layout>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Código vuelo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Compañia
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Aeropuerto destino
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Aeropuerto origen
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plazas totales
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plazas disponibles
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Precio
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Hora salida
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Hora llegada
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
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
                            {{$vuelo->salida}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$vuelo->llegada}}
                        </th>

                        <td class="px-6 py-4">
                            <a href="{{ route('reseservas.create', ['vuelo' => $vuelo]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Reservar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('vuelos.edit', ['vuelo' => $vuelo]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
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
            <x-primary-button class="bg-green-500">Insertar un nuevo vuelo</x-primary-button>
        </form>
        @endcan
    </div>
</x-app-layout>
