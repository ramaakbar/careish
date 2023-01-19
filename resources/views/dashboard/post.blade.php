<x-layout>
    <x-dash-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <article class="mx-auto prose lg:prose-xl">
                <h2 class="">{{ $post->title }}</h2>
                <img src="{{ asset('/storage/' . $post->thumbnail) }}" alt="">
                {!! $post->body !!}
            </article>
        </main>
    </x-dash-layout>
</x-layout>
