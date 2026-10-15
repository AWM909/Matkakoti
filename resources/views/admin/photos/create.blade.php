<x-site-layout title="Lisää kuva">
    <div class="max-w-2xl bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">
        <form method="POST" action="{{ route('admin.photos.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Otsikko (vapaaehtoinen)</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700">Kuva</label>
                <input type="file" name="image" id="image" accept="image/*" class="block text-sm">
                @error('image') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="bg-gray-800 text-white text-xs font-semibold uppercase px-4 py-2 rounded-md hover:bg-gray-700">
                Tallenna
            </button>
            <a href="{{ route('admin.photos.index') }}" class="ml-3 text-gray-600 hover:underline">Peruuta</a>
        </form>
    </div>
</x-site-layout>
