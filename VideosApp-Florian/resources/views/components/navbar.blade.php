<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar">
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('videos.index') }}">Videos</a></li>
        <li><a href="{{ route('users.index') }}">Usuaris</a></li>
        @auth
            <li><a href="{{ route('series.index') }}">Series</a></li>

            @can('manage-videos')
                <li><a href="{{ route('videos.manage.index') }}">Administrar Videos</a></li>
            @endcan
            @can('admmistradorUsuaris')
                <li><a href="{{ route('users.manage.index') }}">Administrar Usuaris</a></li>
            @endcan
            @can('administrarSeries')
                <li><a href="{{ route('series.manage.index') }}">Administrar Series</a></li>
            @endcan

            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>

        @else

            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</nav>

<style>
    .navbar {
        background-color: #007BFF;
        padding: 10px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar ul {
        list-style: none;
        display: flex;
        margin: 0;
        padding: 0;
    }

    .navbar li {
        margin-right: 20px;
    }

    .navbar a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
    }

    .navbar a:hover {
        color: #e0e0e0;
    }

    .navbar form {
        display: inline;
    }
</style>
