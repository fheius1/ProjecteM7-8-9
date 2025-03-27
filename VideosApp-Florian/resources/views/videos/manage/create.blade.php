@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Creacio nou video</h1>
        <form action="{{ route('videos.manage.store') }}" method="POST" data-qa="form-create-video" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="title" data-qa="label-title" class="block text-gray-700">Titul</label>
                <input type="text" name="title" id="title" class="form-control border border-gray-300 p-2 w-full" data-qa="input-title" required>
            </div>
            <div class="mb-4">
                <label for="description" data-qa="label-description" class="block text-gray-700">Descripcio</label>
                <textarea name="description" id="description" class="form-control border border-gray-300 p-2 w-full" data-qa="textarea-description" required></textarea>
            </div>
            <div class="mb-4">
                <label for="url" data-qa="label-url" class="block text-gray-700">URL</label>
                <input type="url" name="url" id="url" class="form-control border border-gray-300 p-2 w-full" data-qa="input-url" required>
            </div>
            <button type="submit" class="text-black font-bold py-2 px-4 rounded" data-qa="button-submit">Crear</button>
        </form>
    </div>

    <x-footer />
@endsection
