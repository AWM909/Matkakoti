<x-site-layout title="Hallinta: galleria">
    <div class="bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">
        <a href="{{ route('admin.photos.create') }}"
           class="inline-block bg-gray-800 text-white text-xs font-semibold uppercase px-4 py-2 rounded-md hover:bg-gray-700">
            Lisää kuva
        </a>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-6">
            @forelse ($photos as $photo)
                <div>
                    <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->title }}"
                         class="rounded-lg shadow w-full h-48 object-cover">
                    <div class="flex items-center justify-between mt-2 text-sm">
                        <span class="text-gray-600">{{ $photo->title }}</span>
                        <form action="{{ route('admin.photos.destroy', $photo) }}" method="POST"
                              onsubmit="return confirm('Poistetaanko kuva?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Poista</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Ei kuvia vielä.</p>
            @endforelse
        </div>
    </div>
</x-site-layout>
