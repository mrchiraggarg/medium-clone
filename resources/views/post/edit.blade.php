<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl mb-4 text-white">Update Post:
                <br>
                <strong class="font-bold">{{ $post->title }}</strong>
            </h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title', $post->title)" autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Category Id -->
                    <div class="mb-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" class="block mt-1 w-full" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-input-textarea id="content" class="block mt-1 w-full" type="text" name="content"
                            autofocus>
                            {{ old('content', $post->content) }}
                        </x-input-textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                            :value="old('image')" autofocus />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <x-primary-button type="submit">
                        Create Post
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
