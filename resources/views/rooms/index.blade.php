<x-site-layout title="Majoitushuoneet">
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 px-4 sm:px-0">
        @forelse ($rooms as $room)
            @php
                $fallback = $room->private_toilet
                    ? 'images/seasons/room123.jpg'
                    : 'images/seasons/room321.jpg';
            @endphp

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="{{ $room->image ? asset('storage/' . $room->image) : asset($fallback) }}"
                     alt="{{ $room->name }}"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h2 class="font-semibold text-gray-900">Huone {{ $room->number }} · {{ $room->name }}</h2>
                    <p class="text-sm text-gray-600 my-2">{{ $room->description }}</p>
                    <p class="text-sm text-gray-500">
                        Vuoteita: {{ $room->beds }} ·
                        {{ $room->private_toilet ? 'Oma vessa' : 'Yhteinen vessa' }}
                    </p>
                    <p class="mt-2 font-semibold">{{ number_format($room->price_per_night, 2, ',', ' ') }} € / yö</p>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Huoneita ei ole vielä lisätty.</p>
        @endforelse
    </div>
</x-site-layout>
