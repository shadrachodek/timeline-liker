<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-r-2 border-gray-200">
                    <livewire:profile-photo-uploader />
                </div>
                <div class="flex-grow p-6 bg-white border-b border-gray-200">
                    <div class="border-b pb-6">
                        <livewire:post-form />
                    </div>
                    <livewire:posts />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
