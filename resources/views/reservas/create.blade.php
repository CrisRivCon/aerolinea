<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('guardar_reserva', ['vuelo' => $vuelo]) }}">
            @csrf

            <!-- Codigo vuelo -->
            <div>
                <x-input-label for="codigo" :value="'Código del vuelo'" />

                <input id="vuelo_id" class="block mt-1 w-full"
                    type="hidden" name="vuelo_id" value="{{$vuelo->id}}" required
                    autofocus autocomplete="vuelo_id"/>

                    <input id="user_id" class="block mt-1 w-full"
                    type="hidden" name="user_id" value="{{Auth::user()->id}}" required
                    autofocus autocomplete="user_id"/>

                <input id="codigo" class="block mt-1 w-full"
                    type="text" name="codigo" value="{{$vuelo->codigo}}"
                    autocomplete="codigo" disabled/>
            </div>
            <!-- Plazas Disponibles -->
            <div class="mt-4">
                <x-input-label for="asiento" :value="'Plazas disponibles'" />
                <select id="asiento"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="asiento" required>
                    @foreach ($vuelo->asientos() as $asiento)
                        <option value="{{ $asiento }}"
                            {{ old('asiento') == $asiento ? 'selected' : '' }}
                            {{ $vuelo->esta_reservado($asiento) ? 'disabled' : '' }}
                            >
                            {{ $asiento }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('asiento')" class="mt-2" />
            </div>

            <!-- Precio -->
            <div class="mt-4">
                <x-input-label for="precio" :value="'Precio del vuelo'" />
                <input id="precio" class="block mt-1 w-full"
                    type="text" name="precio" value="{{$vuelo->precio}}" required
                    autofocus autocomplete="precio" disabled/>
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
