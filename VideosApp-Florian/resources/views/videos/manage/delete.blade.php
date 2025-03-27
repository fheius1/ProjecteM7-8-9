@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Delete Video</h1>
        <p>Are you sure you want to delete the video titled "{{ $video->title }}"?</p>
        <form action="{{ route('videos.manage.destroy', $video->id) }}" method="POST" data-qa="form-delete-video" id="delete-form">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-qa="button-confirm-delete">Yes, Delete</button>
            <a href="{{ route('videos.manage.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-qa="button-cancel-delete">Cancel</a>
        </form>
    </div>

    <x-footer />
@endsection
