@extends('layouts.app')

@section('content')
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
    </style>

    <h1>All Videos</h1>
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
