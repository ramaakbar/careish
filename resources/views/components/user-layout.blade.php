<div class="flex flex-col items-center px-5 mx-auto space-y-5 lg:items-start lg:flex-row max-w-7xl lg:space-y-0">
    <aside class="flex flex-col w-full lg:mr-5 lg:w-1/4">
        <div class="flex flex-row items-center mb-8">
            <img class="mr-3 rounded-full w-14 h-14"src="{{ asset('/storage/' . Auth::user()->picture) }}"
                alt="user photo">
            <h3 class="text-base font-medium">{{ Auth::user()->name }}</h3>
        </div>
        <nav class="flex flex-col space-y-2">
            @foreach ($sidebar as $name => $test)
                <a href={{ $test[0] }}
                    class="flex items-center px-2 py-2 text-gray-600 rounded hover:bg-gray-100 {{ request()->is($test[2]) ? 'bg-gray-100' : '' }}">{{ svg($test[1], 'w-6 h-6') }}
                    <span class="ml-3">{{ $name }}</span></a>
            @endforeach

        </nav>
    </aside>
    <section class=" w-full lg:w-3/4">
        {{ $slot }}

    </section>
</div>
