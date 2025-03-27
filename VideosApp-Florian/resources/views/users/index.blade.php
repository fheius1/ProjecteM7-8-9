@extends('layouts.app')

@section('content')
    <x-navbar />

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        input[type="text"] {
            padding: 5px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>

    <h1>Usuaris</h1>
    <form method="GET" action="{{ route('users.index') }}">
        <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}" data-qa="search-input">
        <button type="submit" data-qa="search-button">Search</button>
    </form>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Accions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" data-qa="user-details-link">Informacio Usurai</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
