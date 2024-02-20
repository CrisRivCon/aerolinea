<x-app-layout>
    <div class="p-2 grid grid-cols-2 gap-1 justify-center justify-items-center">
        <div
            class="p-6 max-w-xs min-w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $articulo->denominacion }}
                </h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $articulo->denominacion }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Precio: {{ dinero($articulo->precio_ii) }}
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                {{ $articulo->categoria->nombre }}
            </p>
        </div>
        <div
            class="p-6 max-w-xs min-w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            @if ($articulo->existeImagen())
                                <img src="{{ asset($articulo->imagen_url) }}" />
                            @endif
        </div>
    </div>

</x-app-layout>
