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

        h1 {
            font-size: 2.5rem;
            color: #333;
            font-weight: bold;
        }

        .container {
            margin-top: 20px;
        }
    </style>

    <div class="container">
        <h1>Notificacions</h1>
        <table>
            <thead>
            <tr>
                <th>Missatge</th>
                <th>Data</th>
            </tr>
            </thead>
            <tbody id="notification-list">

            </tbody>
        </table>
    </div>

    <x-footer />
@endsection
