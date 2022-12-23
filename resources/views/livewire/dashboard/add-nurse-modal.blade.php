<div>
    <x-modal.card title="Add new Nurse" wire:model.defer="cardModal" x-on:close="reset">
        <div class="px-3">
            <form wire:submit.prevent="submit" class="space-y-5" id="myForm">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                    <input wire:model="name" type="text" name="name" id="name"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @error('name')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </div>
                <div class="flex space-x-5">
                    <div class="w-full">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900 ">Age</label>
                        <input wire:model="age" type="number" name="age" id="age"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('age')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                        <select wire:model="gender_id" id="gender"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected>Choose gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        @error('gender_id')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex space-x-5">
                    <div class="w-full">
                        <label for="province_id" class="block mb-2 text-sm font-medium text-gray-900 ">Province</label>
                        <x-select wire:model="province_id" placeholder="Select province" :async-data="route('provinces')"
                            option-label="name" option-value="id" value="{{ $province_id }}" />
                        @error('province_id')
                            <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 ">City</label>
                        <x-select wire:model="city_id" placeholder="Select city" :async-data="route('cities', ['provinces_id' => $province_id])" option-label="name"
                            option-value="id" value="{{ $city_id }}" />
                    </div>
                </div>

                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                    <input wire:model="price" type="number" name="price" id="price"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('price')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                    <x-textarea wire:model="description" placeholder="Nurse's Description"
                        class="focus:!ring-blue-500 focus:!border-blue-500" />
                </div>

                <div class="w-full">
                    <label for="skills" class="block mb-2 text-sm font-medium text-gray-900">Skills</label>
                    <select multiple wire:model="skills" id="skills"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @foreach ($skillsList as $skillList)
                            <option value="{{ $skillList->skill }}">{{ $skillList->skill }}</option>
                        @endforeach
                    </select>
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500">Use shift to select multiple
                        skills</p>
                    @error('skills')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Experiences</label>
                    <div class="grid grid-cols-7 gap-3">
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-900 ">Title</label>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-900 ">Description</label>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-900 ">Date</label>
                        </div>
                        @foreach ($experiences as $index => $experience)
                            <div class="col-span-2">
                                <input wire:model="experiences.{{ $index }}.title" type="text"
                                    name="experiences[{{ $index }}][title]"
                                    class="bg-white border border-gray-300 @error('experiences.title') !border-red-500 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div class="col-span-2">
                                <input wire:model="experiences.{{ $index }}.description" type="text"
                                    name="experiences[{{ $index }}][description]"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div class="col-span-2">
                                <input wire:model="experiences.{{ $index }}.date" type="date"
                                    name="experiences[{{ $index }}][date]"
                                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <button wire:click.prevent="removeExperience({{ $index }})"
                                class="flex items-center text-red-600 hover:underline">delete
                            </button>
                        @endforeach
                    </div>
                    <button wire:click.prevent="addMoreExperience"
                        class="mt-2 hover:text-blue-500 hover:underline">Add more
                        experience</button>
                </div>


                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload
                        file</label>
                    <input wire:model="photo"
                        class="block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 " id="file_input_help">
                        SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    @error('photo')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                    <div wire:loading wire:target="photo">Uploading...</div>
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Add
                    Nurse</button>
            </form>

        </div>
    </x-modal.card>
</div>
