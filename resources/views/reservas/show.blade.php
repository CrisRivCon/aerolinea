<x-app-layout>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg flex flex-col items-center p-10">
        <h3 class="text-lg font-semibold text-gray-900 p-10">
            Reserva {{$reserva->id}}
        </h3>
        <table class="w-1/3 text-sm text-left rtl:text-right text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 rounded">
                <tr class="border-b-2">
                    <th scope="row" class="px-6 py-3 border-r-2">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                        Código vuelo
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right rounded-r-md">
                        <a href="{{route('vuelos.show', ['vuelo' => $reserva->vuelo])}}">
                            {{$reserva->vuelo->codigo}}
                        </a>
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th scope="row" class="px-6 py-3 border-r-2 w-1/2">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                            Compañia
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right ">
                        {{$reserva->vuelo->companya->nombre}}
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th scope="row" class="px-6 py-3 border-r-2">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                            Aeropuerto destino
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right ">
                        {{$reserva->vuelo->aeropuertoDestino->codigo}}
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th scope="row" class="px-6 py-3 border-r-2">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                            Aeropuerto origen
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right ">
                        {{$reserva->vuelo->aeropuertoOrigen->codigo}}
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th scope="row" class="px-6 py-3 border-r-2">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                        Asiento
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right ">
                        {{$reserva->asiento}}
                    </td>
                </tr>
                <tr class="border-b-2">
                    <th scope="row" class="px-6 py-3 border-r-2">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                            Precio
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right ">
                        {{$reserva->vuelo->precio}}
                    </td>
                </tr>
                <tr class="border-b-2">

                    <th scope="row" class="px-6 py-3 border-r-2">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                            Hora salida
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right ">
                        {{$reserva->vuelo->salida}}
                    </td>
                </tr>
                <tr class="border-b-2">

                    <th scope="row" class="px-6 py-3 border-r-2 rounded-bl-md">
                        <a href="{{ route('vuelos.index') }}" class="font-medium text-gray-400 uppercase hover:underline">
                            Hora llegada
                        </a>
                    </th>
                    <td class="px-6 py-4 font-medium text-white bg-white border-b dark:bg-gray-800 dark:border-gray-700 whitespace-nowrap text-right rounded-b-md">
                        {{$reserva->vuelo->llegada}}
                    </td>
                </tr>
                  {{--   <th scope="col" class="px-6 py-3 border-r-2" colspan="2">
                        Acción
                    </th> --}}
                        {{-- <td class="px-6 py-4">
                            <a href="{{ route('reserva.edit', ['reserva' => $reserva]) }}" class="font-medium text-gray-400 uppercase hover:underline">
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
                        </td>
                    </tr>--}}
        </table>
    {{--     @can('create', App\Models\Vuelo::class)
        <form action="{{ route('vuelos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-cyan-500 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300">Insertar un nuevo vuelo</x-primary-button>
        </form>
        @endcan --}}
    </div>
</x-app-layout>
