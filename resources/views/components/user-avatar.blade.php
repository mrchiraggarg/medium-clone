@props(['user', 'size' => 'w-12 h-12'])

@if ($user->image)
    <img src="{{ $user->imageUrl('avatar') }}" class="rounded-full {{ $size }} object-cover" alt="{{ $user->name }}">
@else
    <img src="https://i.pravatar.cc/300" class="rounded-full {{ $size }} object-cover">
@endif
