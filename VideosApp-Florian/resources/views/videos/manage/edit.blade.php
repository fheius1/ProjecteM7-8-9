@extends('layouts.app')

@section('content')
    <h1>Edit Video</h1>
    <form action="{{ route('videos.update', $video->id) }}" method="POST" data-qa="form-edit-video">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title" data-qa="label-title">Title</label>
            <input type="text" name="title" id="title" class="form-control" data-qa="input-title" value="{{ $video->title }}" required>
        </div>
        <div class="form-group">
            <label for="description" data-qa="label-description">Description</label>
            <textarea name="description" id="description" class="form-control" data-qa="textarea-description" required>{{ $video->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="url" data-qa="label-url">URL</label>
            <input type="url" name="url" id="url" class="form-control" data-qa="input-url" value="{{ $video->url }}" required>
        </div>
        <button type="submit" class="btn btn-primary" data-qa="button-submit">Update</button>
    </form>

    <h2>Manage Videos</h2>
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
