<!-- resources/views/videos/manage/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Manage Videos</h1>
    <a href="{{ route('videos.create') }}" class="btn btn-primary">Create New Video</a>
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($videos as $video)
            <tr>
                <td>{{ $video->title }}</td>
                <td>{{ $video->description }}</td>
                <td>
                    <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
