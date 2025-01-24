<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>

    <div class="flex">
        <x-sidebar :menu-items="[
            ['name' => 'Explore', 'link' => '/main_page', 'icon' => 'edit'],
            ['name' => 'Calculator', 'link' => '/calculator', 'icon' => 'calculator'],
            ['name' => 'Notifications', 'link' => '#', 'icon' => 'chat'],
            ['name' => 'Profile', 'link' => '/profile', 'icon' => 'user'],
            ['name' => 'Settings', 'link' => '/settings', 'icon' => 'cog'],
            ['name' => 'Create Recipe', 'link' => '/Form_resep', 'icon' => 'edit-alt'],
            ]" />`
        @yield('content')
    </div>

</body>
</html>
