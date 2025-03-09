<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="bg-gray-100 min-h-screen">
        <div class="bg-blue-600 text-white p-4">
            <h1 class="text-2xl">Admin Panel</h1>
        </div>
        <main class="container mx-auto px-4 py-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
