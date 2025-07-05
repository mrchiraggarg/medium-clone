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
                    <div x-data="{
                        following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                        follow() {
                            this.following = !this.following
                            axios.post('/follow/{{ $user->username }}')
                                .then(res => {
                                    console.log(res.data)
                                })
                                .catch(err => {
                                    console.log(err)
                                })
                        }
                    }" class="w-[320px] border-l px-8">
                        <x-user-avatar :user="$user" size="w-24 h-24" />
                        <h3 class="text-white">{{ $user->name }}</h3>
                        <p class="text-gray-500">{{ $user->followers()->count() ?? 0 }} Followers</p>
                        <p class="text-white">{{ $user->bio }}</p>
                        @if (auth()->check() && auth()->id() !== $user->id)
                            <div x-data="{ following: {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }} }">
                                <button @click="follow()"
                                    class="rounded-full px-4 py-2 text-white mt-4 transition duration-200 ease-in-out"
                                    :class="following ? 'bg-red-600 hover:bg-red-700' : 'bg-emerald-600 hover:bg-emerald-700'"
                                    x-text="following ? 'Unfollow' : 'Follow'">
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
