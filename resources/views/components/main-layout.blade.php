<x-layout>
    <div class="flex flex-col w-full min-h-screen">
        <x-navbar />
        <main class="flex-1 w-full">
            {{ $slot }}
        </main>
        <x-footer />
        <x-chat-button-floating />
    </div>
</x-layout>
