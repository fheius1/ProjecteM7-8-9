<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar">
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('videos.index') }}">Videos</a></li>
        @auth
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @can('manage-videos')
                <li><a href="{{ route('videos.index') }}">Manage Videos</a></li>
            @endcan
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

    .navbar a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
    }

    .navbar a:hover {
        color: #e0e0e0;
    }
</style>
