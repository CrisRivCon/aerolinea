<div>
    <section class="bg-white dark:bg-gray-900 p-5">
        <div class="p-8 px-4 mx-auto w-11/12  lg:py-16 lg:px-6 ">
            @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium"> {{session('success')}}</span>
              </div>
            @endif
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">VUELOS</h2>
                <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection
                    of open-source web components and elements built with the utility classes from Tailwind</p>
            </div>
            <div class="grid md:grid-cols-2 p-5 w-full">
                @foreach ($vuelos as $vuelo)
                <livewire:cardvuelo :$vuelo
                                    wire:key="card-{{ $vuelo->id }}"/>

                @endforeach
            </div>
        </div>
        {{$vuelos->links()}}
    </section>
</div>
