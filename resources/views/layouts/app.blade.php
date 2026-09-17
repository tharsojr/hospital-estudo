@include('partials.menu')

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">

    <title>@yield('titulo')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <main>
        @yield('conteudo')
    </main>

</body>

</html>