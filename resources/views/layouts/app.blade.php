<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NET doo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="dark" id="toggleDarkMode">
    <div class="min-h-screen w-full font-normal text-gray-600 dark:text-gray-400 text-base bg-gray-50 dark:bg-gray-800">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>