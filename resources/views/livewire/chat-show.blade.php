<div>
    <div class="grid grid-cols-12 gap-5">
        @if (auth()->user()->role_id == 2)
            <div class="col-span-12 lg:col-span-4">
                <div class="w-full bg-white border rounded">
                    <div class="overflow-x-auto rounded min-h-[30vh] max-h-[30vh] lg:min-h-[80vh] lg:max-h-[80vh]">
                        <div class="text-gray-500 w-full h-full">
                            <div class="text-gray-700 bg-gray-100 sticky top-0 px-4 py-3 border-b">
                                <h3 class="font-bold text-lg">Users</h3>
                            </div>
                            @forelse ($users as $user)
                                @php
                                    $not_seen =
                                        \App\Models\Chat::where('user_id', $user->id)
                                            ->where('receiver', auth()->id())
                                            ->where('is_seen', false)
                                            ->get() ?? null;
                                @endphp
                                @if (\App\Models\Chat::where('user_id', $user->id)->exists())
                                    <a href="/chats/{{ $user->id }}" wire:click="getUser({{ $user->id }})"
                                        class="flex items-center space-x-4 px-4 py-2 hover:bg-gray-50 border-b">
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ asset('/storage/' . $user->picture) }}" alt="dasdas"
                                            alt="">

                                        <div class="font-medium">{{ $user->name }}</div>
                                        <span
                                            class="inline-flex justify-center items-center ml-2 w-4 h-4 text-xs font-semibold text-green-800 bg-green-200 rounded-full">

                                        </span>
                                    </a>
                                @endif
                            @empty
                                <p>No User chat found</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-span-12 lg:col-span-8">
            <div class="w-full bg-white border rounded">
                <div class=" rounded min-h-[80vh] max-h-[80vh] relative flex flex-col text-gray-500">
                    <div class="text-gray-700 bg-gray-100 sticky top-0 px-4 py-3 border-b flex items-center space-x-4">
                        <img class="w-10 h-10 rounded-full"
                            src="{{ asset('/storage/' . 'nurse-images/placeholder_man.jpeg') }}" alt="dasdas"
                            alt="">
                        <h3 class="font-medium text-lg">{{ $sender->name }}</h3>
                    </div>
                    <div class="flex-1 flex px-4 py-2 flex-col space-y-3 overflow-x-auto" wire:poll="mountComponent()">
                        @forelse ($chats as $chat)
                            <div
                                class="h-full w-fit p-2 rounded-md max-w-[90%] @if ($chat->user_id !== auth()->id()) bg-gray-200 @else bg-blue-500 text-white ml-auto @endif">
                                <p class="font-bold">{{ $chat->user->name }}</p>
                                <p class="">{{ $chat->message }}</p>
                                {{-- @if (isPhoto($message->file))``
                                    <div class="w-100 my-2">
                                        <img class="img-fluid rounded" loading="lazy" style="height: 250px"
                                            src="{{ $message->file }}">
                                    </div>
                                @elseif (isVideo($message->file))
                                    <div class="w-100 my-2">
                                        <video style="height: 250px" class="img-fluid rounded" controls>
                                            <source src="{{ $message->file }}">
                                        </video>
                                    </div>
                                @elseif ($message->file)
                                    <div class="w-100 my-2">
                                        <a href="{{ $message->file }}" class="bg-light p-2 rounded-pill"
                                            target="_blank" download><i class="fa fa-download"></i>
                                            {{ $message->file_name }}
                                        </a>
                                    </div>
                                @endif --}}
                                <p class="text-sm">{{ $chat->created_at }}</p>
                            </div>
                        @empty
                            No Messages
                        @endforelse
                    </div>
                    <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                        <label for="chat" class="sr-only">Your message</label>
                        <div class="flex items-center px-3 py-2 bg-gray-50">
                            <button type="button"
                                class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 "
                                id="file">
                                <label for="image">
                                    <input type="file" class="hidden" name="" id="image"
                                        wire:model="file">
                                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </label>
                                <span class="sr-only">Upload image</span>
                            </button>
                            <textarea wire:model="message" id="chat" rows="1"
                                class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Your message..." required></textarea>
                            <button
                                class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100">
                                <svg aria-hidden="true" class="w-6 h-6 rotate-90" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                                    </path>
                                </svg>
                                <span class="sr-only">Send message</span>
                            </button>
                        </div>
                        <div wire:loading wire:target='SendMessage'>
                            Sending message . . .
                        </div>
                        <div wire:loading wire:target="file">
                            Uploading file . . .
                        </div>
                        @if ($file)
                            <div class="mb-2">
                                You have an uploaded file <button type="button" wire:click="resetFile"
                                    class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove
                                    {{ $file->getClientOriginalName() }}</button>
                            </div>
                        @else
                            No file is uploaded.
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
