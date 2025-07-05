<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8 text-white">
                <h1 class="text-5xl mb-4">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    @if ($post->user->image)
                        <img src="{{ $post->user->imageUrl() }}" class="rounded-full w-12 h-12 object-cover"
                            alt="{{ $post->user->name }}">
                    @else
                        <img src="https://i.pravatar.cc/300" class="rounded-full w-12 h-12 object-cover"
                            alt="{{ $post->user->name }}">
                    @endif
                    <div>
                        <div class="flex gap-2">
                            <h3>{{ $post->user->name }}</h3>
                            &middot;
                            <a href="#" class="text-emerald-600">Follow</a>
                        </div>
                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-4 border-t border-b">
                    <button class="flex gap-2 text-gray-500 hover:text-gray-900">
                        30.4K Claps
                    </button>
                </div>

                <div class="mt-8">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full">
                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
