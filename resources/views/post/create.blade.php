<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <x-category-tabs>
                        No Category Available
                    </x-category-tabs>
                </div>
            </div>
            <div class="mt-8 text-gray-900 dark:text-gray-100">
                @forelse ($posts as $post)
                    <x-post-item :post="$post"></x-post-item>
                @empty
                    <div class="text-center text-gray-500 dark:text-gray-400 py-16">
                        <p>No posts available.</p>
                    </div>
                @endforelse

                <!-- Pagination -->
                @if ($posts->hasPages())
                    <div class="mt-4">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
