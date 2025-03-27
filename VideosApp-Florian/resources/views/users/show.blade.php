@extends('layouts.app')

@section('content')
    <x-navbar />

    <style>
        .user-info {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .user-info h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .user-info div {
            margin-bottom: 10px;
        }

        .user-info strong {
            display: inline-block;
            width: 100px;
        }
    </style>

    <div class="user-info">
        <h1>Informacio de l'usuari</h1>
        <div>
            <strong>Nom:</strong> {{ $user->name }}
        </div>
        <div>
            <strong>Correu:</strong> {{ $user->email }}
        </div>
        <div>
            <strong>Videos:</strong> {{ $videoCount }}
        </div>
    </div>
@endsection
