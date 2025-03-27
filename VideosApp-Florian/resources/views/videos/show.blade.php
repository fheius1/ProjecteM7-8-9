@extends('layouts.videos-app-layout')

@section('title', $video->title . ' - Videos App')

@section('content')
    <x-navbar />

    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Page Content Styles */
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex: 1; /* Ensure content expands to fill available space */
        }

        .video-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .video-container {
            position: relative;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
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
    </style>

    <!-- Contingut de la pagina -->
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
    </div>
@endsection
