<x-layout>
    <x-dash-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <a href="/dashboard/nurses"
                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Back
            </a>
            <h1 class="my-4 mb-5 text-3xl font-bold">Nurse {{ $nurse->name }}</h1>
            <div>
                <img src="{{ asset('/storage/' . $nurse->picture) }}" alt="{{ $nurse->name . ' picture' }}" class="w-48">
            </div>
            <div class="flex justify-between mb-5">
                <div class="flex space-x-4">
                    <div>
                        <p class="text-gray-700">Created at</p>
                        <p>{{ Carbon\Carbon::parse($nurse->created_at)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700">Updated at</p>
                        <p>{{ Carbon\Carbon::parse($nurse->updated_at)->format('d M Y') }}</p>
                    </div>
                </div>
                <livewire:component.delete-dashboard-detail :nurse="$nurse" />
            </div>
            <div class="w-full p-5 mb-8 bg-white border rounded">
                <livewire:dashboard.nurse-detail-update :nurse="$nurse" :availabilities="$availabilities" />
            </div>

            <h2 class="mb-3 text-xl font-bold">Transactions</h2>
            <livewire:dashboard.nurse-transaction-dashboard-table :nurse="$nurse" />

        </main>
    </x-dash-layout>
</x-layout>
