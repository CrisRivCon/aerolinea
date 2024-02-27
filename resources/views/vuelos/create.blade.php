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
            <!-- Plazas totales -->
            <div class="mt-4">
                <x-input-label for="plazas" :value="'Plazas disponibles'" />
                <x-text-input id="plazas" class="block mt-1 w-full"
                    type="text" name="plazas" :value="old('plazas')" required
                    autofocus autocomplete="plazas" />
                <x-input-error :messages="$errors->get('plazas')" class="mt-2" />
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
                <x-input-label for="companya_id" :value="'Comañia Aérea'" />
                <select id="companya_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="companya_id" required>
                    @foreach ($companyas as $companya)
                        <option value="{{ $companya->id }}"
                            {{ old('companya_id') == $companya->id ? 'selected' : '' }}
                            >
                            {{ $companya->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('companya_id')" class="mt-2" />
            </div>
            <!-- Aeropuerto origen -->
            <div class="mt-4">
                <x-input-label for="origen_id" :value="'Aeropuerto origen_id'" />
                <select id="origen_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="origen_id" required>
                    @foreach ($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}"
                            {{ old('origen_id') == $aeropuerto->id ? 'selected' : '' }}
                            >
                            {{ $aeropuerto->codigo }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('origen_id')" class="mt-2" />
            </div>
            <!-- Aeropuerto destino -->
            <div class="mt-4">
                <x-input-label for="destino_id" :value="'Aeropuerto destino_id'" />
                <select id="destino_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="destino_id" required>
                    @foreach ($aeropuertos as $aeropuerto)
                        <option value="{{ $aeropuerto->id }}"
                            {{ old('destino_id') == $aeropuerto->id ? 'selected' : '' }}
                            >
                            {{ $aeropuerto->codigo }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('destino_id')" class="mt-2" />
            </div>

            <!-- Fecha salida -->
            <div class="mt-4">
                <x-input-label for="salida" :value="'Fecha salida'" />
                <input type="datetime-local" name="salida" id="salida" value="old('salida')">
                <x-input-error :messages="$errors->get('salida')"  class="mt-2" />
            </div>
            <!-- Fecha llegada -->
            <div class="mt-4">
                <x-input-label for="llegada" :value="'Fecha llegada'" />
                <input type="datetime-local" name="llegada" id="llegada" value="old('llegada')">

                <x-input-error :messages="$errors->get('llegada')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('/') }}">
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
