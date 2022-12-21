<div>
    <x-modal.card title="Change Password" wire:model.defer="cardModal">
        <div class="p-5">
            <form x-data="{ show: false }" wire:submit.prevent="submit">
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                    <input :type="show ? 'text' : 'password'" wire:model="password" type="password" name="password"
                        id="password"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 ">Confirm
                        Password</label>
                    <input :type="show ? 'text' : 'password'" wire:model="password_confirmation" type="password"
                        name="password_confirmation" id="password_confirmation"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oh,
                                snapp!</span> {{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center mb-4">
                    <input x-model="show" id="show-password" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    <label for="show-password" class="ml-2 text-sm font-medium text-gray-900">Show
                        Password</label>
                </div>

                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Change
                    Password</button>
            </form>

        </div>
    </x-modal.card>
</div>
