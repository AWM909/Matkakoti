<x-site-layout title="Valokuvagalleria">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($photos as $photo)
                <figure>
                    <img src="{{ asset('storage/' . $photo->path) }}"
                         alt="{{ $photo->title ?? 'Matkakoti' }}"
                         class="rounded-lg shadow w-full h-56 object-cover">
                    @if ($photo->title)
                        <figcaption class="mt-2 text-sm text-gray-600">{{ $photo->title }}</figcaption>
                    @endif
                </figure>
            @empty
                <p class="text-gray-500">Galleriassa ei ole vielä kuvia.</p>
            @endforelse
        </div>
    </div>
</x-site-layout>
