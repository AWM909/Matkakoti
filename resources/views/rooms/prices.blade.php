<x-site-layout title="Hinnasto">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
        <table class="w-full text-left">
            <thead class="text-sm text-gray-500 border-b">
                <tr>
                    <th class="py-2">Huonetyyppi</th>
                    <th class="py-2 text-right">Hinta / yö</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                    <tr class="border-b">
                        <td class="py-3">
                            {{ $type->private_toilet ? 'Huone, jossa oma vessa' : 'Huone, jossa yhteinen vessa' }}
                            ({{ $type->total }} huonetta)
                        </td>
                        <td class="py-3 text-right font-semibold">
                            {{ number_format($type->price, 0, ',', ' ') }} €
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="py-3 text-gray-500">Hintoja ei ole vielä lisätty.</td></tr>
                @endforelse
            </tbody>
        </table>

        <p class="mt-6 text-gray-600">Aamupala sisältyy hintaan ja sitä tarjoillaan joka päivä klo 7:00–11:00.</p>
    </div>
</x-site-layout>
