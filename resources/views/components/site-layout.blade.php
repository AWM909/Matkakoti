@props(['title' => null])
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title . ' – ' : '' }}Matkakoti Lepää rauhassa</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    @php
        $links = [
            'home' => 'Etusivu',
            'gallery.index' => 'Galleria',
            'rooms.index' => 'Huoneet',
            'prices' => 'Hinnasto',
            'feedback.create' => 'Palaute',
        ];
    @endphp

    <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-wrap items-center gap-x-6 gap-y-2">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-semibold text-gray-900">
                <x-application-mark class="block h-10 w-auto" />
                <span>Matkakoti</span>
            </a>

            @foreach ($links as $route => $label)
                <a href="{{ route($route) }}"
                   class="text-sm font-medium pb-1 border-b-2 {{ request()->routeIs($route) ? 'border-indigo-400 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700' }}">
                    {{ $label }}
                </a>
            @endforeach

            <div class="ml-auto text-sm">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700">Kirjaudu</a>
                @endguest
            </div>
        </div>
    </nav>

    @auth
        <div class="bg-gray-800 text-gray-200 text-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-wrap items-center gap-x-5 gap-y-1">
                <span class="font-semibold text-white">Hallinta:</span>
                <a href="{{ route('admin.rooms.index') }}" class="hover:text-white">Huoneet</a>
                <a href="{{ route('admin.photos.index') }}" class="hover:text-white">Kuvat</a>
                <a href="{{ route('admin.feedback.index') }}" class="hover:text-white">Palautteet</a>
                <a href="{{ route('profile.show') }}" class="hover:text-white">Profiili</a>
                <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                    @csrf
                    <button type="submit" class="hover:text-white">Kirjaudu ulos</button>
                </form>
            </div>
        </div>
    @endauth

    @if ($title)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $title }}</h1>
            </div>
        </header>
    @endif

    <main class="flex-1 py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 mx-4 sm:mx-0 rounded-md bg-green-100 text-green-800 px-4 py-3">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>

    <footer class="bg-white border-t py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Matkakoti Lepää rauhassa Oy
    </footer>
</body>
</html>
