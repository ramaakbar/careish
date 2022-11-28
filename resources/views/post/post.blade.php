<x-main-layout>
    <main class="px-4 pt-6 mx-auto">
        <x-alert />
        <article class="mx-auto prose lg:prose-xl">
            <h2 class="text-center !mb-4">{{ $post->title }}</h2>
            <p class="text-center !my-0">{{ date_format($post->created_at, 'F d, Y') }} - {{ $post->view }} views</p>
            <img class="!mt-6" src="{{ asset('/storage/' . $post->thumbnail) }}" alt="">

            {!! $post->body !!}
            <div class="not-prose">
                <hr class="mt-4">
                <h2 class="mt-4 mb-6 text-xl font-bold xs:text-2xl sm:text-3xl">Comments</h2>
                @foreach ($post->comment as $comment)
                    <div class="grid w-full grid-flow-row grid-cols-7 mb-4 sm:grid-cols-9">
                        <div class="">
                            <img class="w-8 h-8 rounded-full xs:w-11 xs:h-11 sm:w-14 sm:h-14"
                                src="{{ asset('/storage/' . $comment->user->picture) }}" alt="">
                        </div>
                        <div class="col-span-6 sm:col-span-8">
                            <div class="grid items-center grid-flow-row grid-cols-3">
                                <div class="col-span-3 text-sm font-bold sm:col-span-2 xs:text-base">
                                    {{ $comment->user->name }}<span
                                        class="ml-2 text-xs font-normal text-gray-400 xs:text-sm">
                                        {{ $comment->created_at->diffForHumans() }}</span></div>

                                <p class="col-span-3 text-xs prose xs:text-base">{{ $comment->comment }} </p>
                            </div>

                        </div>
                    </div>
                @endforeach
                <form action="/articles/{{ $post->id }}/comment" method="POST">
                    @csrf
                    <div
                        class="w-full mt-6 mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="4" name="comment"
                                class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Write a comment..." required></textarea>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                            <button type="submit"
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-[#504BE5] rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                Post comment
                            </button>
                        </div>
                    </div>
                    @error('comment')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </form>
            </div>
        </article>

    </main>
</x-main-layout>
