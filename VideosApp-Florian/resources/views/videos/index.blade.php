@extends('layouts.app')

@section('content')
    <x-navbar />

    <style>
        .video-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .video-card {
            width: 300px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }

        .video-card img {
            width: 100%;
            height: auto;
        }

        .video-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }

        .video-card a {
            text-decoration: none;
            color: #333;
        }

        .video-card a:hover {
            color: #007bff;
        }

        .create-button {
            display: block;
            margin: 10px auto;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            font-size: 16px;
        }

        .create-button:hover {
            background-color: #0056b3;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>

    <h1> Videos </h1>

    <a href="{{ route('videos.manage.create') }}" class="create-button">Create Video</a>

    <div class="video-grid">
        @foreach($videos as $video)
            <div class="video-card">
                <a href="{{ route('videos.show', $video->id) }}">
                    <img src="https://img.youtube.com/vi/{{ $video->url }}/0.jpg" alt="{{ $video->title }}">
                    <h3>{{ $video->title }}</h3>
                </a>
            </div>
        @endforeach
    </div>
@endsection
