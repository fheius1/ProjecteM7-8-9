<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            @can('manage-videos')
                <a href="{{ route('videos.manage.index') }}" class="btn btn-secondary">Manage Videos</a>
            @endcan
            @can('admmistradorUsuaris')
                <a href="{{ route('users.manage.index') }}" class="btn btn-secondary">Administrar Usuaris</a>
            @endcan
        </h2>
    </x-slot>

    <style>
        .btn {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-left: 10px;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .header h2 {
            margin: 0;
        }

        .header a {
            margin-left: 20px; /* Add margin to separate the links */
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
