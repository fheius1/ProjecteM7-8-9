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

        h1, .create-series-link {
            text-align: center;
            font-size: 2em;
            display: block;
            margin-bottom: 20px;
        }
    </style>

    <h1>Administrar Series</h1>
    @can('administrarSeries')
        <a href="{{ route('series.manage.create') }}" class="create-series-link">Crear nova serie</a>
        <table>
            <thead>
            <tr>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Accions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($series as $serie)
                <tr>
                    <td>{{ $serie->title }}</td>
                    <td>{{ $serie->description }}</td>
                    <td>
                        <a href="{{ route('series.manage.edit', $serie->id) }}">Editar</a>
                        <a href="{{ route('series.manage.delete', $serie->id) }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endcan
    <x-footer />
@endsection






