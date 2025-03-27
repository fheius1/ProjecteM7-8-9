@extends('layouts.app')

@section('content')
    <x-navbar />

    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4 text-center">Manage Videos</h1>
        <div class="flex justify-center mb-4">
            <a href="{{ route('videos.manage.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Crear Video</a>
        </div>
        <div class="flex justify-center">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Titul</th>
                    <th class="py-2 px-4 border-b">Descripcio</th>
                    <th class="py-2 px-4 border-b">Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $video->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $video->description }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('videos.manage.edit', $video->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                            <form action="{{ route('videos.manage.destroy', $video->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Esborrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-footer />
@endsection
