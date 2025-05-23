@extends('layouts.videos-app-layout')

@section('title', $video->title . ' - Videos App')

@section('content')
    <x-navbar />

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }


        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1;
        }

        .video-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .video-container {
            position: relative;
            padding-top: 56.25%;
            background: #000;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .action-buttons a,
        .action-buttons form button {
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
        }

        .action-buttons a:hover {
            background-color: #0056b3;
        }

        .action-buttons form button {
            background-color: #dc3545;
        }

        .action-buttons form button:hover {
            background-color: #a71d2a;
        }
    </style>


    <div class="container">
        <h1 class="video-title">{{ $video->title }}</h1>
        <p><strong>Description:</strong> {{ $video->description }}</p>
        <p><strong>URL:</strong> <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></p>
        <p><strong>Created At:</strong> {{ $video->created_at }}</p>
        <p><strong>Updated At:</strong> {{ $video->updated_at }}</p>

        <div class="video-container">
            <iframe
                src="{{ $video->url }}"
                allow="autoplay; fullscreen; picture-in-picture"></iframe>
        </div>

        <div class="action-buttons">
            <a href="{{ route('videos.manage.edit', $video->id) }}">Edit</a>
            <form action="{{ route('videos.manage.destroy', $video->id) }}" method="POST" onsubmit="return">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
