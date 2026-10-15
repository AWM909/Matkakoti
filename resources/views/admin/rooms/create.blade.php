<x-site-layout title="Uusi huone">
    <div class="max-w-3xl bg-white shadow-xl sm:rounded-lg p-6 lg:p-8">
        <form method="POST" action="{{ route('admin.rooms.store') }}" enctype="multipart/form-data">
            @include('admin.rooms._form')
        </form>
    </div>
</x-site-layout>
