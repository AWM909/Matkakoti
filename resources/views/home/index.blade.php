<x-site-layout title="Etusivu">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

        <h2 class="text-3xl font-medium text-gray-900 mb-2">Tervetuloa Matkakoti Lepää rauhassa</h2>
        <p class="text-indigo-600 font-medium mb-8">{{ $content['title'] }}</p>

        <div class="grid gap-8 md:grid-cols-2">
            <div class="space-y-4">
                @forelse ($photos as $photo)
                    <img src="{{ asset($photo) }}" alt="{{ $content['title'] }}"
                         class="rounded-lg shadow w-full object-cover">
                @empty
                    <p class="text-gray-400">Kuvat tulossa pian.</p>
                @endforelse
            </div>

            <div class="flex flex-col gap-6 text-gray-600">
                <p>{{ $content['text'] }}</p>
                <p>
                    Matkakotimme sijaitsee vanhalla maatilalla, jossa voit pysähtyä, levätä ja nauttia
                    maaseudun rauhasta. Majoitamme vieraita 20 huoneessa. Viidessä huoneessa on oma vessa,
                    ja muissa huoneissa on käytössä yhteinen vessa.
                </p>
                <p>
                    Aamupalaa tarjoillaan joka päivä klo 7:00–11:00 matkakodin isossa huoneessa keittiön
                    vieressä. Iltaisin ruokaa ei ole tarjolla, mutta samassa tilassa on vieraiden käytössä
                    jääkaappi, mikroaaltouuni sekä kahvin- ja vedenkeitin.
                </p>
                <div class="flex gap-3">
                    <a href="{{ route('rooms.index') }}"
                       class="bg-gray-800 text-white text-xs font-semibold uppercase px-4 py-2 rounded-md hover:bg-gray-700">Huoneet</a>
                    <a href="{{ route('prices') }}"
                       class="border border-gray-300 text-xs font-semibold uppercase px-4 py-2 rounded-md hover:bg-gray-50">Hinnasto</a>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
