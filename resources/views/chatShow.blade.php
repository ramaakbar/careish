<x-layout>
    <x-dash-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            {{-- <h1 class="mb-5 text-3xl font-bold">Chat</h1> --}}
            <livewire:chat-show :users="$users" :chats="$chats ?? null" :sender="$sender" />
        </main>
    </x-dash-layout>
</x-layout>
