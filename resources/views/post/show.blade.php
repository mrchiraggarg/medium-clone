<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8 text-white">
                <h1 class="text-5xl mb-4">{{ $post->title }}</h1>
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" size="w-12 h-12" />
                    <div>
                        <div class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}"
                                class="hover:underline">{{ $post->user->name }}</a>
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

                <x-clap-button />

                <div class="mt-8">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full">
                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>

                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-2xl text-black">
                        {{ $post->category->name }}
                    </span>
                </div>

                <x-clap-button />
            </div>
        </div>
    </div>
</x-app-layout>
