@extends('layouts.app')

@section('content')
    <x-navbar />

    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #45a049;
        }
    </style>

    <div class="form-container">
        <h1>Crear Nova Serie</h1>
            <form action="{{ route('series.manage.store') }}" method="POST" data-qa="create-series-form">
                @csrf
                <div class="form-group">
                    <label for="title">Títol</label>
                    <input type="text" name="title" id="title" class="form-control" required data-qa="series-title-input">
                </div>
                <div class="form-group">
                    <label for="description">Descripció</label>
                    <textarea name="description" id="description" class="form-control" required data-qa="series-description-input"></textarea>
                </div>
                <div class="form-group">
                    <label for="video_id">Video</label>
                    <select name="video_id" id="video_id" class="form-control" required>
                        <option value="" disabled selected>Select a video</option>
                        @foreach($videos as $video)
                            <option value="{{ $video->id }}">{{ $video->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">Usuari</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success" data-qa="create-series-submit">Crear</button>
            </form>
    </div>

    <x-footer />
@endsection
