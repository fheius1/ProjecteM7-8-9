@extends('layouts.app')

@section('content')
    <h1>Create New Video</h1>
    <form action="{{ route('videos.store') }}" method="POST" data-qa="form-create-video">
        @csrf
        <div class="form-group">
            <label for="title" data-qa="label-title">Title</label>
            <input type="text" name="title" id="title" class="form-control" data-qa="input-title" required>
        </div>
        <div class="form-group">
            <label for="description" data-qa="label-description">Description</label>
            <textarea name="description" id="description" class="form-control" data-qa="textarea-description" required></textarea>
        </div>
        <div class="form-group">
            <label for="url" data-qa="label-url">URL</label>
            <input type="url" name="url" id="url" class="form-control" data-qa="input-url" required>
        </div>
        <button type="submit" class="btn btn-primary" data-qa="button-submit">Submit</button>
    </form>
@endsection
