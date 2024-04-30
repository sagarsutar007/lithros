<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Dynamic Title -->
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.page-title')

    @yield('content')
</body>
</html>
