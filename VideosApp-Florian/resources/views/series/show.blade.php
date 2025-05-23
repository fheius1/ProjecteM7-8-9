@extends('layouts.app')

@section('content')
    <x-navbar />

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

    </style>

    <div class="container">
        <h1>{{ $serie->title }}</h1>
        <p>{{ $serie->description }}</p>

        <h2>Videos</h2>
        @if($serie->videos->isNotEmpty())
            <ul>
                @foreach($serie->videos as $video)
                    <li>{{ $video->title }}</li>
                @endforeach
            </ul>
        @else
            <p>Aquesta sèrie no té cap vídeo associat.</p>
        @endif


        <a href="{{ route('series.index') }}">Llista series</a>
    </div>

    <x-footer />
@endsection
