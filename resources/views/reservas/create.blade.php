<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('reservas.store') }}">
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
