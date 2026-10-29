<x-site-layout title="Hallinta: palautteet">
    <div class="bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">
        @forelse ($feedbacks as $feedback)
            <div class="border-b py-4">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="font-semibold text-gray-900">
                            {{ $feedback->name }}
                            <span class="text-sm font-normal text-gray-500">
                                · {{ $feedback->email ?: 'ei sähköpostia' }}
                                · {{ $feedback->category }}
                                · {{ $feedback->created_at->format('d.m.Y H:i') }}
                            </span>
                        </p>
                        <p class="text-gray-700 mt-1 whitespace-pre-line">{{ $feedback->message }}</p>
                    </div>
                    <form action="{{ route('admin.feedback.destroy', $feedback) }}" method="POST"
                          onsubmit="return confirm('Poistetaanko palaute?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:underline text-sm">Poista</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Ei palautteita vielä.</p>
        @endforelse
    </div>
</x-site-layout>
