@extends('layouts.app')

@section('content')
    <x-navbar />

    <style>
        table {
            width: 120%;
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        .create-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .create-button a:hover {
            background-color: #218838;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            font-weight: bold;
        }
    </style>

    <div class="container">
        <div class="header">
            <h1>Series</h1>
            <div class="create-button">
                <a href="{{ route('series.manage.create') }}" class="btn btn-success">Create New Series</a>
            </div>
        </div>
        <form method="GET" action="{{ route('series.index') }}" class="search-form">
            <input type="text" name="search" placeholder="Search series by title..." value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th>Titul</th>
                <th>Descripcio</th>
                <th>Accions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($series as $serie)
                <tr>
                    <td>
                        <a href="{{ route('series.show', $serie->id) }}">{{ $serie->title }}</a>
                    </td>
                    <td>{{ $serie->description }}</td>
                    <td>
                        <a href="{{ route('series.show', $serie->id) }}" class="btn btn-info">Details</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <x-footer />
@endsection
