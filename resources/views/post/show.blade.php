<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-5xl mb-4">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    <img src="{{ Storage::url($post->user->image) }}" class="rounded-full w-20 h-20 object-cover" alt="{{ $post->user->name }}">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
