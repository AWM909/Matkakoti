<x-site-layout title="Anna palautetta">
    <div class="max-w-2xl bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">
        <form method="POST" action="{{ route('feedback.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nimi</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Sähköposti (vapaaehtoinen)</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Palautteen aihe</label>
                <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @foreach ($categories as $value => $label)
                        <option value="{{ $value }}" @selected(old('category') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700">Palaute</label>
                <textarea name="message" id="message" rows="5"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('message') }}</textarea>
                @error('message') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit"
                    class="bg-gray-800 text-white text-xs font-semibold uppercase px-4 py-2 rounded-md hover:bg-gray-700">
                Lähetä palaute
            </button>
        </form>
    </div>
</x-site-layout>
