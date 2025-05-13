<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid #ccc; }
        th, td { padding: 10px; text-align: left; }
        form { margin-top: 20px; }
        input, select { margin: 5px 0; padding: 5px; width: 100%; }
        button { padding: 5px 10px; }
    </style>
</head>
<body>
    <h1>@yield('title')</h1>
    @yield('content')
</body>
</html>
