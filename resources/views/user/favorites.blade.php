<x-main-layout>
    <x-user-layout>
        <h1 class="mb-5 text-2xl font-bold">Favorites</h1>
        <div
            class="grid max-w-sm grid-cols-1 gap-8 mx-auto mt-5 xl:gap-12 sm:grid-cols-2 md:grid-cols-3 sm:max-w-3xl lg:max-w-none">
            @forelse ($favorites as $favorite)
                <div class="w-full overflow-hidden rounded-lg shadow-lg">
                    <a href="/nurses/detail/{{ $favorite->nurse->id }}">
                        <img class="w-full h-80" src="/{{ $favorite->nurse->picture }}" alt="">
                        <div class="m-5">
                            <p class="font-bold">{{ $favorite->nurse->name }}</p>
                            <div class="mt-2">
                                <div class="flex justify-between">
                                    <p>{{ $favorite->nurse->gender->gender }}</p>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 mr-1 fill-yellow-400 stroke-transparent" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>
                                        <p>{{ number_format($favorite->nurse->rating, 1, '.', ',') }}/5.0</p>
                                    </div>
                                </div>
                                <p>{{ $favorite->nurse->age }} Tahun</p>
                                <p>{{ $favorite->nurse->cityName }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div>You dont have any favorite nurse</div>
            @endforelse

        </div>
        @if ($favorites->count())
            <div class="p-4 mt-5">
                {{ $favorites->links() }}
            </div>
        @endif
    </x-user-layout>
</x-main-layout>
