<x-layout>
    <x-dashboard-layout>
        <main class="min-h-[70vh] px-4 pt-6 max-w-[90rem] mx-auto">
            <a href="/dashboard/posts"
                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Back
            </a>
            <h1 class="my-5 text-3xl font-bold">Update Post</h1>
            <livewire:dashboard.update-post-form :post="$post">
        </main>
    </x-dashboard-layout>
</x-layout>
