<x-site-layout title="Hallinta: huoneet">
    <div class="bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">
        <a href="{{ route('admin.rooms.create') }}"
           class="inline-block bg-gray-800 text-white text-xs font-semibold uppercase px-4 py-2 rounded-md hover:bg-gray-700">
            Uusi huone
        </a>

        <table class="w-full text-left mt-6">
            <thead class="text-sm text-gray-500 border-b">
                <tr>
                    <th class="py-2">Nro</th>
                    <th class="py-2">Nimi</th>
                    <th class="py-2">Vessa</th>
                    <th class="py-2">Hinta</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr class="border-b">
                        <td class="py-3">{{ $room->number }}</td>
                        <td class="py-3">{{ $room->name }}</td>
                        <td class="py-3">{{ $room->private_toilet ? 'Oma' : 'Yhteinen' }}</td>
                        <td class="py-3">{{ number_format($room->price_per_night, 2, ',', ' ') }} €</td>
                        <td class="py-3 text-right space-x-3">
                            <a href="{{ route('admin.rooms.edit', $room) }}" class="text-blue-600 hover:underline">Muokkaa</a>
                            <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Poistetaanko huone?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Poista</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-site-layout>
