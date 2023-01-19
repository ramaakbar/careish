<x-layout>
    @if (auth()->user()->role_id == 2)
        <x-dash-layout>
            <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
                {{-- <h1 class="mb-5 text-3xl font-bold">Chat</h1> --}}
                <livewire:chat :users="$users" :chats="$chats ?? null" />
            </main>
        </x-dash-layout>
    @else
        <x-main-layout>
            <main class="min-h-[70vh] px-4 pt-6 max-w-4xl mx-auto">
                {{-- <h1 class="mb-5 text-3xl font-bold">Chat</h1> --}}
                <livewire:chat :users="$users" :chats="$chats ?? null" />
            </main>
        </x-main-layout>
    @endif

</x-layout>
