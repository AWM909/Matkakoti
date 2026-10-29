@csrf

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <label for="number" class="block text-sm font-medium text-gray-700">Huoneen numero</label>
        <input type="number" name="number" id="number" value="{{ old('number', $room->number ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('number') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nimi</label>
        <input type="text" name="name" id="name" value="{{ old('name', $room->name ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="beds" class="block text-sm font-medium text-gray-700">Vuoteita</label>
        <input type="number" name="beds" id="beds" value="{{ old('beds', $room->beds ?? 1) }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('beds') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="price_per_night" class="block text-sm font-medium text-gray-700">Hinta / yö (€)</label>
        <input type="number" step="0.01" name="price_per_night" id="price_per_night"
               value="{{ old('price_per_night', $room->price_per_night ?? '') }}"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        @error('price_per_night') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-4">
    <label for="description" class="block text-sm font-medium text-gray-700">Kuvaus</label>
    <textarea name="description" id="description" rows="4"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $room->description ?? '') }}</textarea>
    @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
</div>

<div class="mt-4">
    <label class="inline-flex items-center gap-2 text-sm text-gray-700">
        <input type="checkbox" name="private_toilet" value="1"
               @checked(old('private_toilet', $room->private_toilet ?? false))
               class="rounded border-gray-300">
        Huoneessa on oma vessa
    </label>
</div>

<div class="mt-4">
    <label for="image" class="block text-sm font-medium text-gray-700">Kuva</label>
    @if (!empty($room->image))
        <img src="{{ asset('storage/' . $room->image) }}" alt="" class="h-24 rounded mb-2">
    @endif
    <input type="file" name="image" id="image" accept="image/*" class="block text-sm">
    @error('image') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
</div>

<div class="mt-6">
    <button type="submit"
            class="bg-gray-800 text-white text-xs font-semibold uppercase px-4 py-2 rounded-md hover:bg-gray-700">
        Tallenna
    </button>
    <a href="{{ route('admin.rooms.index') }}" class="ml-3 text-gray-600 hover:underline">Peruuta</a>
</div>
