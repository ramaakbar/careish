<div class="w-full max-w-3xl p-5 mb-8 bg-white border rounded">
    <div class="mb-4">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
        <input wire:model="title" type="text" name="title" id="title"
            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        @error('title')
            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                    snapp!</span> {{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
        <select wire:model="category"
            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5"
            id="category" name="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                    snapp!</span> {{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Body</label>
        <livewire:component.trix :value="$body">
            @error('body')
                <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                        snapp!</span> {{ $message }}</p>
            @enderror
    </div>
    <button wire:click="save"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Create post
    </button>
</div>
