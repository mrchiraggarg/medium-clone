<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1">
                        <h1 class="text-5xl text-white">{{ $user->name }}</h1>
                        <div class="mt-8">
                            @forelse ($posts as $post)
                                <x-post-item :post="$post"></x-post-item>
                            @empty
                                <div class="text-center text-gray-500 dark:text-gray-400 py-16">
                                    <p>No posts available.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="w-[320px] border-l px-8">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3 class="text-white">{{ $user->name }}</h3>
                        <p class="text-gray-500">26K Followers</p>
                        <p class="text-white">{{ $user->bio }}</p>
                        <div>
                            <button class="bg-emerald-600 rounded-full px-2 py-2 text-white mt-4">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
