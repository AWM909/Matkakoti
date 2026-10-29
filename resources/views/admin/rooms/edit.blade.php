<x-site-layout title="Muokkaa huonetta">
    <div class="max-w-3xl bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">
        <form method="POST" action="{{ route('admin.rooms.update', $room) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.rooms._form')
        </form>
    </div>
</x-site-layout>
