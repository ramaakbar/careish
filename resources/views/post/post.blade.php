<x-main-layout>
    <main class="px-4 pt-6 mx-auto">
        <x-alert />
        <article class="mx-auto prose lg:prose-xl">
            <h2 class="text-center !mb-4">{{ $post->title }}</h2>
            <p class="text-center !mb-0">{{ date_format($post->created_at, 'F d, Y') }}</p>
            <img class="!mt-6" src="{{ asset('/storage/' . $post->thumbnail) }}" alt="">
            {!! $post->body !!}
        </article>
    </main>
</x-main-layout>
