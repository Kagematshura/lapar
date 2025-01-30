<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>
    <x-sidebar :menu-items="[
        ['name' => 'Data Recipe', 'link' => '/admin/DataRecipe', 'icon' => 'edit'],
        ['name' => 'Data Image', 'link' => '/admin/DataImage', 'icon' => 'image'],
        ]" />`
    @yield('content')
</body>
</html>