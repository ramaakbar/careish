<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <x-alert />
            <h1 class="mb-5 text-3xl font-bold">{{ $post->title }}</h1>
            <article class="prose lg:prose-xl">
                {!! $post->body !!}
            </article>
        </main>
    </x-dashboard-layout>
</x-layout>
