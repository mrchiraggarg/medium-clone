@props(['user'])

@if ($user->image)
    <img src="{{ $user->imageUrl() }}" class="rounded-full w-12 h-12 object-cover" alt="{{ $user->name }}">
@else
    <img src="https://i.pravatar.cc/300" class="rounded-full w-12 h-12 object-cover" alt="{{ $user->name }}">
@endif
