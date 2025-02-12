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
        <x-sidebar :menu-items="[
            ['name' => 'Explore', 'link' => '/main_page', 'icon' => 'globe'],
            ['name' => 'Calculator', 'link' => '/calculator', 'icon' => 'calculator'],
            ['name' => 'Profile', 'link' => '/profile', 'icon' => 'user'],
            ['name' => 'Settings', 'link' => '/settings', 'icon' => 'cog'],
            ['name' => 'Create Recipe', 'link' => '/recipe/create', 'icon' => 'edit-alt'],
            ['name' => 'Planning', 'link' => '/planning', 'icon' => 'scatter-chart'],
            ]"/>
            @yield('content')
        </div>
        
    </body>
    </html>