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

        .form-container p {
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        </style>


    <div class="form-container">
        <h1>Delete Series</h1>
        @can('administrarSeries')
            <p>Estas segur que voleu suprimir la sèrie? "{{ $serie->title }}"?</p>
            <p>Aquesta acció també suprimirà tots els vídeos associats a aquesta sèrie. Si no vols suprimir els vídeos, podeu anul·lar l'assignació d'aquesta sèrie.</p>
            <form action="{{ route('series.manage.destroy', $serie->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar serie</button>
                <a href="{{ route('series.manage.index') }}" class="btn btn-secondary">Cancelar</a>

            </form>
            <a href="{{ route('series.manage.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        @endcan
    </div>
    <x-footer />
@endsection


