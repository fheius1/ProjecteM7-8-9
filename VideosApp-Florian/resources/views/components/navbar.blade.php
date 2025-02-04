<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar">
    <a href="{{ route('home') }}" >Videos App</a>
    <a href="{{ route('home') }}">Home</a>
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
