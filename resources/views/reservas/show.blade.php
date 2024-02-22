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
                        Asiento
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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{route('vuelos.show', ['vuelo' => $reserva->vuelo])}}">
                                {{$reserva->vuelo->codigo}}
                            </a>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reserva->vuelo->companya->nombre}}
                        </th><th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reserva->vuelo->aeropuertoDestino->codigo}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reserva->vuelo->aeropuertoOrigen->codigo}}

                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reserva->asiento}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reserva->vuelo->precio}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reserva->vuelo->salida}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reserva->vuelo->llegada}}
                        </th>

                        {{-- <td class="px-6 py-4">
                            <a href="{{ route('reserva.edit', ['reserva' => $reserva]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>

                        <td class="px-6 py-4">
                            <form action="{{ route('reserva.destroy', ['reserva' => $reserva]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td> --}}
                    </tr>
            </tbody>
        </table>
        @can('create', App\Models\Vuelo::class)
        <form action="{{ route('vuelos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo vuelo</x-primary-button>
        </form>
        @endcan
    </div>
</x-app-layout>
