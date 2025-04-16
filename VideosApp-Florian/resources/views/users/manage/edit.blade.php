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
        .form-container input[type="email"],
        .form-container input[type="password"] {
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
        <h1>Edit User</h1>
        <form action="{{ route('users.manage.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div>
                <label for="password">Contrasenya:</label>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="password_confirmation">Confirmar contrasenya:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit">Actualitzar</button>
        </form>
    </div>

    <x-footer />
@endsection
