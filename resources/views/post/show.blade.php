<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-5xl mb-4">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    @if ($post->user->image)
                        <img src="{{ $post->user->imageUrl() }}" class="rounded-full w-20 h-20 object-cover"
                            alt="{{ $post->user->name }}">
                    @else
                        <img src="https://i.pravatar.cc/300" class="rounded-full w-20 h-20 object-cover"
                            alt="{{ $post->user->name }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
