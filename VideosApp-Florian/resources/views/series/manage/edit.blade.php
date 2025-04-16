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
        <h1>Editar Serie</h1>
        @can('administrarSeries')
            <form action="{{ route('series.manage.update', ['series' => $serie->id]) }}" method="POST" data-qa="edit-series-form">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Títol</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $serie->title }}" required data-qa="series-title-input">
                </div>
                <div class="form-group">
                    <label for="description">Descripció</label>
                    <textarea name="description" id="description" class="form-control" required data-qa="series-description-input">{{ $serie->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="user_id">Usuari</label>
                    <select name="user_id" id="user_id" class="form-control" required data-qa="series-user-id-select">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $serie->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success" data-qa="edit-series-submit">Guardar</button>
            </form>
        @endcan
    </div>

    <x-footer />
@endsection
