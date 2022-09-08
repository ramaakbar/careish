<div>
    <!-- Form add nurse modal -->
    <div wire:ignore.self id="add-nurse-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-2xl p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="add-nurse-modal" wire:click="clear">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 ">Add new nurse</h3>
                    <hr class="h-px mt-3 mb-5 bg-gray-200 border-0 ">
                    <form wire:submit.prevent="submit" class="space-y-6">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input wire:model="name" type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            @error('name')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex space-x-5">
                            <div class="w-full">
                                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 ">Age</label>
                                <input wire:model="age" type="number" name="age" id="age"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('age')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                            snapp!</span> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="gender"
                                    class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                                <select wire:model="gender_id" id="gender"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="" selected>Choose gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                @error('gender_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                            snapp!</span> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                            <textarea wire:model="address" id="address" name="address" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder=""></textarea>
                            @error('address')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload
                                file</label>
                            <input wire:model="photo"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 " id="file_input_help">
                                SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                            @error('photo')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                        snapp!</span> {{ $message }}</p>
                            @enderror

                            <div wire:loading wire:target="photo">Uploading...</div>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add
                            Nurse</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
