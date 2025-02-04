<!-- resources/views/layouts/videos-app-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
<x-navbar/>

<div class="container">
    @yield('content')
</div>

<x-footer/>
</body>
</html>
