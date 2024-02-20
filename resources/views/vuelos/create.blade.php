<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('vuelos.store') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="codigo" :value="'Código del vuelo'" />
                <x-text-input id="codigo" class="block mt-1 w-full"
                    type="text" name="codigo" :value="old('codigo')" required
                    autofocus autocomplete="codigo" />
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>

            <!-- Precio -->
            <div class="mt-4">
                <x-input-label for="precio" :value="'Precio del vuelo'" />
                <x-text-input id="precio" class="block mt-1 w-full"
                    type="text" name="precio" :value="old('precio')" required
                    autofocus autocomplete="precio" />
                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
            </div>
            <!-- Compañia -->
            <div class="mt-4">
                <x-input-label for="companya" :value="'Comañia Aérea'" />
                <select id="companya"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="companya" required>
                    @foreach ($companyas as $companya)
                        <option value="{{ $companya->id }}"
                            {{ old('companya_id') == $companya->id ? 'selected' : '' }}
                            >
                            {{ $companya->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('aeropuerto_id')" class="mt-2" />
            </div>
            <!-- Aeropuerto origen -->
            <div class="mt-4">
                <x-input-label for="aeropuerto_origen" :value="'Aeropuerto origen'" />
                <select id="aeropuerto_origen"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="aeropuerto_origen" required>
                    @foreach ($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}"
                            {{ old('aeropuerto_id') == $aeropuerto->id ? 'selected' : '' }}
                            >
                            {{ $aeropuerto->codigo }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('aeropuerto_id')" class="mt-2" />
            </div>
            <!-- Aeropuerto destino -->
            <div class="mt-4">
                <x-input-label for="aeropuerto_origen" :value="'Aeropuerto origen'" />
                <select id="aeropuerto_origen"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="aeropuerto_origen" required>
                    @foreach ($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}"
                            {{ old('aeropuerto_id') == $aeropuerto->id ? 'selected' : '' }}
                            >
                            {{ $aeropuerto->codigo }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('aeropuerto_id')" class="mt-2" />
            </div>

            <!-- Fecha salida -->
            <div class="mt-4">
                <x-input-label for="fecha_salida" :value="'Fecha salida'" />
                <input type="date" name="fecha_salida" id="fecha_salida">
                <x-input-error :messages="$errors->get('fecha_salida')" class="mt-2" />
            </div>
            <!-- Fecha llegada -->
            <div class="mt-4">
                <x-input-label for="fecha_llegada" :value="'Fecha llegada'" />
                <input type="date" name="fecha_llegada" id="fecha_llegada">

                <x-input-error :messages="$errors->get('fecha_llegada')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('vuelos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
