<div class="p-5">
    <div class="p-2 items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
            <img class="w-52 rounded-lg sm:rounded-none sm:rounded-l-lg"
                src="{{asset('storage/uploads/'.$vuelo->imagen)}}" alt="imagen del vuelo">
        <div class="p-5">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                <a href="#">{{ Str::upper($vuelo->codigo) }}</a>
            </h3>
            <span class="text-gray-500 dark:text-gray-400">
                {{ Str::upper($vuelo->aeropuertoOrigen->codigo) }} a {{ Str::upper($vuelo->aeropuertoDestino->codigo) }}
            </span>
            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                <strong class="font-semibold text-gray-900 dark:text-white">Salida:</strong> {{ fecha_hora($vuelo->salida) }}
            </p>
            <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                <strong class="font-semibold text-gray-900 dark:text-white"> Llegada: </strong>{{ fecha_hora($vuelo->llegada) }}
            </p>
            <ul class="flex space-x-4 sm:mt-0">
                <li>
                    <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">
                        Plazas disponibles: {{ $vuelo->plazasDisponibles() }}
                    </p>
                </li>
            </ul>
            @if (!$vuelo->completo())
                <a href="{{ route('reservar', ['vuelo' => $vuelo]) }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    <x-primary-button>
                        Reservar
                    </x-primary-button>
                </a>
            @else
                <x-secondary-button disabled>
                    COMPLETO
                </x-secondary-button>
            @endif
        </div>

    </div>
</div>
