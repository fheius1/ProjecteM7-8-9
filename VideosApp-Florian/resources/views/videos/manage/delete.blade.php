<!-- resources/views/videos/manage/delete.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Delete Video</h1>
    <p>Are you sure you want to delete the video titled "{{ $video->title }}"?</p>
    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" data-qa="form-delete-video">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" data-qa="button-confirm-delete">Yes, Delete</button>
        <a href="{{ route('videos.index') }}" class="btn btn-secondary" data-qa="button-cancel-delete">Cancel</a>
    </form>
@endsection
