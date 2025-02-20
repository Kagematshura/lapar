<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <title>Document</title>

    @vite('resources/css/app.css')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body>

    <div class="flex font-poppins">
        @php
            $isGuest = !auth()->check();
            $menuItems = [
                ['name' => 'Jelajahi', 'link' => '/main_page', 'icon' => 'globe'],
                ['name' => 'Kalkulator', 'link' => '/calculator', 'icon' => 'calculator', 'guest' => false],
                ['name' => 'Profil', 'link' => '/profile', 'icon' => 'user', 'guest' => false],
                // ['name' => 'Pengaturan', 'link' => '/settings', 'icon' => 'cog', 'guest' => false],
                ['name' => 'Membuat Resep', 'link' => '/recipe/create', 'icon' => 'edit-alt', 'guest' => false],
                ['name' => 'Perencanaan', 'link' => '/planning', 'icon' => 'scatter-chart', 'guest' => false],
                ['name' => 'Pencarian', 'link' => '/search', 'icon' => 'search-alt-2']
            ];

            if ($isGuest) {
                $menuItems = array_filter($menuItems, function($item) {
                    return !isset($item['guest']) || $item['guest'] !== false;
                });
            }
        @endphp

        <x-sidebar :menu-items="$menuItems" />
        @yield('content')
    </div>
</body>
</html>
