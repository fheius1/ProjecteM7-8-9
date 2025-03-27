<!-- resources/views/layouts/videos-app-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos App</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50 flex flex-col font-sans">
<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <nav class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                    Home
                </a>
                @guest
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded-md text-sm font-medium transition-colors shadow-sm">
                        Iniciar Sesión
                    </a>
                @endguest
                @auth
                    @can('video_manager')
                        <a href="{{ route('videos.manage.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Gestionar Videos
                        </a>
                    @endcan
                    @can('admmistradorUsuaris')
                        <a href="{{ route('users.manage.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Gestionar usuarios
                        </a>
                    @endcan
                    <a href="{{ route('users.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        Llista usuaris
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth
            </nav>
        </div>
    </div>
</header>

<main class="flex-grow py-6">
    @yield('content')
</main>

</body>
</html>
